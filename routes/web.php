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

Route::get('/', function () {
    return view('index');
});
Route::get('/form', function () {
    return view('form');
});
Route::get('/get-price', [App\Http\Controllers\FormController::class, 'getPrice'])->name('get.price');
Route::post('/form/{payment}', [App\Http\Controllers\FormController::class, 'store']);
Route::post('/ticket', [App\Http\Controllers\FormController::class, 'show'])->name('ticket');
Route::post('/oneTimePin', function () {
    return view('paymaya.oneTimePin');
});