<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\UserController;
use App\Models\Kota;
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
  
// Route::get('/', function () {
//     return view('welcome');
// });

// dashboard
route::get('/', [DashboardController::class, 'index'])->name('/') ;

// user
route::get('/user', [UserController::class, 'index'])->name(('user')) ;
route::get('/add-user', [UserController::class, 'add'])->name(('add-user')) ;
route::post('/insert-user', [UserController::class, 'insert'])->name(('insert-user')) ;
route::get('/edit-user/{id}', [UserController::class, 'Edit'])->name(('edit-user')) ; // utk edit karena mengambil id // maka tambahkan {id}
route::post('/update-user', [UserController::class, 'Update'])->name(('update-user')) ;
route::get('/delete-user/{id}', [UserController::class, 'Delete'])->name(('delete-user')) ; // utk edit karena mengambil id // maka tambahkan {id}

// kota
route::get('/kota', [KotaController::class, 'index'])->name(('kota')) ;
route::get('/add-kota', [KotaController::class, 'add'])->name(('add-kota')) ;
route::get('/edit-kota/{id}', [KotaController::class, 'edit'])->name(('edit-kota')) ;
route::post('/insert-kota', [KotaController::class, 'insert'])->name(('insert-kota')) ;
route::post('/update-kota', [KotaController::class, 'update'])->name(('update-kota')) ;
route::get('/hapus-kota/{id}', [KotaController::class, 'delete'])->name(('hapus-kota')) ;


// hotel
route::get('/hotel', [HotelController::class, 'index'])->name(('hotel')) ;
route::get('/add-hotel', [HotelController::class, 'add'])->name(('add-hotel')) ;
route::post('/insert-hotel', [HotelController::class, 'insert'])->name(('insert-hotel')) ;



// pemesanan
route::get('/pemesanan', [PemesananController::class, 'index'])->name(('pemesanan')) ;







