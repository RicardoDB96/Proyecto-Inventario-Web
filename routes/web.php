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
use App\Http\Controllers\BitacoryController;
use App\Http\Controllers\BuyingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SellingController;

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

Route::view('/', 'welcome')->middleware('auth:sanctum');

// Rutas de login
Route::view('login', 'auth.login')->name('login')->middleware('guest');
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login'])->name('login');

// Restablecer contraseña
Route::view('reset', 'auth.reset')->name('reset');
Route::view('reset-password', 'auth.password')->name('password');
Route::view('done-password', 'auth.done')->name('done');
Route::view('updated-password', 'auth.updated')->name('updated');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('operations', OperationController::class);
    Route::resource('modules', ModuleController::class);
    Route::resource('inventory_movements', InventoryMovementController::class);
    Route::resource('inventory_logs', InventoryLogController::class);
    Route::resource('inventories', InventoryController::class);
    Route::resource('sellings', SellingController::class);
    Route::resource('buyings', BuyingController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('bitacories', BitacoryController::class);
    Route::resource('dashboards', DashboardController::class);
});
