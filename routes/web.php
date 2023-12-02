<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\SupplierController;


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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('backend.layouts.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/logout',[ProfileController::class,'logout']);

require __DIR__.'/auth.php';

// Customer

Route::get('/addcustomer',[CustomerController::class,'create']);
Route::get('/customer',[CustomerController::class,'index']);
Route::post('/insertcustomer',[CustomerController::class,'insert']);
Route::get('/deletecustomer/{id}',[CustomerController::class,'delete']);


// Income Expense

Route::get('/customer_incomeexpense',[CustomerController::class,'index2']);
Route::get('/addcustomer_incomeexpense',[CustomerController::class,'create2']);
Route::post('/insertcustomer_incomeexpense',[CustomerController::class,'insert2']);
Route::get('/deletecustomer_incomeexpense/{id}',[CustomerController::class,'delete2']);

Route::get('/customerreports',[CustomerController::class,'report']);


// Supplier

Route::get('/addsupplier',[SupplierController::class,'create']);
Route::get('/supplier',[SupplierController::class,'index']);
Route::post('/insertsupplier',[SupplierController::class,'insert']);
Route::get('/deletesupplier/{id}',[SupplierController::class,'delete']);

// Income Expense

Route::get('/supplier_incomeexpense',[SupplierController::class,'index2']);
Route::get('/addsupplier_incomeexpense',[SupplierController::class,'create2']);
Route::post('/insertsupplier_incomeexpense',[SupplierController::class,'insert2']);
Route::get('/deletesupplier_incomeexpense/{id}',[SupplierController::class,'delete2']);

Route::get('/supplierreports',[SupplierController::class,'report']);

