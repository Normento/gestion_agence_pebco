<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteretRealiser extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function intereretsrea(){
        $this->hasMany(Agence::class,'code_agence','code_agence');
    }
}
