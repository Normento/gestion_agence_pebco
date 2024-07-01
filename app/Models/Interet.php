<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function agence(){
        return $this->belongsTo(Agence::class,'code_agence','code_agence');
    }

    public function interets(){
        return $this->hasManyThrough(Region::class,Agence::class,'region_id','code_agence','id','code_agence');
    }
}
