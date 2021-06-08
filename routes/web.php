<?php

use App\Http\Controllers\SubTaskController;
use App\Http\Controllers\TaskController;
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

Route::get('/laravel', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [TaskController::class , 'index'])->name('index');
Route::get('addnew', [TaskController::class, 'create'])->name('addnew');
Route::post('added', [TaskController::class,'store'])->name('added');
Route::delete('deleteTask/{id}', [TaskController::class, 'destroy'])->name('destroy');
Route::get('updateTask/{id}', [TaskController::class, 'update'])->name('updateFrom');
Route::put('edited/{id}', [TaskController::class, 'edit'])->name('edit');


//subtasks
Route::post('saveSubTask', [SubTaskController::class, 'store'])->name('saveSubTask');
Route::delete('users/{id}', [SubTaskController::class, 'delete'])->name('deleteSubTask');
Route::put('subtaskEdit/{id}', [SubTaskController::class, 'editSub'])->name('updateSubTask');
});