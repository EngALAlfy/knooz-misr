<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'name',
        'file',
        'create_user_id',
        'update_user_id'
    ];


    function user(){
        return $this->belongsTo(User::class , 'create_user_id' , 'id');
    }

    function order(){
        return $this->belongsTo(Order::class);
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }

}
