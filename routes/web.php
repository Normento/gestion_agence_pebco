<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'direction', 'middleware' => ['auth', 'password', '2fa','isactive']], function () {
    //Poste
    Route::resource('poste', PosteController::class);
    //region
    Route::resource('region', RegionController::class);
    //agence
    Route::resource('agence', AgenceController::class);
    //user
    Route::resource('user', UserController::class);
   // Route::put('status/{$user}' , 'UserController@status')->name('status');
    Route::put('statu/{user}', 'UserCodeController@status')->name('statu');
    //interêt
    Route::resource('interet', InteretController::class);
    //frais client
    Route::resource('fraisClient', FraisClientController::class);
    //depense
    Route::resource('depense', DepenseController::class);
    //previson
    Route::get('prevision', 'DashboardController@prevision')->name('prevision');
    Route::post('prevision/filtrage', 'DashboardController@filtrage')->name('prevision.filtrage');
    Route::post('previsionRealisers', 'PrevisionController@interet')->name("previsionRealisers");
    //exportation du pdf et excel du budget
    Route::post('exportations', 'ExportController@exportpdf')->name('exportation');
    //Exportation des realisations
    Route::get('pdfrealisation', 'ExportController@pdfRealisation')->name('pdfrealisation');
    //import
    Route::post('import', 'ExportController@import')->name('import');
    //regroupement
    Route::post('regroupement', 'RegroupementController@regroupement')->name('regroupement');
    //regroupement exportation budget
    Route::get('exportPdfgroupeBudget','RegroupementController@pdfGroupeBudget')->name('exportPdfgroupeBudget');
    //regroupement exportation realisation
    Route::get('exportPdfrealisationRegion','RegroupementController@pdfRealisationRegion')->name('exportPdfrealisationRegion');
    //operation

    Route::get('operation','OperationController@index')->name('operation');
});
Route::middleware('auth', 'password', '2fa')->group(function () {
    //dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::post('statistique', 'DashboardController@regionStatistique')->name('statistique');
});
//password manager
Route::middleware('auth','isactive')->group(function () {

    //edit password form user
    Route::get('editPassword', 'UserController@editPassword')->name("editPassword");
    //update form user
    Route::put('updatePassword/{user}', 'UserController@updatePassword')->name('updatePassword');
});
Route::middleware('auth', 'password','isactive')->group(function () {
    //code
    Route::resource('code', UserCodeController::class);
    Route::get('code/ressent', 'UserCodeController@resend')->name('2fa.resend');
});

Route::fallback(function () {
    return view("admin.error.404");
});
//view unlock
Route::get('unlock','UserCodeController@viewunlock')->name('unlock')->middleware('auth');

require __DIR__ . '/auth.php';
