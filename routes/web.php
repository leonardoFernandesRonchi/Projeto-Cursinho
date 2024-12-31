<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;


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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login'); // Rota para a página de login
Route::get('/registrar', [AuthController::class, 'login'])->name('registrar'); // Rota para a página de registro
Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']); // Envio do formulário de login
Route::post('/registerSubmit', [AuthController::class, 'registerSubmit']); // Envio do formulário de registro
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
