<?php

use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReplyController;

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



Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// for users
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/myprofile', [DashboardController::class, 'myprofile'])->name('dashboard.myprofile');
    Route::put('/dashboard/myprofile', [DashboardController::class, 'update'])->name('dashboard.myprofile');
    Route::get('/complaint', function () {
        return view('complaint');
    });
    Route::post('complaint', [ComplaintController::class, 'store'])->name('complaint');
});

Route::get('dashboard', [ComplaintController::class, 'dash'])->name('dashboard');

// admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('complaints', [ComplaintController::class, 'index'])->name('complaints');
    Route::get('/change-status/{id}', [ComplaintController::class, 'changeStatus'])->name('changeStatus');
    Route::get('/view/{id}', [ComplaintController::class, 'view'])->name('view');


    Route::get('view', [ComplaintController::class, 'show'])->name('show');;
    Route::post('view', [ComplaintController::class, 'create'])->name('create');
    Route::get('/send', [MailController::class, 'sendEmail']);
});

require __DIR__.'/auth.php';
