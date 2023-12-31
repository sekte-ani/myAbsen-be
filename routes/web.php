<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AttendanceController;

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
Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout',  [LoginController::class, 'logout']);
    
    Route::get('/', [UserController::class, 'index'])->name('dashboard');
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);

    Route::get('/absen', [AttendanceController::class, 'index']);
    Route::get('/absen/export/excel', [AttendanceController::class, 'export']);

    Route::get('/cuti', [LeaveController::class, 'index'])->name('cuti');
    Route::get('/detail-cuti/{id}', [LeaveController::class, 'show'])->name('detail-cuti');
    Route::put('/accept/{leave:id}', [LeaveController::class, 'accept']);
    Route::put('/decline/{leave:id}', [LeaveController::class, 'decline']);

    Route::get('/riwayat-cuti', [HistoryController::class, 'index'])->name('riwayat-cuti');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');;
Route::post('/login',  [LoginController::class, 'authenticate']);
