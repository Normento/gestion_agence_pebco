<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('depense', 'Api\PrevisionController@depense');

Route::get('frais_clent', 'Api\PrevisionController@frais_clent');
Route::get('prevision', 'Api\PrevisionController@index');
Route::get('agence', 'Api\PrevisionController@agence');
 