<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use Illuminate\Support\Facades\Auth;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $machines = Machine::all();
        return view('machines.all' , compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('machines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMachineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMachineRequest $request)
    {
        $data = $request->validated();

        $data['create_user_id'] = Auth::user()->id;

        Machine::create($data);

        return redirect()->route('machines.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $machine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMachineRequest  $request
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMachineRequest $request, Machine $machine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
        //
        $machine->blocks->delete();
        $machine->strips->delete();
        $machine->pieces->delete();
        $machine->delete();
        return redirect()->route('machines.all');
    }
}
