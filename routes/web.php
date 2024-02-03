<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Models\Categorie;
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


Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/add', [ProductController::class, 'add'])->name('products.add');
Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('products.edit');
Route::delete('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.show');
Route::post('/categories/add', [CategorieController::class, 'add'])->name('categories.addcategorie');
Route::put('/categories/update/{id}', [CategorieController::class, 'update'])->name('categories.updatecategorie');
Route::delete('/categories/delete/{id}', [CategorieController::class, 'delete'])->name('categories.deletecategorie');
