<?php

use App\Http\Controllers\{Auth, CityController};
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [Auth\AuthController::class, 'login']);

Route::get('/cidades', [CityController::class, 'index']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/logout', [Auth\AuthController::class, 'logout']);
    Route::post('/me', [Auth\AuthController::class, 'me']);
});
