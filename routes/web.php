<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\HomeController as UserHome;
use App\Http\Controllers\User\ActivityController as UserActivity;
use App\Http\Controllers\User\ContactController as UserContact;
use App\Http\Controllers\User\HelpController as UserHelp;
use App\Http\Controllers\User\QuisController as UserQuis;
use App\Http\Controllers\User\AboutController as UserAbout;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserHome::class, 'index'])->name('/');
Route::get('/activity', [UserActivity::class, 'index'])->name('activity');
Route::get('/contact-person', [UserContact::class, 'index'])->name('contact-person');
Route::get('/help', [UserHelp::class, 'index'])->name('help');
Route::get('/quis', [UserQuis::class, 'index'])->name('quis');
Route::get('/about-us', [UserAbout::class, 'index'])->name('about-us');

Route::get('/admin', [AdminController::class, 'index']);
