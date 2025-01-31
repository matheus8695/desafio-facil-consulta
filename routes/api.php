<?php

use App\Http\Controllers\{Auth, CityController, DoctorController, PatientController};
use Illuminate\Support\Facades\Route;

#auth routes
Route::post('/login', [Auth\AuthController::class, 'login']);
#end

#city routes
Route::get('/cidades', CityController::class);
#end

#doctor routes
Route::get('/medicos', [DoctorController::class, 'index']);
Route::get('/cidades/{id_cidade}/medicos', [DoctorController::class, 'index']);
#end

Route::group(['middleware' => 'auth:api'], function () {
    #auth routes
    Route::post('/logout', [Auth\AuthController::class, 'logout']);
    Route::post('/me', [Auth\AuthController::class, 'me']);
    #end

    #patient routes
    Route::get('/medicos/{id_medico}/pacientes', [PatientController::class, 'index']);
    Route::post('/pacientes/{patient}', [PatientController::class, 'update']);
    Route::post('/pacientes', [PatientController::class, 'store']);
    #end
});
