<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\VagaController;
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

Route::get('/cadastrarEmpresa', function () {
    return view('cadastrarEmpresa');
});

Route::get('/cadastrarVaga', function () {
    return view('cadastrarVaga');
});

Route::get('/cadastrarAdmin', function () {
    return view('cadastrarAdmin');
});

Route::get('/', function () {
    return view('home');
});


Route::post('/formVaga', [VagaController::class, 'store']);

Route::post('/formEmpresa', [EmpresaController::class, 'store']);

Route::post('/formAdmin', [AdminController::class, 'store']);