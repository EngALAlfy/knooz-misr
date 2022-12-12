<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'number',
        'car_number',
        'driver_name',
        'ship_date',
        'create_user_id',
        'update_user_id'
    ];


    function order(){
        return $this->belongsTo(Order::class);
    }

    function records(){
        return $this->belongsToMany(ShipPolicyRecord::class);
    }

    function user(){
        return $this->belongsTo(User::class , 'create_user_id' , 'id');
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }
}
