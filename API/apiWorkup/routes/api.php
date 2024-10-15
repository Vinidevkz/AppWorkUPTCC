<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AreaVagaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AreaInteresseUsuarioController;
use App\Http\Controllers\VagaUsuarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\AreaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\SalvarVagaController;
use App\http\Controllers\PostController;
use App\http\Controllers\MensagemController;
use App\http\Controllers\SeguirController;

//Eduardo mexeu
Route::get('/mensagens', [MensagemController::class, 'indexUsuario']);
Route::get('/seguirEmpresa/{idUsuario}', [SeguirController::class, 'index']);
Route::post('/seguirEmpresa',[SeguirController::class, 'store']);
Route::delete('/seguirEmpresa', [SeguirController::class, 'destroy']);
//acabou aqui



//Salvar Vaga
Route::get('/salvarVaga/{idUsuario}', [SalvarVagaController::class, 'index']);
Route::post('/salvarVaga',[SalvarVagaController::class, 'store']);
Route::delete('/salvarVaga', [SalvarVagaController::class, 'destroy']);
Route::get('verificarSalvarVaga/{idUsuario}/{idVaga}', [SalvarVagaController::class, 'verificarSalvarVaga']);





Route::post('/areaUsuario', [AreaInteresseUsuarioController::class,'store']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API'S USUARIO

//Listar todos os usuarios
Route::get('/usuario', [UsuarioController::class, 'indexApp']);
//Visualizar usuario por id
Route::get('/usuario/{idUsuario}', [UsuarioController::class, 'showApp']);
//Cadastrar um usuario
Route::post('/usuario', [UsuarioController::class, 'store']);
//Login
Route::post('/usuario/login', [UsuarioController::class, 'login']);
//Atualizar dado de um usuario...
Route::put('/usuario/{idUsuario}', [UsuarioController::class, 'update']);
// Se candidatar a vaga
Route::post('/vagaUsuario', [VagaUsuarioController::class,'store']);
// Cancelar candidatura de uma vaga
Route::delete('/vagaUsuario/{idVaga}/{idUsuario}', [VagaUsuarioController::class,'destroy']);
//Verificar candidatura
Route::get('/verificarCandidatura/{idUsuario}/{idVaga}', [VagaUsuarioController::class, 'verificarCandidatura']);


//API'S VAGA

//Listar todas as vagas
Route::get('/vaga', [VagaController::class, 'index']);
//Visualizar vaga por id
Route::get('/vaga/{idVaga}', [VagaController::class, 'show']);

Route::post('/vaga/busca', [VagaController::class, 'search']);
//Atualizar dado de uma vaga...
//Route::put('/vaga/{idVaga}', [VagaController::class, 'update'])

//API'S AREAVAGA

//Listar todas as areas
Route::get('/areavaga', [AreaController::class, 'index']);
//Visualizar uma area por id
Route::get('/areavaga/{idAreaInteresseVaga}', [AreaController::class, 'show']);
//Atualizar dado de uma vaga...
//Route::put('/vaga/{idVaga}', [VagaController::class, 'update'])

//API'S EMPRESA

//Listar todas as empresas
Route::get('/empresa', [EmpresaController::class, 'index']);
//Visualizar empresa por id
Route::get('/empresa/{idEmpresa}', [EmpresaController::class, 'show']);
//Visualizar empresa por id no app
Route::get('/showempresa/{idEmpresa}', [EmpresaController::class, 'showEmpresaApp']);
//Atualizar dado de uma empresa...
//Route::put('/empresa/{idEmpresa}', [EmpresaController::class, 'update'])