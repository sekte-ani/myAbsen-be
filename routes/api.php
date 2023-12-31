<?php

use App\Http\Controllers\api\AttendanceController;
use App\Http\Controllers\api\LeaveController;
use App\Http\Controllers\api\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/attendance-in', [AttendanceController::class, 'AttendanceIn']);
    Route::post('/attendance-out', [AttendanceController::class, 'AttendanceOut']);
    Route::get('/attendance-in-check', [AttendanceController::class, 'AttendanceInCheck']);
    Route::get('/attendance-count', [AttendanceController::class, 'CountAttendance']);
    Route::get('/attendance-latest', [AttendanceController::class, 'LatestAttendance']);
    Route::get('/attendance-history', [AttendanceController::class, 'AttendanceHistory']);


    // Cuti
    Route::post('/leave', [LeaveController::class, 'InputLeave']);
    Route::get('/leave', [LeaveController::class, 'Index']);
    Route::get('/leave-count', [LeaveController::class, 'CountLeave']);

    // Profile
    Route::get('profile', [ProfileController::class, 'Index']);
    Route::post('profile', [ProfileController::class, 'Update']);


    Route::get('/logout', [AuthController::class, 'logout']);

});
