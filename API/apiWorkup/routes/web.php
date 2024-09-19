<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| paginas de cadastros
|--------------------------------------------------------------------------

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

/*
|--------------------------------------------------------------------------
| paginas de home
|--------------------------------------------------------------------------

*/

Route::get('/', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('/admin/homeAdmin');
});

Route::get('/empresa', function () {
    return view('homeEmpresa');
});

/*
|--------------------------------------------------------------------------
| paginas de visualização
|--------------------------------------------------------------------------

*/


Route::get('/verUsuario', [UsuarioController::class, 'index']);

Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');

Route::get('/verVaga', function () {
    return view('/admin/vaga/vagaAdmin');
});

Route::get('/verEmpresa', function () {
    return view('/admin/empresa/empresaAdmin');
});

/*
|--------------------------------------------------------------------------
| paginas de Editar
|--------------------------------------------------------------------------

*/
Route::get('/editarUsuario', function () {
    return view('/admin/usuario/usuarioEditarAdmin');
});

Route::get('/editarVaga', function () {
    return view('/admin/vaga/vagaEditarAdmin');
});

Route::get('/editarEmpresa', function () {
    return view('/admin/empresa/empresaEditarAdmin');
});


/*
|--------------------------------------------------------------------------
| formularios de cadastros
|--------------------------------------------------------------------------

*/
Route::post('/formVaga', [VagaController::class, 'store']);

Route::post('/formEmpresa', [EmpresaController::class, 'store']);

Route::post('/formAdmin', [AdminController::class, 'store']);

/*
|--------------------------------------------------------------------------
| paginas de login
|--------------------------------------------------------------------------

*/

Route::post('/login', [LoginController::class, 'login']);