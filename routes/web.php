<?php

use App\Http\Controllers\armadaController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\supirController;
use App\Http\Controllers\SupirController as ControllersSupirController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[dashboardController::class,'dashboard'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/armada',[ArmadaController::class,'armada'])->name('armada');

Route::get('/supir', [SupirController::class, 'supir'])->name('supir');
Route::post('/tambah-supir', [SupirController::class, 'tambah_supir'])->name('tambah.supir');
Route::post('/update-supir/{id}', [SupirController::class, 'edit_supir'])->name('edit.supir');
Route::delete('/delete-supir/{id}',[SupirController::class,'hapus_supir'])->name('hapus.supir');

Route::get('/roles',[RoleController::class,'roles'])->name('roles');
Route::post('/tambah_roles',[RoleController::class,'tambah_roles'])->name('tambah.roles');
Route::post('/edit_roles/{id}',[RoleController::class,'edit_roles'])->name('edit.roles');
Route::post('/hapus_roles/{id}',[RoleController::class,'hapus_roles'])->name('hapus.roles');


Route::get('/rute',[RuteController::class,'rute'])->name('rute');
Route::post('/tambah_rute',[RuteController::class,'tambah_rute'])->name('tambah.rute');
Route::post('/edit_rute/{id}',[RuteController::class,'edit_rute'])->name('edit.rute');
Route::post('/hapus_rute/{id}',[RuteController::class,'hapus_rute'])->name('hapus.rute');


