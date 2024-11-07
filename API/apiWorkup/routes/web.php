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
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DenunciaUsuarioController;
use App\http\Controllers\PostController;
use App\http\Controllers\MensagemController;
use App\Http\Controllers\DenunciaEmpresaController;
use App\Http\Controllers\DenunciaVagaController;
use Illuminate\Support\Facades\Auth;

/*Rotas que possuem o 'prefix' requerem que digite o nome delas antes de buscar algo

EX: Route::prefix(´/empresa')

e para acessar alguma outra rota, será necessário digitar algum caminho dentro do grupo de rotas

EX: Route::prefix('empresa')->group(function(){
    Route::get('/dashboard', [EmpresaController::class, 'dashboard']);
})

para acessar a dashboard será necessário digitar o seguinte caminho:

'http://127.0.0.1:8000/empresa/dashboard'

 */



// mexendo
    // Deletar Empresa
    Route::delete('/{id}', [EmpresaController::class, 'destroy'])->name('empresa.delete');
    // Deletar Vaga
    Route::delete('/{id}', [VagaController::class, 'destroy'])->name('vaga.delete');



//Acessivel para todos
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
//email
Route::post('/contato', [ContatoController::class, 'enviar']);

Route::get('/logarAdmin', function () {
    return view('logarAdmin');
});
Route::post('/loginAdmin', [AuthController::class, 'loginAdmin']);

Route::get('/novoEmpresa', function () {
    return view('novoCadastroEmpresa');
});

//Home WorkUp
// Home WorkUp
Route::get('/home', function () {
    $empresa = auth()->check() ? auth()->user()->empresa : null; // Ajuste isso conforme necessário
    return view('homeWorkUp', compact('empresa')); 
})->name('home.workup');



//Cadastrar Empresa
Route::get('/cadastrarEmpresa', [EmpresaController::class, 'create'])->name('cadastrarEmpresa');

//Formulario Cadastrar Empresa
Route::post('/formEmpresa', [EmpresaController::class, 'store']);


/*
|--------------------------------------------------------------------------
| paginas de Empresa
|--------------------------------------------------------------------------

*/


//Rotas que ambos podem acessar (estando logados)
Route::middleware('auth.admin.empresa')->group(function(){
    
            //Vaga
            Route::prefix('/vaga')->group(function(){   

                // Deletar Vaga
                Route::delete('/{id}', [VagaController::class, 'destroy'])->name('vagas.delete');
                // Editar Vaga
                Route::get('/{id}/edit', [VagaController::class, 'edit'])->name('vagas.edit');
                // Editar Vaga
                Route::put('/{id}', [VagaController::class, 'update'])->name('vagas.update');
                //Cadastrar Vaga
                Route::get('/cadastrar', [VagaController::class, 'create'])->name('cadastrarVaga');
    
            });

});

//Rotas que somente a Empresa pode acessar
Route::middleware('auth:empresa')->group(function(){

           //Vaga
           Route::prefix('/vaga')->group(function(){   

            // Editar Vaga
            Route::get('/{id}/edit', [VagaController::class, 'edit'])->name('vagas.edit');
          
            //Formulario Vaga
            Route::post('/cadastrar', [VagaController::class, 'store']);
            
            //Vagas que a empresa postou
            Route::prefix('/candidaturas')->group(function(){
                //Detalhes Vagas que a empresa postou
                Route::get('/visualizarCandidatos/{idVaga}', [VagaUsuarioController::class, 'verVagaCadastrada'])->name('verVagaCadastrada');
                //Chamar Usuario pra entrevista
                Route::post('/aprovar/{idVaga}', [VagaUsuarioController::class, 'aprovarCandidatura'])->name('candidaturas.aprovar');
                //Reporvar Usuario que tentou
                Route::post('/negar/{idVaga}', [VagaUsuarioController::class, 'negarCandidatura'])->name('candidaturas.negar');
        });

        });

        //Empresa
        Route::prefix('/empresa')->group(function(){
            // Dashboard Empresa
            Route::get('/dashboard',[EmpresaController::class, 'dashboard'])->name('empresa.dashboard');

            // Ver todos os detalhe da empresa
            // Route::get('/{id}', [EmpresaController::class, 'show'])->name('empresas.show');
            // Deletar Empresas
            Route::delete('/{id}', [EmpresaController::class, 'destroy'])->name('empresas.delete');
            // Editar perfil Empresas
            Route::get('/{id}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');
            Route::put('/{id}', [EmpresaController::class, 'update'])->name('empresas.update');


            //Formulario Area de atuação Empresa
            Route::get('/cadastrarAreaAtuacao/{id}', [AreaEmpresaController::class, 'create'])->name('cadastrarAreaEmpresa');

            
            //Cadastrar Area de atuação Empresa
            Route::post('/areaAtuacao', [AreaEmpresaController::class,'store']);

    
            });

            //Mensagem
            Route::prefix('/mensagem')->group(function(){
                //ver mensagens
                Route::get('/', [MensagemController::class, 'index'])->name('mensagens.index');
                //ver mensagens de um unico usuario
                Route::get('/Unico/{idUsuario}', [MensagemController::class, 'indexUsuarioUnico'])->name('mensagem.indexUsuarioUnico');
                //mandar mensagens
                Route::get('/mensagem/{idUsuario}/{idEmpresa}', [MensagemController::class, 'create'])->name('mensagem.create');
                Route::post('/mensagem', [MensagemController::class, 'store'])->name('mensagem.store');
                // Post
                Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
                Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
                Route::get('/postar/{id}', [PostController::class, 'create'])->name('post.create');
                Route::post('/postar', [PostController::class, 'store'])->name('post.store');

            });


});

