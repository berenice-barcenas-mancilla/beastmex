<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//importación de controlador para el módulo almacen
use App\Http\Controllers\StorageController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//creación de rutas para el módulo almacen

Route::get('/storage', [StorageController::class, 'Dashboard'])->name('storage.dashboard');

Route::get('/storage/productos', [StorageController::class, 'MethodViewStorage'])->name('storage.productos');

Route::get('/storage/productos/create', [StorageController::class, 'MethodCreateStorage'])->name('storage.create');

Route::get('/storage/productos/edit',   [StorageController::class, 'MethodEditStorage'])->name('storage.edit');




