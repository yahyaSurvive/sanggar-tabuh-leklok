<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\HomeController as UserHome;
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
Route::get('/about-us', [UserAbout::class, 'index'])->name('about-us');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot_password');

Route::prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('/quiz')->group(function(){
        Route::get('/', [QuizController::class, 'index'])->name('admin.quiz');
        Route::post('/store', [QuizController::class, 'store'])->name('admin.quiz.store');
        Route::post('/update/{id}', [QuizController::class, 'update'])->name('admin.quiz.update');
        Route::get('/show/{id}', [QuizController::class, 'detail'])->name('admin.quiz.detail');
        Route::delete('/delete/{id}', [QuizController::class, 'destroy'])->name('admin.quiz.destroy');
    });
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
});
