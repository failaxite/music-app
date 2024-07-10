<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use App\Models\Track;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('test', [HomeController::class, 'test']) ->name('test');

Route::prefix('tracks')->name('tracks.')->controller(TrackController::class)->group(function() {
    route::get('/', 'index')->name('index');
    route::get('/create', 'create')->name('create');
    route::post('/store', 'store')->name('store');
    //route::get('/{track}', 'show')->name('show');
    route::get('/{track}/edit', 'edit')->name('edit');
    route::put('/{track}', 'update')->name('update');
    route::delete('/{track}', 'destroy')->name('destroy');
});


