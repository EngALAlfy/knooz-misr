<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceStore extends Model
{
    use HasFactory;

    protected $fillable = [
        //'block_id',
        'finish_type',
        'count',
        'length',
        'width',
        'thickness',
        'material_id',
        'status',
        'position',
        'ship_date',
        //'cut_date',
        'create_user_id',
        'update_user_id'
    ];


    function material(){
        return $this->belongsTo(Material::class);
    }

    function user(){
        return $this->belongsTo(User::class , 'create_user_id' , 'id');
    }
    function getCreatedAtAttribute($date){
        return Carbon::createFromTimeString($date)->format('Y-m-d');
    }
}
