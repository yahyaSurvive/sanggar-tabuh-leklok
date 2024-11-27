<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\ActivityController as UserActivity;
use App\Http\Controllers\User\ContactController as UserContact;
use App\Http\Controllers\User\HelpController as UserHelp;
use App\Http\Controllers\User\QuisController as UserQuis;
use App\Http\Controllers\User\AboutController as UserAbout;
use App\Http\Controllers\User\BerandaController as UserBeranda;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserBeranda::class, 'index'])->name('/');
Route::get('/activity', [UserActivity::class, 'index'])->name('activity');
Route::get('/contact-person', [UserContact::class, 'index'])->name('contact-person');
Route::get('/help', [UserHelp::class, 'index'])->name('help');
Route::get('/quis', [UserQuis::class, 'index'])->name('quis');
Route::prefix('/about-us')->group(function () {
    Route::get('/history', [UserAbout::class, 'history'])->name('about-us.history');
    Route::get('/meaning', [UserAbout::class, 'meaning'])->name('about-us.meaning');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});
