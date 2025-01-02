<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SimuladoController;
use App\Http\Controllers\StudyPlanController;


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
Route::get('/exercicios', [MainController::class, 'exercicios'])->name('exercicios');
Route::post('/getExam', [SimuladoController::class, 'getExam'])->name('getExam');


Route::middleware(['auth'])->group(function () {
    Route::get('/study_plans', [StudyPlanController::class, 'index'])->name('study_plans.index');
    Route::get('/study_plans/create', [StudyPlanController::class, 'create'])->name('study_plans.create');
    Route::post('/study_plans', [StudyPlanController::class, 'store'])->name('study_plans.store');
    Route::get('/study_plans/{studyPlan}/edit', [StudyPlanController::class, 'edit'])->name('study_plans.edit');
    Route::put('/study_plans/{studyPlan}', [StudyPlanController::class, 'update'])->name('study_plans.update');
    Route::delete('/study_plans/{studyPlan}', [StudyPlanController::class, 'destroy'])->name('study_plans.destroy');
});