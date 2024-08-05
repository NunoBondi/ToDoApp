<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //TodoControllers
    Route::get('/todo',[TodoController::class, 'index'])->name('todo.index');
    Route::get('/todo/create',[TodoController::class, 'create'])->name('todo.create');
    Route::post('/todo/store',[TodoController::class, 'store'])->name('todo.store');
    Route::get('/todo/show/{id}',[TodoController::class, 'show'])->name('todo.show');
    Route::get('/todo/{id}/edit',[TodoController::class, 'edit'])->name('todo.edit');
    Route::put('/todo/update',[TodoController::class, 'update'])->name('todo.update');
    Route::delete('/todo/destroy',[TodoController::class, 'destroy'])->name('todo.destroy');
});

require __DIR__.'/auth.php';
