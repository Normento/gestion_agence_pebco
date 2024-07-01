<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;

class OperationController extends Controller
{
   public function index(){
    $agences = Agence::all();
    return view('admin.operation.index',compact('agences'));
   }
}
