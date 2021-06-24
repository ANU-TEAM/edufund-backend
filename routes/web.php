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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verify.admin']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/detail/{id}', [DashboardController::class, 'detail'])->name('detail');

    Route::get('/feedbacks', [DashboardController::class, 'feedbacks'])->name('feedbacks');

    Route::get('/approve/{id}', [DashboardController::class, 'approve'])->name('approve');

    Route::get('/reject/{id}', [DashboardController::class, 'reject'])->name('reject');

    Route::get('/pending/{id}', [DashboardController::class, 'pending'])->name('pending');

});



require __DIR__.'/auth.php';
