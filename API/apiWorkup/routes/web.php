<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AreaEmpresaController;
use App\Http\Controllers\AreaInteresseUsuarioController;
use App\Http\Controllers\VagaUsuarioController;
use App\Models\AreaInteresseUsuario;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| paginas de cadastros
|--------------------------------------------------------------------------

*/

Route::get('/cadastrarEmpresa', [EmpresaController::class, 'create'])->name('cadastrarEmpresa');

Route::get('/cadastrarVaga', [VagaController::class, 'create'])->middleware('auth:empresas')->name('cadastrarVaga');

Route::get('/cadastrarAdmin', [AdminController::class, 'create'])->middleware('admins')->name('cadastrarAdmin');

Route::get('/Area', [AreaController::class, 'create'])->name('cadastrarArea');

Route::post('/formVaga', [VagaController::class, 'store']);

Route::post('/formEmpresa', [EmpresaController::class, 'store']);

Route::post('/formAdmin', [AdminController::class, 'store']);

Route::post('/formArea', [AreaController::class, 'store']);

/*provavelmente vai pra api

Route::post('/areaUsuario', [AreaInteresseUsuarioController::class,'store']);

Route::post('/areaEmpresa', [AreaEmpresaController::class,'store']);

Route::post('/vagaUsuario', [VagaUsuarioController::class,'store']);

*/

/*
|--------------------------------------------------------------------------
| paginas de home
|--------------------------------------------------------------------------

*/
// Admin

Route::get('/admin', function () {
    return view('/admin/homeAdmin');
})->middleware('auth:admins');

// Empresa

Route::get('/empresa', function () {
    return view('homeEmpresa');
});

/*
|--------------------------------------------------------------------------
| paginas de visualização
|--------------------------------------------------------------------------

*/

// Usuario
Route::get('/verUsuario', [UsuarioController::class, 'index']);

Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');

// Empresa

Route::get('/verEmpresa', [EmpresaController::class, 'index']);

Route::get('/empresas/{id}', [EmpresaController::class, 'show'])->name('empresas.show');

// Vaga

Route::get('/verVaga', [VagaController::class, 'index']);

Route::get('/vagas/{id}', [VagaController::class, 'show'])->name('vagas.show');

/*
|--------------------------------------------------------------------------
| paginas de Editar
|--------------------------------------------------------------------------

*/
// Usuario
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');

Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

// Empresa
Route::get('/Empresas/{id}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');

Route::put('/Empresas/{id}', [EmpresaController::class, 'update'])->name('empresas.update');

//Vaga
Route::get('/Vagas/{id}/edit', [VagaController::class, 'edit'])->name('vagas.edit');

Route::put('/Vagas/{id}', [VagaController::class, 'update'])->name('vagas.update');

/*
|--------------------------------------------------------------------------
| paginas de login
|--------------------------------------------------------------------------

*/

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
