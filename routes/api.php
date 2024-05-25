<?php

use App\Http\Controllers\API\ADMIN\TeamsController;
use App\Http\Controllers\api\Admin\UsersController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Posts\PostController;
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
    Route::get('/user-role/{id}',[UsersController::class,'getRole']);
    //teams
    Route::get('/teams',[TeamsController::class,'index']);
    Route::post('/teams-create',[TeamsController::class,'create']);
    Route::put('/teams-update',[TeamsController::class,'update']);
    Route::delete('/teams-delete',[TeamsController::class,'delete']);
    //teams-user
    Route::post('/teams-addUser',[TeamsController::class,'addUser']);
    Route::get('/teams-showUsers',[TeamsController::class,'showUsers']);
    Route::post('/teams-removeUser',[TeamsController::class,'removeUser']);
    Route::get('/teams-showPosts',[TeamsController::class,'getPosts']);
    //posts
    Route::get('/posts',[PostController::class,'index']);
    Route::get('/post-show',[PostController::class,'show']);
    Route::post('/post-create',[PostController::class,'create']);
    Route::post('/post-update',[PostController::class,'update']);
    Route::delete('/post-delete',[PostController::class,'delete']);
    Route::get('/post-getChapters',[PostController::class,'getChapters']);
});

