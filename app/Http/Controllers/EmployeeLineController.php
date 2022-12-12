<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLine;
use App\Http\Requests\StoreEmployeeLineRequest;
use App\Http\Requests\UpdateEmployeeLineRequest;
use Illuminate\Support\Facades\Auth;

class EmployeeLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $lines = EmployeeLine::withCount('employees')->orderByDesc('created_at')->get();
        return view('employees.lines.all' , compact('lines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.lines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeLineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeLineRequest $request)
    {
        //
        $data = $request->validated();

        $data['create_user_id'] = Auth::user()->id;

        EmployeeLine::create($data);

        return redirect()->route('employees.lines.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeLine  $employeeLine
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeLine $employeeLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeLine  $employeeLine
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeLine $employeeLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeLineRequest  $request
     * @param  \App\Models\EmployeeLine  $employeeLine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeLineRequest $request, EmployeeLine $employeeLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeLine  $employeeLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeLine $employeeLine)
    {
        //
        $employeeLine->delete();
        return redirect()->route('employees.lines.all');
    }
}
