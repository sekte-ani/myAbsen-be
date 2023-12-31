<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/login', function(){
    return view('auth.login');
});

Route::get('/', function(){
    return view('dashboard.index');
})->name('dashboard');

Route::get('/cuti', function(){
    return view('cuti.index');
})->name('cuti');

Route::get('/riwayat-cuti', function(){
    return view('cuti.history');
})->name('riwayat-cuti');
Route::get('/detail-cuti', function(){
    return view('cuti.show');
})->name('detail-cuti');

Route::post('/logout', function(){

});