<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;

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
Auth::routes();

//Rutas de Producto
Route::get('/products',[ProductController::class, 'index'])->name('products.index');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::get('/products/{product}',[ProductController::class, 'show'])->name('products.show');
Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/{product}',[ProductController::class,'destroy'])->name('products.destroy');
Route::get('/products/{product}/edit',[ProductController::class, 'edit'])->name('products.edit');

//Rutas de google login
Route::get('auth/google',[GoogleController::class,'redirectToGoogle']);
Route::get('/google/callback',[GoogleController::class,'handleGoogleCallback']);

//Rutas de home

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
