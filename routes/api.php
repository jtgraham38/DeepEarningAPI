<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SetController; 
use App\Http\Controllers\Api\ImageController; 
use App\Http\Controllers\Api\ResultController; 

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

Route::get('/', function () {
    return request()->input('uno') * 7;
});

Route::get('/sets', [SetController::class, 'all']);
Route::get('/sets/{id}', [SetController::class, 'get']);
Route::resource('sets', SetController::class)->only([
    'store', 'update', 'destroy'
]);

Route::get('/results/{id}', [ResultController::class, 'get']);
Route::resource('results', ResultController::class)->only([
    'store', 'update', 'destroy'
]);

Route::get('/images/{id}', [ImageController::class, 'get']);
Route::resource('images', ImageController::class)->only([
    'store', 'update', 'destroy'
]);
