<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CodesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogBarangController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ManageRoleController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

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

// LOGIN
Route::get('/', [AuthController::class, 'login'])->middleware('guest')->name('/');
Route::post('/', [AuthController::class, 'auth'])->middleware('guest'); 
Route::get('/logout',[AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('dahsboard');
Route::get('/activity_log', [HomeController::class, 'log'])->middleware('auth')->name('log');

//REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//ROLE
Route::get('manage_role', [ManageRoleController::class, 'index'])->name('manage.role');
Route::get('add_role', [ManageRoleController::class, 'tambah']);
Route::post('add_role', [ManageRoleController::class, 'store'])->name('add.role');
Route::get('manage_role/edit/{id}', [ManageRoleController::class, 'edit']);
Route::put('manage_role/edit/{id}', [ManageRoleController::class, 'update'])->name('update.role');
Route::delete('role/delete/{id}', [ManageRoleController::class, 'delete'])->name('delete.role');


// Manage User
Route::middleware(['auth','adminAkses'])->group(function() {
    Route::get('/manage_user', [ManageUserController::class, 'index'])->name('manage.user');
    Route::get('/manage_user_pdf', [ManageUserController::class, 'exportUser'])->name('export.user');
    // Route::get('/add_user', [ManageUserController::class, 'tambah']);
    Route::post('/add_user', [ManageUserController::class, 'store'])->name('add.user');
    Route::get('manage_user/{id}/edit', [ManageUserController::class, 'edit']);
    Route::put('manage_user/update', [ManageUserController::class, 'update'])->name('update.user');
    Route::get('manage_user/{id}/', [ManageUserController::class, 'delete'])->name('delete.user');
    Route::get('/filter_user', [ManageUserController::class, 'filter'])->name('filter.user'); 
});


// Kategori
Route::middleware(['auth'])->group(function() {
    Route::get('category', [CategoriesController::class, 'kategori'])->name('categories');
    Route::get('add_category', [CategoriesController::class, 'tambah']);
    Route::post('add_category', [CategoriesController::class, 'store'])->name('add.kategori');
    Route::get('category/edit/{id}', [CategoriesController::class, 'edit']);
    Route::put('category/edit/{id}', [CategoriesController::class, 'update'])->name('update.kategori');
    Route::delete('delete_category/{id}', [CategoriesController::class, 'hapus'])->name('delete.kategori');
});


// Stock Barang
Route::middleware(['auth'])->group(function() {
    Route::get('stock', [CodesController::class, 'kode'])->name('stock');
    Route::get('stock_pdf', [CodesController::class, 'exportStock'])->name('export.pdf');
    Route::get('new_stock', [CodesController::class, 'tambah']);
    Route::post('new_stock', [CodesController::class, 'store'])->name('add.stock');
    Route::get('stock/edit/{id}', [CodesController::class, 'edit']);
    Route::put('stock/edit/{id}', [CodesController::class, 'update'])->name('update.stock');
    Route::delete('delete_stock/{id}', [CodesController::class, 'hapus'])->name('delete.stock');

    Route::get('/log_barang', [CodesController::class, 'logBarang'])->name('log.barang');
    Route::get('/log_barang_pdf', [CodesController::class, 'exportLog'])->name('export.barang.pdf');
});


// Barang Masuk
Route::middleware('auth')->group(function(){
    Route::get('stock_in', [BarangMasukController::class, 'index'])->name('barang.masuk');
    Route::get('stock_in_pdf', [BarangMasukController::class, 'exportIn'])->name('export.pdf');
    Route::get('add_stock_in', [BarangMasukController::class, 'tambah']);
    Route::post('add_stock_in/fetch', [BarangMasukController::class, 'fetch'])->name('fetch.barang.masuk');
    Route::post('add_stock_in', [BarangMasukController::class, 'store'])->name('add.barang.masuk');
    Route::get('stock_in/edit/{id}',[BarangMasukController::class, 'edit']);
    Route::put('stock_in/edit/{id}',[BarangMasukController::class, 'update'])->name('update.barang.masuk');
    Route::delete('delete_stock_in/{id}', [BarangMasukController::class, 'hapus'])->name('delete.barang.masuk');
});

// Barang Keluar
Route::middleware('auth')->group(function(){
    Route::get('stock_out', [BarangKeluarController::class, 'index'])->name('barang.keluar');
    Route::get('stock_in_pdf', [BarangKeluarController::class, 'exportOut'])->name('export.pdf');
    Route::get('add_stock_out', [BarangKeluarController::class, 'tambah']);
    Route::post('add_stock_out', [BarangKeluarController::class, 'store'])->name('add.barang.keluar');
    Route::get('stock_out/edit/{id}',[BarangKeluarController::class, 'edit']);
    Route::put('stock_out/edit/{id}',[BarangKeluarController::class, 'update'])->name('update.barang.keluar');
    Route::delete('delete_stock_out/{id}', [BarangKeluarController::class, 'hapus'])->name('delete.barang.keluar');
});

Route::get('/test', [TestController::class, 'tes'])->name('tes');
Route::get('/add', [TestController::class, 'show'])->name('add.pengguna');
Route::get('/test/table', [TestController::class, 'table'])->name('table');
