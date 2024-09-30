<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AreaEmpresaController;
use App\Http\Controllers\VagaUsuarioController;
use Illuminate\Support\Facades\Route;


// rotas Dynamo

// Home
Route::get('/', function () {
    return view('home');
});
//seção nao feita
Route::get('/#home', function () {
    return view('home');
});
//seção nao feita
Route::get('/#sobre', function () {
    return view('home');
});
//seção nao feita
Route::get('/contato', function () {
    return view('contato');
});

/*
|--------------------------------------------------------------------------
| paginas de Empresa
|--------------------------------------------------------------------------

*/
//Cadastrar Empresa
Route::get('/cadastrarEmpresa', [EmpresaController::class, 'create'])->name('cadastrarEmpresa');
//Cadastrar Area de atuação Empresa
Route::get('/cadastrarAreaEmpresa/{id}', [AreaEmpresaController::class, 'create'])->name('cadastrarAreaEmpresa');
//Formulario Cadastrar Empresa
Route::post('/formEmpresa', [EmpresaController::class, 'store']);
//Formulario Area de atuação Empresa
Route::post('/areaEmpresa', [AreaEmpresaController::class,'store']);
////Vagas que a empresa postou
Route::get('/vagas/empresa', [VagaController::class, 'showVagasPorEmpresa'])->name('vagas.empresa');
//Detalhes Vagas que a empresa postou
Route::get('/verVagaCadastrada/{idVaga}', [VagaUsuarioController::class, 'verVagaCadastrada'])->name('verVagaCadastrada');

//Chamar Usuario pra entrevista
Route::post('/candidaturas/aprovar/{idVaga}', [VagaUsuarioController::class, 'aprovarCandidatura'])->name('candidaturas.aprovar');
//Reporvar Usuario que tentou
Route::post('/candidaturas/negar/{idVaga}', [VagaUsuarioController::class, 'negarCandidatura'])->name('candidaturas.negar');

/*
|--------------------------------------------------------------------------
| paginas de home
|--------------------------------------------------------------------------
*/
// Home Admin
Route::get('/admin', function () {
    return view('admin.homeAdmin');
})->middleware('auth:admin')->name('adminDashboard');


// Home WorkUp
Route::get('/home', function () {
    return view('/homeWorkUp'); });

// Home Empresa
Route::get('/empresa', function () { 
    return redirect()->route('vagas.empresa');  });

/*
|--------------------------------------------------------------------------
| paginas de Admin
|--------------------------------------------------------------------------

*/

//Usuario

// Ver todos Usuario
Route::get('/verUsuario', [UsuarioController::class, 'index'])->name('usuarios.index');
// Ver todos os detalhe Usuario
Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
// Deletar Usuario
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.delete');
// Aprovar Usuario
Route::Post('/usuarios/{id}', [UsuarioController::class, 'aprovar'])->name('usuarios.aprovar');
// Editar perfil Usuario
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
// Editar perfil Usuario
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

// Empresa

// Ver todas Empresas
Route::get('/verEmpresa', [EmpresaController::class, 'index'])->name('empresas.index');
// Ver todos os detalhe Empresas
Route::get('/empresas/{id}', [EmpresaController::class, 'show'])->name('empresas.show');
// Deletar Empresas
Route::delete('/Empresas/{id}', [EmpresaController::class, 'destroy'])->name('empresas.delete');
// Aprovar Empresas
Route::Post('/Empresas/{id}', [EmpresaController::class, 'aprovar'])->name('empresas.aprovar');
// Editar perfil Empresas
Route::get('/Empresas/{id}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');
// Editar perfil Empresas
Route::put('/Empresas/{id}', [EmpresaController::class, 'update'])->name('empresas.update');

// Vaga

// Ver todas Vaga
Route::get('/verVaga', [VagaController::class, 'index'])->name('vagas.index');
// Ver todos os detalhe Vaga
Route::get('/vagas/{id}', [VagaController::class, 'show'])->name('vagas.show');
// Deletar Vaga
Route::delete('/vagas/{id}', [VagaController::class, 'destroy'])->name('vagas.delete');
// Aprovar Vaga
Route::Post('/vagas/{id}', [VagaController::class, 'aprovar'])->name('vagas.aprovar');
// Editar Vaga
Route::get('/Vagas/{id}/edit', [VagaController::class, 'edit'])->name('vagas.edit');
// Editar Vaga
Route::put('/Vagas/{id}', [VagaController::class, 'update'])->name('vagas.update');
//Cadastrar Vaga
Route::get('/cadastrarVaga', [VagaController::class, 'create'])->middleware('auth:empresa')->name('cadastrarVaga');
//Formularo Vaga
Route::post('/formVaga', [VagaController::class, 'store']);



// Admin

//Cadastrar Admin
Route::get('/cadastrarAdmin', [AdminController::class, 'create'])->middleware('auth:admin')->name('cadastrarAdmin');
//Cadastrar Area
Route::get('/Area', [AreaController::class, 'create'])->name('cadastrarArea');
//Formulario Admin
Route::post('/formAdmin', [AdminController::class, 'store']);
//Formulario Area
Route::post('/formArea', [AreaController::class, 'store']);
/*
|--------------------------------------------------------------------------
| paginas de login
|--------------------------------------------------------------------------

*/

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/admin')->group(function () {
    Route::get('/', [UsuarioController::class, 'dashboard']);
});

Route::get('/infoAdmin', function () {
    return view('admin.infoAdmin');
});


//---------------------------------------------
