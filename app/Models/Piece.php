<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $fillable = [
        'block_id',
        //'finish_type',
        'count',
        'length',
        'width',
        'thickness',
        'machine_id',
        'status',
        //'position',
        //'ship_date',
        'cut_date',
        'create_user_id',
        'update_user_id'
    ];

    function block(){
        return $this->belongsTo(Block::class);
    } function user(){
        return $this->belongsTo(User::class , 'create_user_id');
    }

    function machine(){
        return $this->belongsTo(Machine::class);
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }

}
