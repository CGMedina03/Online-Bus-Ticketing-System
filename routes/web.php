<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Models\information;
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
Route::post('/form/submit-form', [App\Http\Controllers\FormController::class, 'store']);
Route::get('form/terms-and-conditions', function () {
    return view('TC');
});
Route::get('/form/ticket', function () {
    return view('ticket');
});
