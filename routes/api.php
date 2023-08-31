<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ClasseController;
use App\Http\Controllers\Api\V1\EtudiantController;

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

Route::group(['prefix' => "v1", 'namespace' => 'App\Http\Controllers\Api\V1'],function () {

        Route::apiResource('/etudiants' ,EtudiantController::class);
        Route::post('/etudiant' ,[EtudiantController::class,'store']);
        Route::get('/etudiant/{id}' ,[EtudiantController::class,'show']);
        Route::get('/etudiant/{id}/edit' ,[EtudiantController::class,'edit']);
        Route::put('/etudiant/{id}/edit' ,[EtudiantController::class,'update']);
        Route::delete('/etudiant/{id}/delete' ,[EtudiantController::class,'destroy']);

        Route::get('/classes', [ClasseController::class,'index']);

});


//Route::get('/etudiants' ,[EtudiantController::class,'index']);
