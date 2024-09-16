<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('profile', [UserController::class,'profile']);
    Route::get('logout', [UserController::class,'logout']);
    Route::post('/refresh', [UserController::class, 'refresh']);
});

