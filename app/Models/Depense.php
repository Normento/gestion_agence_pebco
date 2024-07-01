<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function depense(){
        return $this->belongsTo(Agence::class,'code_agence','code_agence');
    }

    public function depenseRealiser(){

        return $this->hasMany(DepenseRealiser::class);
    }
}
