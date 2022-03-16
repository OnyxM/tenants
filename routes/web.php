<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\FactureEauController;
use App\Http\Controllers\FactureElectriciteController;
use App\Http\Controllers\FamilleController;
use Illuminate\Support\Facades\Route;

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
Auth::routes(['register' => false]);


Route::get('', [AppController::class, "index"])->name("index");
Route::get('famille/add', [FamilleController::class, "add"])->name("famille.add");
Route::get('famille/{famille_slug}', [FamilleController::class, "details"])->name("famille.details");
Route::get('famille/{famille_slug}/facture-eau/ajout', [FactureEauController::class, "add"])->name("famille.fac_eau.add");
Route::post('famille/{famille_slug}/facture-eau/ajout', [FactureEauController::class, "store"])->name("famille.fac_eau.store");
Route::get('famille/{famille_slug}/facture-eau/supprimer/{id}', [FactureEauController::class, "delete"])->name("famille.fac_eau.delete");
Route::get('famille/{famille_slug}/facture-electricite/ajout', [FactureElectriciteController::class, "add"])->name("famille.fac_electricite.add");
//Route::get('famille/{famille_slug}/electricity-bills', [AppController::class, "electricityBills"])->name("famille.details");
//Route::get('famille/{famille_slug}/water-bills', [AppController::class, "waterBilles"])->name("famille.details");
