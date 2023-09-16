<?php

use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Controller::class, 'index'])->name('dashboard');
    Route::prefix('user')->group(function () {
        Route::resource('complaint', \App\Http\Controllers\User\ComplaintController::class)->except(['edit', 'update', 'destroy']);
    });
    Route::prefix('admin')->group(function () {
        Route::controller(\App\Http\Controllers\Admin\ComplaintController::class)->prefix('complaint')->group(function () {
            Route::get('', 'viewAll')->name('admin.complaint.all');
            Route::get('{id}', 'viewOne')->name('admin.complaint.show');
            Route::post('assign/{id}', 'assign')->name('admin.complaint.save');
        });
        Route::resource('user', \App\Http\Controllers\Admin\UserController::class)->except(['edit', 'update', 'destroy', 'show']);
    });
    Route::prefix('driver')->group(function () {
        Route::controller(\App\Http\Controllers\Driver\ComplaintController::class)->prefix('complaint')->group(function () {
            Route::get('', 'viewAll')->name('driver.complaint.all');
            Route::get('accept/{id}', 'accept')->name('driver.complaint.accept');
            Route::get('reject/{id}', 'reject')->name('driver.complaint.reject');
            Route::get('complete/{id}', 'completed')->name('driver.complaint.complete');
            Route::get('{id}', 'viewOne')->name('driver.complaint.show');
        });
    });


});

Route::get('technology', function () {
    return view('pages.technologies');
})->name('technologies');
Route::get('recycling', function () {
    return view('pages.recycling');
})->name('recycling');
