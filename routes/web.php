<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
use App\Http\Middleware\IsActive;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SupplierController;
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
    
    //Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', IsActive::class])->name('dashboard');


        
        
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
    Route::get('/gerencia', [ManagementController::class, 'index'])->name('gerencia.index');
    //list user
        
    /*
    ***********************************************************************
    >>>> Profile
    ***********************************************************************
    */

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    
    /*
    ***********************************************************************
    >>>> Reports
    ***********************************************************************
    */
    
    // List
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
  
    // Shop Report
    Route::post('/reports/detail', [ReportController::class, 'generarReporteC'])->name('indexReportDetailC');
    // Sells Report
    Route::post('/reports/detail', [ReportController::class, 'generarReporteV'])->name('indexReportDetailV');
    // Management Report
    Route::post('/reports/detail', [ReportController::class, 'generarReporteG'])->name('indexReportDetailG');
    // Storage Report
    Route::post('/reports/store', [ReportController::class, 'generarReporteA'])->name('indexReportDetailA');


    /*
    ***********************************************************************
    >>>> Seller catalogue
    ***********************************************************************
    */
        
    Route::get('/seller', [SellerController::class, 'indexVentas'])->name('ventas.dashboard');
    Route::get('/seller/products', [SellerController::class, 'productos_list'])->name('ventas.products');
    Route::post('/seller/add',[SellerController::class,'productos_add'])->name('ventas.add');
    Route::post('/seller/venta',[SellerController::class,'venta_add'])->name('ventas.venta');

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

    // List // Ruta para mostrar la lista de proveedores. Se utiliza el método 'index' del controlador 'SupplierController' y se asigna el nombre 'suppliers' a esta ruta.
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
    
    // List JSON // Ruta para obtener la lista de proveedores en formato JSON. Se utiliza el método 'getSuppliers' del controlador 'SupplierController' y se asigna el nombre 'suppliersList' a esta ruta.
    Route::get('/suppliers/list-suppliers', [SupplierController::class, 'getSuppliers'])->name('suppliersList');

    // Info // Ruta para mostrar la información de un proveedor específico. Se utiliza el método 'getInfo' del controlador 'SupplierController' y se asigna el nombre 'infoSupplier' a esta ruta. El parámetro '{supplier}' indica que se espera un identificador de proveedor como parte de la URL.
    Route::get('/suppliers/{supplier}', [SupplierController::class, 'getInfo'])->name('infoSupplier');

    // Update // Ruta para actualizar la información de un proveedor específico. Se utiliza el método 'update' del controlador 'SupplierController' y se asigna el nombre 'updateSupplier' a esta ruta. El verbo HTTP 'PATCH' se utiliza para actualizar parcialmente los datos.
    Route::patch('/suppliers-update/{supplier}', [SupplierController::class, 'update'])->name('updateSupplier');

    //Store // Ruta para almacenar un nuevo proveedor. Se utiliza el método 'store' del controlador 'SupplierController' y se asigna el nombre 'storeSupplier' a esta ruta. El verbo HTTP 'POST' se utiliza para crear nuevos recursos.
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('storeSupplier');
        
    //Suspended // Ruta para suspender (inactivar) un proveedor específico. Se utiliza el método 'inactive' del controlador 'SupplierController' y se asigna el nombre 'supplierInactived' a esta ruta.
    Route::post('/suppliers-inactive/{supplier}', [SupplierController::class, 'inactive'])->name('supplierInactived');

    //Actived // Ruta para activar un proveedor específico. Se utiliza el método 'active' del controlador 'SupplierController' y se asigna el nombre 'supplierActived' a esta ruta.
    Route::post('/suppliers-active/{supplier}', [SupplierController::class, 'active'])->name('supplierActived');



    

    /*
    ***********************************************************************
    >>>> Storage catalogue
    ***********************************************************************
    */

    // List
    Route::get('/store', [StoreController::class, 'index'])->name('store');

    //list products
    Route::get('/products', [StoreController::class, 'index_products'])->name('store');

    
    // List JSON
    Route::get('/store/list-store', [StoreController::class, 'getStore'])->name('storeList');

    // Info
    Route::get('/store/{store}', [StoreController::class, 'getInfo'])->name('infoStore');

    // Update
    Route::patch('/store-update/{store}', [StoreController::class, 'update'])->name('updateStore');

    //Store
    Route::post('/store', [StoreController::class, 'store'])->name('storeStore');
        
    //Suspended
    Route::post('/store-inactive/{store}', [StoreController::class, 'inactive'])->name('storeInactived');

    //Actived
    Route::post('/store-active/{store}', [StoreController::class, 'active'])->name('storeActived');




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
