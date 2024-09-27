<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AreaEmpresaController;
use App\Http\Controllers\AreaInteresseUsuarioController;
use App\Http\Controllers\VagaUsuarioController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| paginas de cadastros
|--------------------------------------------------------------------------

*/

Route::get('/cadastrarEmpresa', [EmpresaController::class, 'create'])->name('cadastrarEmpresa');

Route::get('/cadastrarVaga', [VagaController::class, 'create'])->middleware('auth:empresas')->name('cadastrarVaga');

Route::get('/cadastrarAdmin', [AdminController::class, 'create'])->name('cadastrarAdmin');

Route::get('/Area', [AreaController::class, 'create'])->name('cadastrarArea');

Route::get('/cadastrarAreaEmpresa/{id}', [AreaEmpresaController::class, 'create'])->name('cadastrarAreaEmpresa');

Route::post('/formVaga', [VagaController::class, 'store']);

Route::post('/formEmpresa', [EmpresaController::class, 'store']);

Route::post('/formAdmin', [AdminController::class, 'store']);

Route::post('/formArea', [AreaController::class, 'store']);

Route::post('/areaEmpresa', [AreaEmpresaController::class,'store']);


/* na api provavelmente

Route::post('/areaUsuario', [AreaInteresseUsuarioController::class,'store']);

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

Route::get('/admin', function () {
    return view('admin.homeAdmin');
});

Route::get('/', function () {
    return view('/home');
});

/*
|--------------------------------------------------------------------------
| paginas de visualização
|--------------------------------------------------------------------------

*/

// Usuario
Route::get('/verUsuario', [UsuarioController::class, 'index'])->name('usuarios.index');

Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');

Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.delete');

Route::Post('/usuarios/{id}', [UsuarioController::class, 'aprovar'])->name('usuarios.aprovar');

// Empresa

Route::get('/verEmpresa', [EmpresaController::class, 'index'])->name('empresas.index');

Route::get('/empresas/{id}', [EmpresaController::class, 'show'])->name('empresas.show');

Route::delete('/Empresas/{id}', [EmpresaController::class, 'destroy'])->name('empresas.delete');

Route::Post('/Empresas/{id}', [EmpresaController::class, 'aprovar'])->name('empresas.aprovar');

// Vaga

Route::get('/verVaga', [VagaController::class, 'index'])->name('vagas.index');

Route::get('/vagas/{id}', [VagaController::class, 'show'])->name('vagas.show');

Route::delete('/vagas/{id}', [VagaController::class, 'destroy'])->name('vagas.delete');

Route::Post('/vagas/{id}', [VagaController::class, 'aprovar'])->name('vagas.aprovar');

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

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/admin')->group(function () {
    Route::get('/', [UsuarioController::class, 'dashboard']);
});

Route::get('/infoAdmin', function () {
    return view('admin.infoAdmin');
});
