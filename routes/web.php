<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\ConstructorController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ImageGenerationController;
use App\Http\Controllers\LeonardoModelController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RegisterRequestController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SiteGeneralController;
use App\Http\Controllers\StringDataController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
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

        Route::view('/dashboard', 'dashboard')->name('dashboard');

        Route::get('constructor/{site}', ConstructorController::class)->name('constructor');

        Route::apiResource('sites', SiteController::class)->except(['index']);
        Route::patch('sites/{site}/reorderBlocks', [SiteController::class, 'reorderBlocks'])->name('sites.reorder-blocks');

        Route::apiResource('sites.blocks', BlockController::class)->shallow();
        Route::apiResource('sites.domains', DomainController::class)->only(['store', 'destroy'])->shallow();
        Route::put('generals/{general}', [SiteGeneralController::class, 'update'])->name('generals.update');

        Route::get('blocks/{block}/input-view', [BlockController::class, 'inputView'])->name('blocks.input-view');
        Route::get('blocks/{block}/preview', [BlockController::class, 'preview'])->name('blocks.preview');
        Route::get('blocks/views/collect', [BlockController::class, 'views'])->name('blocks.views');

        Route::put('blocks/{block}/string-data', [StringDataController::class, 'stringUpdate'])
            ->withoutMiddleware(ConvertEmptyStringsToNull::class)
            ->name('blocks.string-data.update');
        Route::post('blocks/{block}/image-data', [StringDataController::class, 'imageUpdate'])->name('blocks.image-data.update');

        Route::post('blocks/{block}/text-generation', [OpenAIController::class, 'blockTextGeneration'])->name('blocks.text-generation');

        Route::get('leonardo/models', [LeonardoModelController::class, 'index'])->name('leonardo.index');

        Route::post('request', [OpenAIController::class, 'request'])->name('request');
        Route::post('copywriter/request', [OpenAIController::class, 'firstPage'])->name('copywriter.first-page');

        Route::prefix('image-generation')
            ->controller(ImageGenerationController::class)
            ->group(function () {
                Route::post('imagine', 'imagine')->name('image.imagine');
                Route::post('get-message', 'getMessage')->name('image.get-message');
            });
    });

Route::withoutMiddleware(VerifyCsrfToken::class)
    ->post('register-request', RegisterRequestController::class)->name('register-request');
