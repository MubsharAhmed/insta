<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\ScraperController;
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
    return view('welcome');
});

// Route::get('/instagram', function () {
//     return view('instagram');
// });



Route::get('/instagram-data', [InstagramController::class, 'fetchBusinessData']);

// Route::get('/instagram/{username}', [InstagramController::class, 'fetchInstagramData']);

Route::get('scraper', [ScraperController::class, 'scraper']);
// Route::get('/scrape', [ScraperController::class, 'scrape']);
