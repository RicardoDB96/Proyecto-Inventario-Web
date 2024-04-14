<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\InventoryMovementController;
use App\Http\Controllers\InventoryLogController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;

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

Route::view('login', 'auth.login');

Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('roles', RoleController::class);
Route::resource('operations', OperationController::class);
Route::resource('modules', ModuleController::class);
Route::resource('inventory_movements', InventoryMovementController::class);
Route::resource('inventory_logs', InventoryLogController::class);
Route::resource('inventories', InventoryController::class);
Route::resource('categories', CategoryController::class);
