<?php

use App\Http\Controllers\AdminController;
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

Route::get('/dashboard', function () {
    return view('home_dashboard');
});

// user

Route::get("/dashboard/user", [AdminController::class, 'index']);
Route::post("/dashboard/user/create", [AdminController::class, 'new_admin']);
Route::get('/dashboard/user/delete/{id}', [AdminController::class, 'hapus']);
// 

Route::get("/dashboard/kategori", function(){
    return view("kategori_dashboard");
});