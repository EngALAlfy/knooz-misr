<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Http\Requests\StoreBlockRequest;
use App\Http\Requests\UpdateBlockRequest;
use App\Models\Machine;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $blocks  = Block::with('material' , 'machine' , 'strips' , 'pieces')->orderByDesc('created_at')->get();
        return view('blocks.all' , compact('blocks'));
    }

    public function producity(){
        return view('blocks.producity');
    }

    public function cut()
    {
        $blocks  = Block::where('position' , 'cut')->with('material' , 'machine' , 'strips' , 'pieces')->orderByDesc('created_at')->get();
        return view('blocks.cut' , compact('blocks'));
    }

    public function current()
    {
        $blocks  = Block::where('position' , 'current')->with('material' , 'machine' , 'strips' , 'pieces')->orderByDesc('created_at')->get();
        return view('blocks.current' , compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = Material::all();

        return view('blocks.create' , compact('materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlockRequest $request)
    {
        $data = $request->validated();

        $data['create_user_id'] = Auth::user()->id;

        Block::create($data);

        return redirect()->route('blocks.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit(Block $block)
    {
        $materials = Material::all();

        return view('blocks.edit' , compact('materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlockRequest  $request
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlockRequest $request, Block $block)
    {
        $data = $request->validated();

        $data['update_user_id'] = Auth::user()->id;



        return redirect()->route('blocks.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        //
        $block->strips->delete();
        $block->pieces->delete();
        $block->delete();
        return redirect()->route('blocks.all');
    }
}
