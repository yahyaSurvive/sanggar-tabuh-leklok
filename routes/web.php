<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\ActivityController as UserActivity;
use App\Http\Controllers\User\ContactController as UserContact;
use App\Http\Controllers\User\HelpController as UserHelp;
use App\Http\Controllers\User\QuisController as UserQuis;
use App\Http\Controllers\User\AboutController as UserAbout;
use App\Http\Controllers\User\BerandaController as UserBeranda;
use App\Http\Controllers\User\UserController as UserSetting;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserBeranda::class, 'index'])->name('/');
Route::get('/contact-person', function () {
    return view('user.pages.contact-person');
})->name('contact-person');
Route::get('/help', function () {
    return view('user.pages.help');
})->name('help');

Route::prefix('/quis')->group(function () {
    Route::get('/', [UserQuis::class, 'index'])->name('quis');
    Route::get('/start', [UserQuis::class, 'quis_start'])->name('quis.start');
    Route::post('/start', [UserQuis::class, 'quis_submit'])->name('quis.submit');
});

Route::prefix('/about-us')->group(function () {
    Route::get('/history', [UserAbout::class, 'history'])->name('about-us.history');
    Route::get('/meaning', [UserAbout::class, 'meaning'])->name('about-us.meaning');
});
Route::prefix('/activity')->group(function () {
    Route::get('/gallery', [UserActivity::class, 'gallery'])->name('activity.gallery');
    Route::get('/course', [UserActivity::class, 'course'])->name('activity.course');
});

Route::prefix('/user')->group(function () {
    Route::get('/profile', [UserSetting::class, 'profile'])->name('user.profile');
    Route::post('/profile', [UserSetting::class, 'update_profile'])->name('user.profile.update');
    Route::get('/change-password', [UserSetting::class, 'change_password'])->name('user.change-password');
    Route::post('/change-password', [UserSetting::class, 'update_password'])->name('user.update-password');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});
