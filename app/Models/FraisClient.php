<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraisClient extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function fraitClient(){

        return $this->belongsTo(Agence::class,'code_agence', 'code_agence');

    }
        public function fraisRealisers(){

            return $this->hasMany(FraisClientRealiser::class, 'frais_client_id');
        }
}
