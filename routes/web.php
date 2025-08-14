<?php

use App\Http\Controllers\Web\OpportunityController;
use App\Http\Controllers\Web\UserController;
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

Route::get('/', [OpportunityController::class, 'index'])->name('home');

Route::get('/opportunities/all', [OpportunityController::class, 'index'])->name('opportunities.index');

Route::get('/opportunity/{opportunity}', [OpportunityController::class, 'show'])->name('opportunity');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/support', function () {
    return view('support');
})->name('support');


Route::get('/registeration', [UserController::class, 'login_page'])->name('registeration');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/register', [UserController::class, 'register'])->name('register');
