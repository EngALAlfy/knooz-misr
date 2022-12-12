<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Http\Requests\StorePieceRequest;
use App\Http\Requests\UpdatePieceRequest;
use App\Models\Block;
use App\Models\Machine;
use App\Models\Strip;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Util\ArrayCollection;
use Ramsey\Collection\Collection as CollectionCollection;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $pieces = Piece::with('block.material' , 'machine' , 'user:id,name')->get();
        return view('pieces.all' , compact('pieces'));
    }

    public function sizes()
    {
        $pieces = Piece::with('block.material' , 'machine')->where('position' , 'current')->get()->groupBy(function ($data){
            return $data['length'] . "x" .$data['width'] . "x" . $data['thickness']. ":" . $data['block']['material']['name'];
        })->toArray();


        return view('pieces.sizes' , compact('pieces'));
    }

    public function shipped()
    {
        $pieces = Piece::with('block.material' , 'machine')->where('position' , 'shipped')->get();
        return view('pieces.shipped' , compact('pieces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $blocks = Block::where('position' , 'cut')->with('material')->get();
        $machines = Machine::where('input_type' , 'strip')->get();

        return view('pieces.create' , compact('machines' , 'blocks'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePieceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePieceRequest $request)
    {
        //
        $data = $request->validated();

        $data['create_user_id'] = Auth::user()->id;

        Piece::create($data);

        $strips = Strip::where('block_id' , $data['block_id'])->get();

        $strips->each(function($strip) use ($data){
            $strip->position = 'cut';
            $strip->cut_date = $data['cut_date'];
            $strip->save();
        });

        return redirect()->route('pieces.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function show(Piece $piece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function edit(Piece $piece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePieceRequest  $request
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePieceRequest $request, Piece $piece)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piece $piece)
    {
        $piece->delete();
        return redirect()->route('pieces.all');
    }
}
