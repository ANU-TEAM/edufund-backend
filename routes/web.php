<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\ApiPasswordResetNotification;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/mail', function () {
//     return (new ApiPasswordResetNotification(43445))->toMail('wwww');
// });

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/detail/{id}', [DashboardController::class, 'detail']);

    Route::get('/dashboard/feedbacks', [DashboardController::class, 'feedbacks'])->name('feedbacks');

    Route::get('/dashboard/approve/{id}', [DashboardController::class, 'approve']);

    Route::get('/dashboard/reject/{id}', [DashboardController::class, 'reject']);

    Route::get('/dashboard/pending/{id}', [DashboardController::class, 'pending']);

});



require __DIR__.'/auth.php';
