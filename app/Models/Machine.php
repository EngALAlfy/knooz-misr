<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'job',
        'number',
        'desc',
        'input_type',
        'output_type',
        'producty',
        'create_user_id',
        'update_user_id'
    ];

    function blocks(){
        return $this->hasMany(Block::class);
    }

    function strips(){
        return $this->hasMany(Strip::class);
    }

    function pieces(){
        return $this->hasMany(Piece::class);
    }

    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }
}
