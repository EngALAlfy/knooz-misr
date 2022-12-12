<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'number',
        'recive_date',
        'cut_date',
        'length_before',
        'width_before',
        'height_before',
        'length_after',
        'width_after',
        'height_after',
        'status',
        'position',
        'machine_id',
        'create_user_id',
        'update_user_id'
    ];


    function material(){
        return $this->belongsTo(Material::class);
    }


    function machine(){
        return $this->belongsTo(Machine::class);
    }

    function strips(){
        return $this->hasMany(Strip::class);
    }

    function currentStrips(){
        return $this->hasMany(Strip::class)->where('position' , 'current');
    }

    function pieces(){
        return $this->hasMany(Piece::class);
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }
}
