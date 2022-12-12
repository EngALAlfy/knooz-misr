<?php

namespace App\Http\Controllers;

use App\Models\PieceStore;
use App\Http\Requests\StorePieceStoreRequest;
use App\Http\Requests\UpdatePieceStoreRequest;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class PieceStoreController extends Controller
{
    public function all()
    {
        $pieces = PieceStore::with('material' , 'user:id,name')->where('position' , 'current')->orderByDesc('created_at')->get();
        return view('pieces-store.all' , compact('pieces'));
    }

    public function sizes()
    {
        $pieces = PieceStore::with('material')->where('position' , 'current')->where('status' , 'good')->orderByDesc('created_at')->get()->groupBy(function ($data){
            return $data['length'] . "x" .$data['width'] . "x" . $data['thickness']. ":" . $data['material']['name']. ":" . $data['finish_type'];
        })->toArray();


        return view('pieces-store.sizes' , compact('pieces'));
    }

    public function shipped()
    {
        $pieces = PieceStore::with('material' , 'user:id,name')->where('position' , 'shipped')->orderByDesc('created_at')->get();
        return view('pieces-store.shipped' , compact('pieces'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = Material::all();

        return view('pieces-store.create' , compact('materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePieceStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePieceStoreRequest $request)
    {
        $data = $request->validated();

        $data['create_user_id'] = Auth::user()->id;

        PieceStore::create($data);

        return redirect()->route('pieces-store.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PieceStore  $pieceStore
     * @return \Illuminate\Http\Response
     */
    public function show(PieceStore $pieceStore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PieceStore  $pieceStore
     * @return \Illuminate\Http\Response
     */
    public function edit(PieceStore $pieceStore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePieceStoreRequest  $request
     * @param  \App\Models\PieceStore  $pieceStore
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePieceStoreRequest $request, PieceStore $pieceStore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PieceStore  $pieceStore
     * @return \Illuminate\Http\Response
     */
    public function destroy(PieceStore $pieceStore)
    {
        $pieceStore->delete();
        return redirect()->route('pieces-store.all');
    }
}
