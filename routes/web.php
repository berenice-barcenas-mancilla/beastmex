<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GerenciaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SupplierController;
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
  //list
  Route::get('/gerencia', [GerenciaController::class, 'indexgerencia'])->name('gerencia');
  //list user
  Route::get('/gerencia/generarusuario', [GerenciaController::class, 'generarusuario'])->name('genusuario');


    
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
    
  Route::get('/seller', [SellerController::class, 'indexVentas'])->name('ventas.dashboard');
  Route::get('/seller/products', [SellerController::class, 'productos_list'])->name('ventas.products');

  /*
  ***********************************************************************
  >>>> Shop catalogue
  ***********************************************************************
  */

  // List
  Route::get('/shop', [ShopController::class, 'index'])->name('shop');
  
  // List JSON
  Route::get('/shop/list-shop', [ShopController::class, 'getShop'])->name('shopList');

  // Info
  Route::get('/shop/{shop}', [ShopController::class, 'getInfo'])->name('infoShop');

  // Update
  Route::patch('/shop-update/{shop}', [ShopController::class, 'update'])->name('updateShop');

  //Store
  Route::post('/shop', [ShopController::class, 'store'])->name('shopStore');
      
  //Suspended
  Route::post('/shop-inactive/{shop}', [ShopController::class, 'inactive'])->name('shopInactived');

  //Actived
  Route::post('/shop-active/{shop}', [ShopController::class, 'active'])->name('shopActived');

  
  /*
  ***********************************************************************
  >>>> Supplier catalogue
  ***********************************************************************
  */

  // List
  Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
  
  // List JSON
  Route::get('/supplier/list-supplier', [SupplierController::class, 'getSupplier'])->name('supplierList');

  // Info
  Route::get('/supplier/{supplier}', [SupplierController::class, 'getInfo'])->name('infoSupplier');

  // Update
  Route::patch('/supplier-update/{supplier}', [SupplierController::class, 'update'])->name('updateSupplier');

  //Store
  Route::post('/supplier', [SupplierController::class, 'supplier'])->name('shopSupplier');
      
  //Suspended
  Route::post('/supplier-inactive/{supplier}', [SupplierController::class, 'inactive'])->name('supplierInactived');

  //Actived
  Route::post('/shop-active/{supplier}', [SupplierController::class, 'active'])->name('supplierActived');

    

  /*
  ***********************************************************************
  >>>> Storage catalogue
  ***********************************************************************
  */

  //list
  Route::get('/storage', [StorageController::class, 'Dashboard'])->name('storage.dashboard');

  //Info
  Route::get('/storage/productos', [StorageController::class, 'MethodViewStorage'])->name('storage.productos');

  //Store
  Route::get('/storage/productos/create', [StorageController::class, 'MethodCreateStorage'])->name('storage.create');

  //Update
  Route::get('/storage/productos/edit',   [StorageController::class, 'MethodEditStorage'])->name('storage.edit');

  //Suspended
  Route::post('/storage-inactive/{storage}', [StorageController::class, 'inactive'])->name('storageInactived');

    //List
    Route::get('/storage', [StorageController::class, 'indexAlmacen'])->name('storage.dashboard');
  
    //Read
    Route::get('/storage/products', [StorageController::class, 'products_list'])->name('storage.productos');

    //Save
    Route::post('/storage/save', [StorageController::class, 'create'])->name('storage.save');

    //Save
    Route::post('/storage/update', [StorageController::class, 'update'])->name('storage.update');

  //Actived
  Route::post('/storage-active/{storage}', [StorageController::class, 'active'])->name('storageActived');

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
