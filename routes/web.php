<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

// Untuk API
Route::get('/items', [ItemController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::put('/transactions/{transaction}/items/{item}', [TransactionController::class, 'updateItem']);
