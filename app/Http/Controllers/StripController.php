<?php

namespace App\Http\Controllers;

use App\Models\Strip;
use App\Http\Requests\StoreStripRequest;
use App\Http\Requests\UpdateStripRequest;
use App\Models\Block;
use App\Models\Machine;
use Illuminate\Support\Facades\Auth;

class StripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $strips = Strip::with('block.material' , 'block.machine' , 'pieces')->get();
        return view('strips.all' , compact('strips'));
    }
    public function current()
    {
        $strips = Strip::with('block.material' , 'block.machine')->where('position' , 'current')->get();
        return view('strips.current' , compact('strips'));
    }

    public function cut()
    {
        $strips = Strip::with('block.material' , 'block.machine' , 'pieces')->where('position' , 'cut')->get();
        return view('strips.cut' , compact('strips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $blocks = Block::where('position' , 'current')->with('material')->orderByDesc('created_at')->get();
        $machines = Machine::where('input_type' , 'block')->get();
        //$machines = Machine::where('input_type' , 'strip')->get();

        return view('strips.create' , compact('blocks' , 'machines'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStripRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStripRequest $request)
    {
        $data = $request->validated();

        $data['create_user_id'] = Auth::user()->id;

        Strip::create($data);

        $block = Block::find($data['block_id']);
        $block->cut_date = $data['cut_date'];
        $block->position = 'cut';
        $block->machine_id = $data['machine_id'];
        $block->save();

        return redirect()->route('strips.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Strip  $strip
     * @return \Illuminate\Http\Response
     */
    public function show(Strip $strip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Strip  $strip
     * @return \Illuminate\Http\Response
     */
    public function edit(Strip $strip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStripRequest  $request
     * @param  \App\Models\Strip  $strip
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStripRequest $request, Strip $strip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Strip  $strip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Strip $strip)
    {
        //
        $strip->delete();
        return redirect()->route('strips.all');
    }
}
