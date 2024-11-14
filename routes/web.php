<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\ExpenseController::class, 'index'])->name('home');
Route::get('/expenses/create', [App\Http\Controllers\ExpenseController::class, 'create'])->name('expense.create');
Route::get('/expenses/edit/{id}', [App\Http\Controllers\ExpenseController::class, 'edit'])->name('expense.edit');
Route::post('/expenses/store', [App\Http\Controllers\ExpenseController::class, 'store'])->name('expense.store');
Route::post('/expenses/update/{id}', [App\Http\Controllers\ExpenseController::class, 'update'])->name('expense.update');
Route::get('/expenses/destroy/{id}', [App\Http\Controllers\ExpenseController::class, 'destroy'])->name('expense.destroy');
