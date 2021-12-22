<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ImageController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Todo list
Route::get('/todo', [TodoController::class, 'index']);
Route::post('/todo/insert', [TodoController::class, 'insert']);
Route::get('/todo/edit/{id}', [TodoController::class, 'edit']);
Route::post('/todo/update', [TodoController::class, 'update']);
Route::get('/todo/delete/{id}', [TodoController::class, 'delete']);


Route::get('/excelview', [ExcelController::class, 'index']);
Route::get('export', [ExcelController::class, 'export'])->name('export');
Route::post('import', [ExcelController::class, 'import'])->name('import');
