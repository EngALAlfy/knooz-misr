<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipPolicyRecord extends Model
{
    use HasFactory;


    protected $fillable = [
        'ship_policy_id',
        'order_id',
        'finish_type',
        'count',
        'length',
        'width',
        'thickness',
        'material_id',
        'create_user_id',
        'update_user_id'
    ];


    function material(){
        return $this->belongsTo(Material::class);
    }

    function shipPolicy(){
        return $this->belongsTo(ShipPolicy::class);
    }

    function order(){
        return $this->belongsTo(Order::class);
    }

    function user(){
        return $this->belongsTo(User::class , 'create_user_id' , 'id');
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }


}
