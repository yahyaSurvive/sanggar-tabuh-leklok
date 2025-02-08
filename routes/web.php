<?php

use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\HomeController as UserHome;
use App\Http\Controllers\User\ActivityController as UserActivity;
use App\Http\Controllers\User\ContactController as UserContact;
use App\Http\Controllers\User\HelpController as UserHelp;
use App\Http\Controllers\User\QuizController as UserQuiz;
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

Route::middleware(['auth'])->group(callback: function () {
    Route::middleware(['role:user,admin'])->group(function () {
        Route::prefix('/quiz')->group(function () {
            Route::get('/', [UserQuiz::class, 'index'])->name('quiz');
            Route::get('/start', [UserQuiz::class, 'quiz_start'])->name('quiz.start');
            Route::post('/start', [UserQuiz::class, 'quiz_submit'])->name('quiz.submit');
            Route::get('/review-answers/{id}', [UserQuiz::class, 'review_answers'])->name('quiz.review-answers');
        });
        Route::prefix('/user')->group(function () {
            Route::get('/profile', [UserSetting::class, 'profile'])->name('user.profile');
            Route::post('/profile', [UserSetting::class, 'update_profile'])->name('user.profile.update');
            Route::get('/change-password', [UserSetting::class, 'change_password'])->name('user.change-password');
            Route::post('/change-password', [UserSetting::class, 'update_password'])->name('user.update-password');
        });
    });
});

Route::prefix('/about-us')->group(function () {
    Route::get('/history', [UserAbout::class, 'history'])->name('about-us.history');
    Route::get('/meaning', [UserAbout::class, 'meaning'])->name('about-us.meaning');
    Route::get('/achievement', [UserAbout::class, 'achievement'])->name('about-us.achievement');
    Route::get('/trainer-profile', [UserAbout::class, 'trainerProfile'])->name('about-us.trainer-profile');
});
Route::prefix('/activity')->group(function () {
    Route::get('/gallery', [UserActivity::class, 'gallery'])->name('activity.gallery');
    Route::get('/course', [UserActivity::class, 'course'])->name('activity.course');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot_password');
Route::get('/reset-password', [AuthController::class, 'showFormResetPassword'])->name('showFormResetPassword');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password.post');
Route::post('/reset-password', [AuthController::class, 'submitResetPassword'])->name('submitResetPassword.post');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        // Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::prefix('admin')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

            Route::prefix('/quiz')->group(function () {
                Route::get('/', [QuizController::class, 'index'])->name('admin.quiz');
                Route::post('/store', [QuizController::class, 'store'])->name('admin.quiz.store');
                Route::post('/update/{id}', [QuizController::class, 'update'])->name('admin.quiz.update');
                Route::get('/show/{id}', [QuizController::class, 'detail'])->name('admin.quiz.detail');
                Route::delete('/delete/{id}', [QuizController::class, 'destroy'])->name('admin.quiz.destroy');
            });

            Route::prefix('/gallery')->group(function () {
                Route::get('/', [GalleryController::class, 'index'])->name('admin.gallery');
                Route::post('/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
                Route::get('/get-gallery', [GalleryController::class, 'getGallery'])->name('admin.gallery.get');
            });
            Route::prefix('/achievement')->group(function () {
                Route::get('/', [AchievementController::class, 'index'])->name('admin.achievement');
                Route::post('/store', [AchievementController::class, 'store'])->name('admin.achievement.store');
                Route::get('/get-achievement', [AchievementController::class, 'getAchievement'])->name('admin.achievement.get');
            });

            Route::prefix('/course')->group(function () {
                Route::get('/', [CourseController::class, 'index'])->name('admin.course');
                Route::post('/store', [CourseController::class, 'store'])->name('admin.course.store');
                Route::post('/update/{id}', [CourseController::class, 'update'])->name('admin.course.update');
                Route::get('/show/{id}', [CourseController::class, 'detail'])->name('admin.course.detail');
                Route::delete('/delete/{id}', [CourseController::class, 'destroy'])->name('admin.course.destroy');
            });

            Route::prefix('/profile')->group(function () {
                Route::get('/', [ProfileController::class, 'index'])->name('admin.profile');
                Route::post('/update', [ProfileController::class, 'update'])->name('admin.profile.store');
            });

        });
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::fallback(function () {
    return response()->view('user.404', [], 404);
});

