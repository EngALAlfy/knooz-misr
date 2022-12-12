<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'number',
        'project',
        'client',
        'position',
        'order_date',
        'start_date',
        'create_user_id',
        'update_user_id'
    ];

    function items(){
        return $this->hasMany(OrderItem::class);
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }
}
