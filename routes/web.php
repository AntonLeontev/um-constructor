<?php

use App\Http\Controllers\OpenAIController;
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
    return view('home');
})->name('home');

Route::get('/first-page', function () {
    return view('first-page');
})->name('first-page');

Route::post('request', [OpenAIController::class, 'request'])->name('request');
Route::post('copywriter/request', [OpenAIController::class, 'firstPage'])->name('copywriter.first-page');
