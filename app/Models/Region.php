<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'code_region',
        'nom_region'
    ];

    public function agences(){
        return $this->hasMany(Agence::class);
    }

    public function interets(){
        return $this->hasManyThrough(Interet::class,Agence::class,'region_id','code_agence','id','code_agence');
    }

    public function interetRealisers(){
        return $this->hasManyThrough(InteretRealiser::class,Agence::class,'region_id','code_agence','id','code_agence');
    }

    public function frais(){
        return $this->hasManyThrough(FraisClient::class,Agence::class,'region_id','code_agence','id','code_agence');
    }
    public function fraisRealisers(){
        return $this->hasManyThrough(FraisClientRealiser::class,Agence::class,'region_id','code_agence','id','code_agence');
    }

    public function depenses(){
        return $this->hasManyThrough(Depense::class,Agence::class,'region_id','code_agence','id','code_agence');
    }

    public function depensesRealisers(){
        return $this->hasManyThrough(DepenseRealiser::class,Agence::class,'region_id','code_agence','id','code_agence');
    }
}
