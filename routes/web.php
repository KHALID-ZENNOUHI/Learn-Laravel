<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::middleware(['HasPermission'])->group(function (){

        Route::get('/users', [UserController::class, 'show'])->name('users.show');
        Route::post('/users/add', [UserController::class, 'add'])->name('users.add');
        Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

        Route::get('/permissions', [RoleController::class, 'index'])->name('permissions.index');
        Route::post('/permissions/add', [RoleController::class, 'add'])->name('permissions.add');
        Route::delete('/permissions/delete/{id}', [RoleController::class, 'delete'])->name('permissions.delete');
        Route::put('/permissions/update/{id}', [RoleController::class, 'update'])->name('permissions.update');

        Route::get('/products', [ProductController::class, 'show'])->name('products.show');
        Route::post('/products/add', [ProductController::class, 'add'])->name('products.add');
        Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('products.edit');
        Route::delete('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
        
        Route::get('/categories', [CategorieController::class, 'index'])->name('categories.show');
        Route::post('/categories/add', [CategorieController::class, 'add'])->name('categories.addcategorie');
        Route::put('/categories/update/{id}', [CategorieController::class, 'update'])->name('categories.updatecategorie');
        Route::delete('/categories/delete/{id}', [CategorieController::class, 'delete'])->name('categories.deletecategorie');
    });

        Route::get('/', [ProductController::class, 'index'])->name('client.home');
        Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');
        Route::post('/products/filter', [ProductController::class, 'filter'])->name('products.filter');

        Route::get('/register', [AuthController::class, 'register']);
        Route::post('/register', [AuthController::class, 'signUp']);
        Route::get('/login', [AuthController::class, 'login']);
        Route::post('/login', [AuthController::class, 'signIn']);
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/resetpassword', [AuthController::class, 'resetPassword']);
        Route::post('/resetpassword', [AuthController::class, 'resetPassword']);
        Route::get('/resetpassword', [AuthController::class, 'resetPassword']);
        Route::get('password_reset/{token}', [AuthController::class, 'changePasswordPage']);


