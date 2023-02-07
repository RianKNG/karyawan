<?php

use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ReligionController;




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

Route::get('/', function () {
    $jumlahkaryawan = Karyawan::count();
    // $laki = Karyawan::where('jeniskelamin'.'laki-laki')->count();
    $perempuan = Karyawan::where('jeniskelamin','perempuan')->count();
    $laki = Karyawan::where('jeniskelamin','laki-laki')->count();
   

    return view('welcome',compact('jumlahkaryawan','perempuan','laki'));
})->middleware('auth');

Route::group(['middleware' => ['auth','hakakses:admin']], function(){
// Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
    
});

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
//tambahdata
Route::get('/tambahdata', [KaryawanController::class, 'tambahdata'])->name('tambahdata');
Route::post('/masukandata', [KaryawanController::class, 'masukandata'])->name('masukandata');
//editupdate
Route::get('/editdata/{id}', [KaryawanController::class, 'editdata'])->name('editdata');
Route::post('/updatedata/{id}', [KaryawanController::class, 'updatedata'])->name('updatedata');
//hapus
Route::get('/hapusdata/{id}', [KaryawanController::class, 'hapusdata'])->name('hapusdata');
//export pdf
Route::get('/exportpdf', [KaryawanController::class, 'exportpdf'])->name('exportpdf');
//export exel
Route::get('/exportexel', [KaryawanController::class, 'exportexel'])->name('exportexel');
//import exel
Route::post('/importexel', [KaryawanController::class, 'importexel'])->name('importexel');
//login
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('loginproses',[LoginController::class, 'loginproses'])->name('loginproses');
//register
Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');

//religionindex
Route::get('/datareligion', [ReligionController::class, 'index'])->name('datareligion');
Route::get('/tambahagama', [ReligionController::class, 'create'])->name('tambahagama');

//masukandataagama
Route::post('/masukandataagama', [ReligionController::class, 'store'])->name('masukandataagama');
//logout
Route::get('/logout', [KaryawanController::class, 'logout'])->name('logout');
