<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Add a simple login page using the uploaded background image
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Redirect root to the login page so the app opens on login
Route::get('/', function () {
    return redirect('/login');
});

// Auth routes
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/dashboard/faculty', function () { return view('sections.faculty'); })->name('dashboard.faculty');
    Route::get('/dashboard/students', function () { return view('sections.students'); })->name('dashboard.students');
    Route::get('/dashboard/reports', function () { return view('sections.reports'); })->name('dashboard.reports');
    Route::get('/dashboard/settings', function () { return view('sections.settings'); })->name('dashboard.settings');
});
