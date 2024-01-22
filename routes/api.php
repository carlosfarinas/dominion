<?php

use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResponsibilitiesController;
use App\Http\Controllers\SuppliesController;
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


// Test
Route::get('/products/test', function (){
    return "test";
});

// Personnel
Route::prefix('personnel')->group(function () {
    Route::get('/', [PersonnelController::class, "index"]);
    Route::get('/{personnel_id}', [PersonnelController::class, "show"]);
    Route::put('/create', [PersonnelController::class, "store"]);
    Route::post('/update/{personnel_id}', [PersonnelController::class, "update"]);
    Route::delete('/delete/{personnel_id}', [PersonnelController::class, "destroy"]);
});

//Responsibilities
Route::prefix('responsibility')->group(function () {
    Route::get('/', [ResponsibilitiesController::class, "index"]);
    Route::get('/{responsibility_id}', [ResponsibilitiesController::class, "show"]);
    Route::put('/create', [ResponsibilitiesController::class, "store"]);
    Route::post('/update/{responsibility_id}', [ResponsibilitiesController::class, "update"]);
    Route::delete('/delete/{responsibility_id}', [ResponsibilitiesController::class, "destroy"]);
});

//Supplies
Route::prefix('supplies')->group(function () {
    Route::get('/', [SuppliesController::class, "index"]);
    Route::get('/{supplies_id}', [SuppliesController::class, "show"]);
    Route::put('/create', [SuppliesController::class, "store"]);
    Route::post('/update/{supplies_id}', [SuppliesController::class, "update"]);
    Route::delete('/delete/{supplies_id}', [SuppliesController::class, "destroy"]);
});

//Reports
Route::prefix('reports')->group(function () {
    Route::get('/stocks', [ReportController::class, "stock_levels"]); // * What are the current stock levels so we can plan our next round of planting?
    Route::get('/restocks', [ReportController::class, "restock"]); // * What tools may we need to restock or increase in order to support a given products expansion?
    Route::get('/in_charge', [ReportController::class, "in_charge"]); // * Which Personnel are in charge of which products?

});
