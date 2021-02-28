<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/user', function () {
        return auth()->user();
    });

});


// Takes in an email, checks if the email exists and sends a 6 alpha-numeric code to the email of the user
Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetToken'])->name('api-reset-password');

// This routes takes in the code received from the email and ensures that it is valid
Route::post('/reset-password-token', [AuthController::class, 'resetPassword'])->name('api-reset-password-token');

// Takes in the new password and confirmation password and resets the password
Route::post('/new-password', [AuthController::class, 'setNewAccountPassword'])->name('new-account-password');
