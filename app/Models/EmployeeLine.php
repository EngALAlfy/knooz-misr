<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'create_user_id',
        'update_user_id'
    ];

    function employees()
    {
        return $this->hasMany(Employee::class , 'employee_line_id' , 'id');
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }
}
