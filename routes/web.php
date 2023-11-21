<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['web'])->group(function () {
    Auth::routes(['verify' => true]);
});
Route::get('email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth', 'verified'])->name('verification.notice');
