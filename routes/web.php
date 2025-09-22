<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActorController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// routes/web.php
Route::get('/', [ActorController::class, 'create'])->name('actors.create');
Route::post('/actors', [ActorController::class, 'store'])->name('actors.store');
Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');

// API endpoint
Route::get('/api/actors/prompt-validation', [ActorController::class, 'promptValidation']);
