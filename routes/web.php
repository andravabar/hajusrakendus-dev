<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\WeatherApiController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/weather', [WeatherApiController::class, 'index']);
Route::get('/Ralfapi', [HomeController::class, 'api'])->name('api');
Route::get('/Kellegiapi', [HomeController::class, 'andrus'])->name('andrus');
Route::get('/map', [MapsController::class, 'index']);
Route::post('/map', [MapsController::class, 'store'])->name('map.store');
Route::get('/map/marker/{id}', [MapsController::class, 'show']);
Route::delete('/map/marker/{id}', [MapsController::class, 'destroy']);
Route::post('/map/marker/{id}', [MapsController::class, 'update']);

Route::get('/blog', [BlogController::class, 'index']);

Route::get('/store', function () {
    return Inertia::render('Welcome');
})->name('Welcome');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
