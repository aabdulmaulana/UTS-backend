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
Router::post('/register', [AuthController::class, 'register']);
Router::post('/login', [AuthController::class, 'login']);

Route:middleware(['auth:sanctum'])->group(function () {
    #method get
    Route::get('patients', [PatientController::class, 'index'])->middleware('auth:sanctum');
    #method post
    Route::post('patients', [PatientController::class, 'store'])->middleware('auth:sanctum');
    #method put
    Route::put('patients/{id}', [PatientController::class, 'update'])->middleware('auth:sanctum');
    #method delete
    Route::delete('patients/{id}', [PatientController::class, 'destroy'])->middleware('auth:sanctum');
    #method get
    Route::get('patients/{id}', [PatientController::class, 'show'])->middleware('auth:sanctum');



});

