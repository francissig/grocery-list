<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\ItemController;

Route::get('/', [ShoppingListController::class, 'index'])->name('shopping_lists.index');

Route::get('/shopping-lists/create', [ShoppingListController::class, 'create'])->name('shopping_lists.create');
Route::post('/shopping-lists', [ShoppingListController::class, 'store'])->name('shopping_lists.store');

Route::get('/shopping-lists/{shoppingList}', [ShoppingListController::class, 'show'])->name('shopping_lists.show');
Route::get('/shopping-lists/{shoppingList}/edit', [ShoppingListController::class, 'edit'])->name('shopping_lists.edit');
Route::put('/shopping-lists/{shoppingList}', [ShoppingListController::class, 'update'])->name('shopping_lists.update');

Route::post('/shopping-lists/{shoppingList}/items', [ItemController::class, 'store'])->name('items.store');
Route::patch('/items/{item}/toggle', [ItemController::class, 'toggle'])->name('items.toggle');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
