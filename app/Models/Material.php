<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'color',
        'speed',
        'create_user_id',
        'update_user_id'
    ];


    function blocks(){
        return $this->hasMany(Block::class);
    }

    function cutBlocks(){
        return $this->hasMany(Block::class)->where('position' , 'cut');
    }

    function currentBlocks(){
        return $this->hasMany(Block::class)->where('position' , 'current');
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }

}
