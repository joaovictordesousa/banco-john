<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [RegisterController::class, 'index'])->name('register.home');
Route::post('/home/store', [RegisterController::class, 'store'])->name('register.store');
Route::get('/home', [RegisterController::class, 'somavalor'])->name('somavalor');
Route::delete('/welcome/{item}', [RegisterController::class, 'destroy'])->name('register.destroy');