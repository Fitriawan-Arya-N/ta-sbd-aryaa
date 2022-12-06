<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\JoinsController;



Route::middleware(['auth'])->group(function(){

        //customer
        Route::get('add_cus', [CustomerController::class, 'create'])->name('cust_store.create');
        Route::post('store_cus', [CustomerController::class, 'store'])->name('cust_store.store');
        Route::get('/cus', [CustomerController::class, 'index'])->name('cust_store.index');
        Route::get('edit_cus/{id}', [CustomerController::class, 'edit'])->name('cust_store.edit');
        Route::post('update_cus/{id}', [CustomerController::class, 'update'])->name('cust_store.update');

        Route::get('/cus/trash', [CustomerController::class, 'trash'])->name('cust_store.trash');
        Route::post('/cus/softDeleted/{id}', [CustomerController::class, 'softDeleted'])->name('cust_store.softDeleted');
        Route::post('/cus/delete/{id}', [CustomerController::class, 'delete'])->name('cust_store.delete');
        Route::get('/cus/restore/{id}', [CustomerController::class, 'restore'])->name('cust_store.restore');


        //supplier
        Route::get('add_sup', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('store_sup', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/sup', [SupplierController::class, 'index'])->name('supplier.index');
        Route::get('edit_sup/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::post('update_sup/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::post('delete_sup/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');

        Route::get('/sup/trash', [SupplierController::class, 'trash'])->name('supplier.trash');
        Route::post('/sup/softDeleted/{id}', [SupplierController::class, 'softDeleted'])->name('supplier.softDeleted');
        Route::post('/sup/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');
        Route::get('/sup/restore/{id}', [SupplierController::class, 'restore'])->name('supplier.restore');


        //furniture
        Route::get('add_fur', [FurnitureController::class, 'create'])->name('furniture.create');
        Route::post('store_fur', [FurnitureController::class, 'store'])->name('furniture.store');
        Route::get('/fur', [FurnitureController::class, 'index'])->name('furniture.index');
        Route::get('edit_fur/{id}', [FurnitureController::class, 'edit'])->name('furniture.edit');
        Route::post('update_fur/{id}', [FurnitureController::class, 'update'])->name('furniture.update');
        Route::post('delete_fur/{id}', [FurnitureController::class, 'delete'])->name('furniture.delete');

        Route::get('/fur/trash', [FurnitureController::class, 'trash'])->name('furniture.trash');
        Route::post('/fur/softDeleted/{id}', [FurnitureController::class, 'softDeleted'])->name('furniture.softDeleted');
        Route::post('/fur/delete/{id}', [FurnitureController::class, 'delete'])->name('furniture.delete');
        Route::get('/fur/restore/{id}', [FurnitureController::class, 'restore'])->name('furniture.restore');


        //user
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::post('users/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');

        //join table
        Route::get('/gabung', [JoinsController::class, 'index'])->name('gabung.index');

});

//authentication
Auth::routes();

Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//logout
Route::get('/logout', function() {
    \Auth::logout();
    return redirect('/login');
        });