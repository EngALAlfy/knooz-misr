<?php

use App\Http\Controllers\EmployeeAttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('/employees')->middleware('auth')->as('employees.')->group(function(){

    Route::post('/{employee}/attendance/store' , [EmployeeAttendanceController::class , 'store'])->name('attendance.store');

});
