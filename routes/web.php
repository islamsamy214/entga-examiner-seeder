<?php

use App\Http\Controllers\CoreController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CoreController::class, 'index'])->name('index');

//insert excel sheet
Route::post('/insert-examiners',[CoreController::class, 'insertExaminerFromExcel'])->name('insert-examiners');
Route::post('/insert-answers',[CoreController::class, 'insertAnswersFromExcel'])->name('insert-answers');
Route::post('/insert-results',[CoreController::class, 'insertResultsFromExcel'])->name('insert-results');

//get excel sheet
Route::get('/get-examiner',[CoreController::class, 'getExaminerExcel'])->name('get-examiner');
Route::get('/get-answers',[CoreController::class, 'getAnswersExcel'])->name('get-answers');
Route::get('/get-results',[CoreController::class, 'getResultsExcel'])->name('get-results');