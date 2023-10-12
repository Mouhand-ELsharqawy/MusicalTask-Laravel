<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\VenueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    Route::controller(ArtistController::class)->group(function(){
        Route::get('/artist','index');
        Route::post('/artist','store');
        Route::get('/artist/{id}','show');
        Route::patch('/artist/{id}','update');
        Route::delete('/artist/{id}','destroy');
    });

    Route::controller(ShowController::class)->group(function(){
        Route::get('/show','index');
        Route::post('/show','store');
        Route::get('/show/{id}','show');
        Route::patch('/show/{id}','update');
        Route::delete('/show/{id}','destroy');
    });

    Route::controller(VenueController::class)->group(function(){
        Route::get('/venue','index');
        Route::post('/venue','store');
        Route::get('/venue/{id}','show');
        Route::patch('/venue/{id}','update');
        Route::delete('/venue/{id}','destroy');
    });