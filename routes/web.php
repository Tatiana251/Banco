<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\TransaccionPropiaController;
use App\Models\TransaccionPropia;

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
    return view('auth.login');
});

Auth::routes();

Route::get('propia',[TransaccionPropiaController::class,'index'])->name('transaccion.propia');
Route::post('transferir',[TransaccionPropiaController::class,'store'])->name('transaccion.store');
Route::get('transaccionPropia/{transaccion_id}',[TransaccionPropiaController::class,'show'])->name('transaccion.show');

Route::get('transferir',[TransaccionController::class,'index'])->name('transaccion.index');
Route::post('transferir',[TransaccionController::class,'store'])->name('transaccion.store');
Route::get('transaccion/{transaccion_id}',[TransaccionController::class,'show'])->name('transaccion.show');
Route::get('listar',[TransaccionController::class,'listar'])->name('transaccion.listar');

Route::get('/inicio', function () {
    return view('inicio');
});




