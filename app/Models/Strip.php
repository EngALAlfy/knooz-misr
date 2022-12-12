<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strip extends Model
{
    use HasFactory;


    protected $fillable = [
        'block_id',
        'finish_type',
        'count',
        'length',
        'width',
        'thickness',
        'status',
        'position',
       // 'machine_id',
        'cut_date',
        'create_user_id',
        'update_user_id'
    ];

    function block(){
        return $this->belongsTo(Block::class);
    }

    //function machine(){
    //    return $this->belongsTo(Machine::class);
    //}

    function pieces(){
        return $this->hasManyThrough(Piece::class , Block::class , 'id' , 'block_id' , 'block_id');
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }
}
