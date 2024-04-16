<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Front\WelcomeController::class, 'index'])->name('front.index');
Route::get('/about', [\App\Http\Controllers\Front\WelcomeController::class, 'about'])->name('front.about');
Route::get('/booking', [\App\Http\Controllers\Front\WelcomeController::class, 'booking'])->name('front.booking');
Route::post('/booking', [\App\Http\Controllers\Front\WelcomeController::class, 'bookingStore'])->name('front.booking.store');
Route::get('/contact', [\App\Http\Controllers\Front\WelcomeController::class, 'contact'])->name('front.contact');
Route::get('/menu', [\App\Http\Controllers\Front\WelcomeController::class, 'menu'])->name('front.menu');
Route::get('/service', [\App\Http\Controllers\Front\WelcomeController::class, 'service'])->name('front.service');
Route::get('/team', [\App\Http\Controllers\Front\WelcomeController::class, 'team'])->name('front.team');
Route::get('/testimonial', [\App\Http\Controllers\Front\WelcomeController::class, 'testimonial'])->name('front.testimonial');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/admin', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->middleware('admin');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class,'index'])->name('index');
    Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/menus', \App\Http\Controllers\Admin\MenuController::class);
    Route::resource('/tables', \App\Http\Controllers\Admin\TableController::class);
    Route::resource('/reservations', \App\Http\Controllers\Admin\ReservationController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
