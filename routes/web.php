<?php

use Illuminate\Support\Facades\Route;
use App\Models\userInfo;

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

Route::get('/TC', function () {
    return view('TC');
});

Route::get('/ticket', function () {
    return view('ticket');
});

Route::post('/submit-form', 'FormController@store')->name('submit.form');
