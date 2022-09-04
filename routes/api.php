<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoContrller;
use App\Models\Todo;
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

Route::get('/hello',function() {
    return 'hello world';
});


Route::get('/hello-yai',function() {
    return 'hello yai';
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/todo', [TodoContrller::class, 'index']);
    Route::get('/todo/{id}', [TodoContrller::class, 'show']);
    Route::post('/todo', [TodoContrller::class, 'store']);
    Route::put('/todo/{id}', [TodoContrller::class, 'update']);
    Route::delete('/todo/{id}', [TodoContrller::class, 'destroy']); 

    Route::post('/logout',[AuthController::class,'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
