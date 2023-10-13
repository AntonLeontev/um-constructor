<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\ConstructorController;
use App\Http\Controllers\NextLegController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SiteGeneralController;
use App\Http\Controllers\StringDataController;
use Illuminate\Http\Request;
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

Route::any('/test', function (Request $request) {
    $domain = 'test.loc';
    $sub = '123.test.loc';

    return str($sub)->remove($domain)->trim('.')->value();
})->name('test');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')
    ->group(function () {

        Route::prefix('personal')
            ->controller(PersonalController::class)
            ->group(function () {
                Route::get('sites', 'sitesIndex')->name('personal.sites');
                Route::get('sites/{site}', 'siteShow')->name('personal.site');

            });

        Route::get('constructor/{site}', ConstructorController::class)->name('constructor');

        Route::apiResource('sites', SiteController::class)->except(['index']);
        Route::apiResource('sites.blocks', BlockController::class)->shallow();
        Route::put('generals/{general}', [SiteGeneralController::class, 'update'])->name('generals.update');

        Route::get('blocks/{block}/input-view', [BlockController::class, 'inputView'])->name('blocks.input-view');
        Route::get('blocks/{block}/preview', [BlockController::class, 'preview'])->name('blocks.preview');
        Route::get('blocks/{block}/view', [BlockController::class, 'view'])->name('blocks.view');
        Route::get('blocks/{block}/neural-text', [BlockController::class, 'neuralText'])->name('blocks.neural-text');
        Route::get('blocks/{block}/neural-image', [BlockController::class, 'neuralImage'])->name('blocks.neural-image');

        Route::put('blocks/{block}/string-data', [StringDataController::class, 'stringUpdate'])->name('blocks.string-data.update');
        Route::post('blocks/{block}/image-data', [StringDataController::class, 'imageUpdate'])->name('blocks.image-data.update');

        Route::post('blocks/{block}/text-generation', [OpenAIController::class, 'blockTextGeneration'])->name('blocks.text-generation');

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
