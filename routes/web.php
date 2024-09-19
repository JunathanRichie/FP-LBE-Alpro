<?php

use App\Http\Controllers\All_ItemsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $items = Item::all();
    return view('welcome', compact('items'));
});

// Untuk API
Route::get('/login', function () {
    return view('login');
})->name('login.form');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login.form');
})->name('logout');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/all-items', [All_ItemsController::class, 'index'])->name('all-items.index');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::delete('/transactions/{transaction}/items/{item}', [TransactionController::class, 'deleteItemTransaction']);


Route::put('/transactions/{transaction}/items/{item}', [TransactionController::class, 'updateItem']);
