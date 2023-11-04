<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GerenciaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsActive;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
/*
***********************************************************************
>>>> Rutas para acceder dentro del sistema
***********************************************************************
*/
Route::group(['middleware' => ['auth', 'is-active']], function() {
    /*
    ***********************************************************************
    >>>> Dashboard 
    ***********************************************************************
    */
   
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

   // Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', IsActive::class])->name('dashboard');

    
    
    /*
    ***********************************************************************
    >>>> Groups
    ***********************************************************************
    */

    // List
    Route::get('/groups', [GroupController::class, 'index'])->name('groups');

    // List JSON
    Route::get('/groups/list-groups', [GroupController::class, 'getGroups'])->name('groupList');

    // Info
    Route::get('/groups/{role}', [GroupController::class, 'getInfo'])->name('infoGroup');

    //Store
    Route::post('/groups', [GroupController::class, 'store'])->name('groupStore');

    // Update
    Route::patch('/groups-update/{role}', [GroupController::class, 'update'])->name('updateGroup');

    //Delete
    Route::post('/groups/deleted/{role}', [GroupController::class, 'destroy'])->name('groupDeteled');




    /*
    ***********************************************************************
    >>>> Management catalogue
    ***********************************************************************
    */

    
    /*
    ***********************************************************************
    >>>> Profile
    ***********************************************************************
    */

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');



    /*
    ***********************************************************************
    >>>> Seller catalogue
    ***********************************************************************
    */

    /*
    ***********************************************************************
    >>>> Shop catalogue
    ***********************************************************************
    */

    /*
    ***********************************************************************
    >>>> Storage catalogue
    ***********************************************************************
    */
    Route::get('/storage', [StorageController::class, 'Dashboard'])->name('storage.dashboard');

    Route::get('/storage/productos', [StorageController::class, 'MethodViewStorage'])->name('storage.productos');

    Route::get('/storage/productos/create', [StorageController::class, 'MethodCreateStorage'])->name('storage.create');

    Route::get('/storage/productos/edit',   [StorageController::class, 'MethodEditStorage'])->name('storage.edit');


    /*
    ***********************************************************************
    >>>> Users
    ***********************************************************************
    */

    // List
    Route::get('/users', [UserController::class, 'index'])->name('users');

    // List JSON
    Route::get('/users/list-users', [UserController::class, 'getUsers'])->name('userList');

    // Info
    Route::get('/users/{user}', [UserController::class, 'getInfo'])->name('infoUser');

    // Update
    Route::patch('/users-update/{user}', [UserController::class, 'update'])->name('updateUser');

    //Store
    Route::post('/users', [UserController::class, 'store'])->name('userStore');

    //Suspended
    Route::post('/users-inactive/{user}', [UserController::class, 'inactive'])->name('userInactived');

    //Actived
    Route::post('/users-active/{user}', [UserController::class, 'active'])->name('userActived');



});
require __DIR__.'/auth.php';

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Rutas gerencia

Route::get('/gerencia', [GerenciaController::class, 'indexgerencia'])->name('gerencia');