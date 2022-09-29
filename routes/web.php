<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// produk

Route::get('/dashboard', [ProdukController::class, "index"]);
Route::get("/dashboard/produk/detail/{id}", [ProdukController::class, 'detail']);
Route::post("/dashboard/produk/new", [ProdukController::class, "create"]);
Route::get("/dashboard/produk/delete/{id}", [ProdukController::class, "delete"]);
Route::put("/dashboard/produk/edit/{id}" , [ProdukController::class, "edit"])->name("update_produk");
// user

Route::get("/dashboard/user", [AdminController::class, 'index']);
Route::get("/dashboard/user/detail/{id}", [AdminController::class, 'detail']);
Route::post("/dashboard/user/create", [AdminController::class, 'new_admin']);
Route::get('/dashboard/user/delete/{id}', [AdminController::class, 'hapus']);
Route::put('/dashboard/user/edit/{id}', [AdminController::class, 'edit'])->name("update_admin");

// kategori

Route::get("/dashboard/kategori", [KategoriController::class, "index"]);
Route::post("/dashboard/kategori/new", [KategoriController::class, "create"]);
Route::get("/dashboard/kategori/delete/{id}", [KategoriController::class, "delete"]);