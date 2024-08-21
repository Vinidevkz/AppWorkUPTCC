<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VagaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//API'S USUARIO

//Listar todos os usuarios
Route::get('/usuario', [UsuarioController::class, 'index']);
//Visualizar usuario por id
Route::get('/usuario/{idUsuario}', [UsuarioController::class, 'show']);
//Cadastrar um usuario
Route::post('/usuario', [UsuarioController::class, 'store']);
//Atualizar dado de um usuario...
//Route::put('/usuario/{idUsuario}', [UsuarioController::class, 'update'])

//API'S ADMIN

//Listar todos os admins
Route::get('/admin', [AdminController::class, 'index']);
//Visualizar admin por id
Route::get('/admin/{idAdmin}', [AdminController::class, 'show']);
//Cadastrar um admin
Route::post('/admin', [AdminController::class, 'store']);
//Atualizar dado de um admin...
//Route::put('/admin/{idAdmin}', [AdminController::class, 'update'])

//API'S VAGA

//Listar todas as vagas
Route::get('/vaga', [VagaController::class, 'index']);
//Visualizar vaga por id
Route::get('/vaga/{idVaga}', [VagaController::class, 'show']);
//Cadastrar uma vaga
Route::post('vaga', [VagaController::class, 'store']);
//Atualizar dado de uma vaga...
//Route::put('/vaga/{idVaga}', [VagaController::class, 'update'])

//API'S EMPRESA

//Listar todas as empresas
Route::get('/empresa', [EmpresaController::class, 'index']);
//Visualizar empresa por id
Route::get('/empresa/{idEmpresa}', [EmpresaController::class, 'show']);
//Cadastrar uma empresa
Route::post('empresa', [EmpresaController::class, 'store']);
//Atualizar dado de uma empresa...
//Route::put('/empresa/{idEmpresa}', [EmpresaController::class, 'update'])