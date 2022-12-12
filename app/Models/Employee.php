<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'job',
        'employee_line_id',
        'code',
        'phone',
        'create_user_id',
        'update_user_id'
    ];


    function line()
    {
        return $this->belongsTo(EmployeeLine::class , 'employee_line_id');
    }

    function attendance()
    {
        return $this->hasMany(EmployeeAttendance::class)->whereMonth('date' , Carbon::today()->month);
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }

}
