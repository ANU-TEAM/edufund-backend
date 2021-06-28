<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\ApiPasswordResetNotification;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardApplicationController;

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


    // Feedback Routes
    Route::get('/feedbacks/comments', [DashboardController::class, 'feedbacks'])->name('feedbacks');

    Route::get('/feedbacks/resolve/{id}', [FeedbackController::class, 'resolve'])->name('resolve');

    Route::get('/feedbacks/unresolve/{id}', [FeedbackController::class, 'unresolve'])->name('unresolve');

    Route::get('/feedbacks/resolved', [FeedbackController::class, 'resolvedIssues'])
    ->name('feedbacks.resolved');

    Route::get('/feedbacks/unresolved', [FeedbackController::class, 'unresolvedIssues'])
    ->name('feedbacks.unresolved');

    
    Route::get('/approve/{id}', [DashboardController::class, 'approve'])->name('approve');

    Route::get('/reject/{id}', [DashboardController::class, 'reject'])->name('reject');

    Route::get('/pending/{id}', [DashboardController::class, 'pending'])->name('pending');

    Route::get('/sponsored/{id}', [DashboardController::class, 'sponsored'])->name('sponsored');


    // Applications Routes
    Route::get('/applications/all', [DashboardApplicationController::class, 'index'])
        ->name('all-applications');
    
    Route::get('/applications/approved', [DashboardApplicationController::class, 'approved'])
        ->name('approved-applications');
    
    Route::get('/applications/pending', [DashboardApplicationController::class, 'pending'])
        ->name('pending-applications');

    Route::get('/applications/rejected', [DashboardApplicationController::class, 'rejected'])
        ->name('rejected-applications');

    Route::get('/applications/sponsored', [DashboardApplicationController::class, 'sponsored'])
        ->name('sponsored-applications');

    // School Routes
    Route::resource('schools', SchoolController::class);

});



require __DIR__.'/auth.php';
