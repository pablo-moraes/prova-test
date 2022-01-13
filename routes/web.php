<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeeController;
use App\Http\Controllers\FlowerController;

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
    $species = \App\Models\Bee::all();
    return view('pages.home', compact('species', $species));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/register')->group(function () {
    Route::post('/bee', [BeeController::class, 'store'])->name('register.bee');
    Route::get('/bee', [BeeController::class, 'create'])->name('bee');

    Route::post('/flower', [FlowerController::class, 'store'])->name('register.flower');
    Route::get('/flower', [FlowerController::class, 'create'])->name('flower');
});
