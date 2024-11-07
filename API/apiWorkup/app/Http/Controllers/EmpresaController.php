<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Empresa;
use App\Models\Vaga;
use App\Models\VagaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empresas = Empresa::with(['status', 'areas'])->get(); // Carrega as relações necessárias

        // Caso contrário, retorna a view com os usuários
        return view('admin.empresa.empresaAdmin', [
            'empresas'=>$empresas,]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastroEmpresa');
    }

    public function area()
    {
        return view('cadastrarAreaEmpresa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
|--------------------------------------------------------------------------
Validação
|--------------------------------------------------------------------------
*/

        $request->validate(
            [
                'usernameEmpresa'  => 'required|unique:tb_empresa,usernameEmpresa',
                'nomeEmpresa' => 'required',
                'emailEmpresa' => 'required|unique:tb_empresa,emailEmpresa',
                'sobreEmpresa' => 'required',
                'cnpjEmpresa' => 'required|unique:tb_empresa,cnpjEmpresa',
                'contatoEmpresa' => 'required',
                'senhaEmpresa' => 'required',
                'cidadeEmpresa' => 'required',
                'estadoEmpresa' => 'required',
                'LogradouroEmpresa' => 'required',
                'cepEmpresa' => 'required|min:8',
                'numeroLograEmpresa' => 'required',
            ],
            [
                'usernameEmpresa.required'  => 'Digite um APELIDO',
                'usernameEmpresa.unique'  => 'Este apelido já está existe!',
                'nomeEmpresa.required' => 'Digite um nome!',
                'sobreEmpresa.required' => 'Digite uma descrição sobre a empresa!',
                'cnpjEmpresa.required' => 'Digite um CNPJ!',
                'cnpjEmpresa.unique' => 'Este CNPJ já está registrado!',
                'contatoEmpresa.required' => 'Informe um e-mail ou telefone para contato!',
                'emailEmpresa.required' => 'Digite uma email!',
                'emailEmpresa.unique' => 'Este e-mail já está registrado!',
                'senhaEmpresa.required' => 'Digite uma senha!',
                'cidadeEmpresa.required' => 'Digite uma cidade',
                'estadoEmpresa.required' => 'Digite um estado',
                'LogradouroEmpresa.required' => 'Digite um logradouro',
                'cepEmpresa.required' => 'Digite um cep',
                'numeroLograEmpresa.required' => 'Digite um numero',
                
            ]
        );
        $empresa = new Empresa;

        $empresa->usernameEmpresa = $request->usernameEmpresa;
        $empresa->nomeEmpresa = $request->nomeEmpresa;
        $empresa->emailEmpresa = $request->emailEmpresa;
        $empresa->sobreEmpresa = $request->sobreEmpresa;
        $empresa->cnpjEmpresa = $request->cnpjEmpresa;
        $empresa->contatoEmpresa = $request->contatoEmpresa;
        $empresa->senhaEmpresa = Hash::make($request->senhaEmpresa);
        $empresa->cidadeEmpresa     = $request->cidadeEmpresa;
        $empresa->estadoEmpresa = $request->estadoEmpresa;
        $empresa->LogradouroEmpresa = $request->LogradouroEmpresa;
        $empresa->cepEmpresa = $request->cepEmpresa;
        $empresa->numeroLograEmpresa = $request->numeroLograEmpresa;
        $empresa->idStatus = 3;
        $empresa->fotoEmpresa =$request->fotoUrl;
        $empresa->BannerEmpresa =$request->fotoBanner;

    

        $empresa->save();
        return redirect()->route('login', ['id' => $empresa->idEmpresa]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busca a empresa pelo ID passado na URL
        $empresa = Empresa::where('idEmpresa', $id)->with('areas')->first();
    
        if (!$empresa) {
            return redirect()->route('empresas.index')->with('error', 'Empresa não encontrada');
        }
    
        // Retorna a view com os dados da empresa
        return view('admin.empresa.allempresaAdmin', compact('empresa'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id); // Encontra o usuário pelo ID ou lança um erro 404
        return view('admin.empresa.empresaEditarAdmin', compact('empresa')); // Passa o usuário para a view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::where('idEmpresa', $id)->get()->first();


        DB::table('tb_empresa')
            ->where('idEmpresa', $id)
            ->update([
                'nomeEmpresa' => $request->nomeEmpresa,
                'usernameEmpresa' => $request->usernameEmpresa,
                'emailEmpresa' => $request->emailEmpresa,
                'contatoEmpresa' => $request->contatoEmpresa,
                'sobreEmpresa' => $request->sobreEmpresa,
                'cidadeEmpresa' => $request->cidadeEmpresa,
                'estadoEmpresa' => $request->estadoEmpresa,
                'LogradouroEmpresa' => $request->LogradouroEmpresa,
                'cepEmpresa' => $request->cepEmpresa,
                'numeroLograEmpresa' => $request->numeroLograEmpresa,

            ]);

        if ($request->ajax()) {
            return response()->json(['message' => 'Empresa atualizado com sucesso']); // Retorna JSON se for uma requisição AJAX
        }

        // Caso contrário, retorna a view com os usuários

        $empresas = Empresa::findOrFail($id);
        $empresas->update($request->all());
    
        // Redirecionar para a lista de usuários
        return view('admin.empresa.editarAreaEmpresa', ['empresa' => $empresas]); // Passa o usuário para a view
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // Encontra a empresa pelo ID
        $empresa = Empresa::findOrFail($id);
    
        // Atualiza o status da empresa para 2
        $empresa->update(['idStatus' => 2]);
    
        // Verifica se a requisição foi feita via AJAX
        if ($request->ajax()) {
            return response()->json(['message' => 'Empresa atualizada com sucesso']);
        }
    
        // Redireciona para a lista de empresas com mensagem de sucesso
        return redirect('/admin/empresa/listar')->with('success', 'Empresa atualizada com sucesso.');
    }

    public function aprovar(Request $request, $id)
    {
        // Encontra a empresa pelo ID
        $empresa = Empresa::findOrFail($id);
    
        // Atualiza o status da empresa para 2
        $empresa->update(['idStatus' => 1]);
    
        // Verifica se a requisição foi feita via AJAX
        if ($request->ajax()) {
            return response()->json(['message' => 'Empresa atualizada com sucesso']);
        }
    
        // Redireciona para a lista de empresas com mensagem de sucesso
        return redirect('/admin/empresa/listar')->with('success', 'Empresa atualizada com sucesso.');
    }


    public function showEmpresaApp($id)
    {
        $empresa = Empresa::where('idEmpresa', $id)->first();
    
        if ($empresa) {
            return response()->json($empresa, 200);
        } else {
            return response()->json(['message' => 'Empresa não encontrada'], 404);
        }
    }
    

    public function dashboard(){

            $idEmpresa = Auth::guard('empresa')->id();
            $empresa = Empresa::select('*')->where('idEmpresa', $idEmpresa)->first();

        // Busca todas as vagas cadastradas pela empresa, com a contagem de candidatos

            $vagas = DB::table('tb_vaga')
                ->where('tb_vaga.idEmpresa', $idEmpresa)
                ->select(
                    'tb_vaga.*',
                    'tb_modalidadeVaga.descModalidadeVaga', 
                    DB::raw('COUNT(tb_vagausuario.idVaga) as total_candidatos')
                )
                ->join('tb_modalidadeVaga', 'tb_vaga.idModalidadeVaga','tb_modalidadeVaga.idModalidadeVaga')
                ->join('tb_area', 'tb_vaga.idArea','tb_area.idArea')
                ->join('tb_status', 'tb_vaga.idStatus','tb_status.idStatus')
                ->leftJoin('tb_vagausuario', 'tb_vaga.idVaga','tb_vagausuario.idVaga')  // Fazendo o join com a tabela de candidaturas
                ->groupBy(
                    'tb_vaga.idVaga',
                    'tb_vaga.nomeVaga',
                    'tb_vaga.descricaoVaga',
                    'tb_vaga.prazoVaga',
                    'tb_vaga.salarioVaga',
                    'tb_vaga.cidadeVaga',
                    'tb_vaga.estadoVaga',
                    'tb_vaga.beneficiosVaga',
                    'tb_vaga.diferencialVaga',
                    'tb_vaga.idEmpresa',
                    'tb_vaga.idArea',
                    'tb_vaga.idStatus',
                    'tb_vaga.idModalidadeVaga',
                    'tb_vaga.created_at',
                    'tb_vaga.updated_at',
                    'tb_modalidadeVaga.descModalidadeVaga'
                )
                ->get();


                    


            return view('dashboardEmpresa', ['empresa'=>$empresa, 'vagas'=>$vagas]);
        
    }

    public function showVagasPorEmpresa()
    {
       // Verifica se o usuário está autenticado
       if (!Auth::guard('empresa')->check()) {
           return redirect()->route('login'); // Redireciona para a página de login se não estiver autenticado
       }

       $empresaId = Auth::guard('empresa')->id(); // Pega o ID da empresa autenticada


       // Busca todas as vagas cadastradas pela empresa
       $vagas = Vaga::where('idEmpresa', $empresaId)->with('status', 'area', 'modalidade')->get();

       return view('homeEmpresa', compact('vagas')); // Passa a variável $vagas para a view
   }

}

