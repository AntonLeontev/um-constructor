<?php

use App\Http\Controllers\NextLegController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\SiteController;
use App\Services\NextLeg\NextLegService;
use HaydenPierce\ClassFinder\ClassFinder;
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

Route::get('/test', function (NextLegService $service) {
    ClassFinder::disablePSR4Vendors();
    $classes = ClassFinder::getClassesInNamespace('App\Constructor\Blocks', ClassFinder::RECURSIVE_MODE);

    $classes = array_diff($classes, ['App\Constructor\Blocks\AbstractBlock']);

    dd($classes);

})->name('test');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')
    ->group(function () {

        Route::get('/first-page', function () {
            return view('first-page');
        })->name('first-page');

        Route::prefix('personal')
            ->controller(PersonalController::class)
            ->group(function () {
                Route::get('sites', 'sites')->name('personal.sites');

            });

        Route::apiResource('sites', SiteController::class)->except('index');

        Route::post('request', [OpenAIController::class, 'request'])->name('request');
        Route::post('copywriter/request', [OpenAIController::class, 'firstPage'])->name('copywriter.first-page');

        Route::prefix('midjourney')
            ->controller(NextLegController::class)
            ->group(function () {
                Route::post('imagine', 'imagine')->name('midjourney.imagine');
                Route::post('get-message', 'getMessage')->name('midjourney.get-message');
                Route::post('check-banned-words', 'checkBannedWords')->name('midjourney.check-banned-words');
                Route::post('push-button', 'pushButton')->name('midjourney.push-button');
            });
    });
