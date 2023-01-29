<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
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

Route::get('/', [BarangController::class, "index"]);

Route::get('/about', function () {
    return view('main.about');
});

Route::get("/contact", function(){
    return view("main.contact");
});

Route::get("/keranjang", [BarangController::class, "keranjang"]);

Route::get("/produk", [BarangController::class, "produk"]);
Route::get("/checkout/{id}", [BarangController::class, "checkout"]);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// produk

Route::get('/dashboard', [ProdukController::class, "index"])->middleware("admin");
Route::get("/dashboard/produk/detail/{id}", [ProdukController::class, 'detail']);
Route::post("/dashboard/produk/new", [ProdukController::class, "create"]);
Route::get("/dashboard/produk/delete/{id}", [ProdukController::class, "delete"]);
Route::put("/dashboard/produk/edit/{id}" , [ProdukController::class, "edit"])->name("update_produk");
// user
Route::post("/dashboard/register", [AdminController::class, "store"]);
Route::post("/dashboard/login", [AdminController::class, "login"]);
Route::get("/dashboard/user/logout", [AdminController::class, "logout"])->middleware("admin");
Route::get("/dashboard/user", [AdminController::class, 'index']);
Route::get("/dashboard/user/detail/{id}", [AdminController::class, 'detail']);
Route::post("/dashboard/user/create", [AdminController::class, 'new_admin']);
Route::get('/dashboard/user/delete/{id}', [AdminController::class, 'hapus']);
Route::put('/dashboard/user/edit/{id}', [AdminController::class, 'edit'])->name("update_admin");

// kategori

Route::get("/dashboard/kategori", [KategoriController::class, "index"]);
Route::post("/dashboard/kategori/new", [KategoriController::class, "create"]);
Route::get("/dashboard/kategori/delete/{id}", [KategoriController::class, "delete"]);