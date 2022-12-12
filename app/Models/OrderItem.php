<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_id',
        'material_id',
        'finish_type',
        'length',
        'width',
        'thickness',
        'count',
        'done_count',
        'shipped_count',
        'create_user_id',
        'update_user_id'
    ];

    function order(){
        return $this->belongsTo(Order::class);
    }

    function material(){
        return $this->belongsTo(Material::class);
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }

}
