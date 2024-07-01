<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'user_id',
        'code_agence',
        'nom_agence',
        'region_id',
    ];
    public function interetrealiser(){
        return $this->hasManyThrough(Agence::class,Interet::class,'code_agence','code_agence');
    }
}
