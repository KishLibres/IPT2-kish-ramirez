<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\AdminApiController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\SettingsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Profiles API (moved under Api namespace)
Route::post('/register', [ProfileController::class, 'store']);
Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/profiles/{profile}', [ProfileController::class, 'show']);
Route::put('/profiles/{profile}', [ProfileController::class, 'update']);
Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy']);

Route::middleware('auth:api')->group(function () {
    
});

// Admin portal endpoints
Route::get('/stats', [AdminApiController::class, 'stats']);

// Faculty CRUD
Route::get('/faculty', [FacultyController::class, 'index']);
Route::post('/faculty', [FacultyController::class, 'store']);
Route::put('/faculty/{faculty}', [FacultyController::class, 'update']);
Route::delete('/faculty/{faculty}', [FacultyController::class, 'destroy']);
Route::post('/faculty/{faculty}/restore', [FacultyController::class, 'restore']);

// Students CRUD
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::put('/students/{student}', [StudentController::class, 'update']);
Route::delete('/students/{student}', [StudentController::class, 'destroy']);

// Reports (CSV downloads)
Route::get('/reports/students.csv', [ReportController::class, 'studentsCsv']);
Route::get('/reports/faculty.csv', [ReportController::class, 'facultyCsv']);

// Settings lists
Route::get('/settings/courses', [SettingsController::class, 'courses']);
Route::get('/settings/departments', [SettingsController::class, 'departments']);
Route::get('/settings/academic-years', [SettingsController::class, 'academicYears']);
Route::post('/settings/courses', [SettingsController::class, 'storeCourse']);
Route::post('/settings/departments', [SettingsController::class, 'storeDepartment']);
Route::post('/settings/academic-years', [SettingsController::class, 'storeAcademicYear']);
Route::post('/students/{student}/restore', [StudentController::class, 'restore']);