<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CourseController;
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

    Route::prefix('/gallery')->group(function(){
        Route::get('/', [GalleryController::class, 'index'])->name('admin.gallery');
        Route::post('/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::get('/get-gallery', [GalleryController::class, 'getGallery'])->name('admin.gallery.get');
    });

    Route::prefix('/course')->group(function(){
        Route::get('/', [CourseController::class, 'index'])->name('admin.course');
        Route::post('/store', [CourseController::class, 'store'])->name('admin.course.store');
        Route::post('/update/{id}', [CourseController::class, 'update'])->name('admin.course.update');
        Route::get('/show/{id}', [CourseController::class, 'detail'])->name('admin.course.detail');
        Route::delete('/delete/{id}', [CourseController::class, 'destroy'])->name('admin.course.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
});
