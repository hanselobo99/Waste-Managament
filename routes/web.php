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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role == 'admin') {
            $complaints = Complaint::with('complaintPhotos')
                ->whereHas('complaintStatus', function ($query) {
                    $query->where('status', 'pending');
                })->with('user')->with('complaintPhotos')->get();
            return view('admin/dashboard', compact('complaints'));
        } else if (Auth::user()->role == 'driver') {
            return view('driver/dashboard');
        } else {
            $complaints = Complaint::with('complaintPhotos')
                ->whereHas('complaintStatus', function ($query) {
                    $query->where('status', 'pending');
                })->with('user')->with('complaintPhotos')->where('user_id', Auth::id())->get();
            return view('user/dashboard', compact('complaints'));
        }
    })->name('dashboard');
    Route::prefix('user')->group(function () {
        Route::resource('complaint', \App\Http\Controllers\User\ComplaintController::class)->except(['edit', 'update', 'destroy']);
    });
    Route::prefix('admin')->group(function () {
        Route::controller( \App\Http\Controllers\Admin\ComplaintController::class)->prefix('complaint')->group(function (){
            Route::get('','viewAll')->name('admin.complaint.all');
            Route::get('{id}','viewOne')->name('admin.complaint.show');
            Route::post('assign/{id}','assign')->name('admin.complaint.save');
        });
    });

});