//Rotas que somente o Admin pode acessar
Route::middleware('auth:admin')->group(function(){

        //Formulario Admin
        Route::post('/formAdmin', [AdminController::class, 'store']);
        //Formulario Area
        Route::post('/formArea', [AreaController::class, 'store']);

        //Dashboard ADMIN

            //Admin
        Route::prefix('/admin')->group(function () {
                Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

                //Cadastrar Admin
                Route::get('/cadastrar', function() {
                    return view('cadastrarAdmin');
                })->name('create.Admin');

                Route::get('/info', function () {
                    return view('admin.infoAdmin');
                });


            //Usuario
            Route::prefix('/usuario')->group(function(){

                // Ver todos Usuario
                Route::get('/listar', [UsuarioController::class, 'index'])->name('usuarios.index');
                // Ver todos os detalhes do Usuario
                Route::get('/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
                // Deletar Usuario
                Route::delete('/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.delete');
                // Aprovar Usuario
                Route::post('/{id}', [UsuarioController::class, 'aprovar'])->name('usuarios.aprovar');
                // Editar perfil Usuario
                Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
                Route::put('/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

            });

            //Empresa
            Route::prefix('/empresa')->group(function(){

            // Ver todas Empresas
            Route::get('/listar', [EmpresaController::class, 'index'])->name('empresas.index');
            // Ver todos os detalhes das e  mpresas
            Route::get('/{id}', [EmpresaController::class, 'show'])->name('empresas.show');
            // Deletar Empresas
            Route::delete('/{id}', [EmpresaController::class, 'destroy'])->name('empresas.delete');
            // Aprovar Empresas
            Route::post('/{id}', [EmpresaController::class, 'aprovar'])->name('empresas.aprovar');
            // Editar perfil Empresas
            // Route::get('/{id}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');
            // Route::put('/{id}', [EmpresaController::class, 'update'])->name('empresas.update');

            });

            //Vaga
            Route::prefix('/vaga')->group(function(){   

                // Ver todas Vaga
                Route::get('/listar', [VagaController::class, 'index'])->name('vagas.index');
                // Ver todos os detalhe Vaga
                Route::get('/{id}', [VagaController::class, 'show'])->name('vagas.show');
                // Aprovar Vaga
                Route::post('/{id}', [VagaController::class, 'aprovar'])->name('vagas.aprovar');
            });

            Route::prefix('/denuncia')->group(function(){   
                
                // Denuncia Usuario
                Route::get('/usuario', [DenunciaUsuarioController::class, 'index'])->name('denunciar.usuario');
                Route::get('/usuario/{id}', [DenunciaUsuarioController::class, 'show'])->name('denunciaUsuario.show');

                
                // Denuncia Empresa
                Route::get('/empresa', [DenunciaEmpresaController::class, 'index'])->name('denunciar.empresa');
                Route::get('/empresa{id}', [DenunciaEmpresaController::class, 'show'])->name('denunciaEmpresa.show');

                // Denuncia Vaga
                Route::get('/vaga', [DenunciaVagaController::class, 'index'])->name('denunciar.vaga');
                Route::get('/vaga{id}', [DenunciaVagaController::class, 'show'])->name('denunciaVaga.show');

            });
            
            });
            
            Route::prefix('/area')->group(function(){
                Route::get('/', [AreaController::class, 'index'])->name('areas.index');
                Route::get('/listar', [AreaController::class, 'listar'])->name('listarAreas');
                Route::get('/cadastrar', [AreaController::class, 'create'])->name('areas.create');
                Route::post('/form', [AreaController::class, 'store'])->name('areas.store');
            });
});

/*
|--------------------------------------------------------------------------
| paginas de login
|--------------------------------------------------------------------------

*/

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//---------------------------------------------