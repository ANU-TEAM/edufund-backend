<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FeedbackController;

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

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/applications', [ApplicationController::class, 'index']);

Route::get('/feedbacks', [FeedbackController::class, 'index']);
Route::post('/feedbacks', [FeedbackController::class, 'store']);


Route::get('/applications/{id}', [ApplicationController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::get('/user', function () {
        return auth()->user();
    });
    
    Route::get('/user/applications', [ApplicationController::class, 'user']);
    Route::post('/applications', [ApplicationController::class, 'store']);
    Route::post('/applications/{id}', [ApplicationController::class, 'update']);
    Route::delete('/applications/{id}', [ApplicationController::class, 'destroy']);

});