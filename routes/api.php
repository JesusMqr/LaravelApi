<?php

use App\Http\Controllers\api\Admin\UsersController;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Register
Route::post('/register', [ApiController::class,'register']);

//Login
Route::post('/login', [ApiController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    //profile
    Route::get('/profile', [ApiController::class,'profile']);
    //logout
    Route::get('/logout', [ApiController::class,'logout']);
});

Route::group(['middleware'=>['auth:sanctum']],function(){
    //users
    Route::get('/users',[UsersController::class,'index']);
});


Route::get('/user', function (Request $request) {
   return $request->user();
})->middleware('auth:sanctum');
