<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAttendance;
use App\Http\Requests\StoreEmployeeAttendanceRequest;
use App\Http\Requests\UpdateEmployeeAttendanceRequest;

class EmployeeAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeAttendanceRequest  $request
     * @param  \App\Models\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeAttendanceRequest $request, EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeAttendance $employeeAttendance)
    {
        //
    }
}
