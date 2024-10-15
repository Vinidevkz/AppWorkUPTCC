<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
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
        if ($request->has('order') && $request->order == 'status') {
            // Ordena para trazer idStatus = 2 primeiro
            $empresas = Empresa::with('status')->orderByRaw("FIELD(idStatus, 2, 1), nomeEmpresa ASC")->get();
        } else {
            // Caso contrário, traz as empresas normalmente (com idStatus = 1 primeiro)
            $empresas = Empresa::with('status')->orderBy('idStatus', 'asc')->get();
        }

        if ($request->ajax()) {
            return response()->json($empresas); // Retorna JSON se for uma requisição AJAX
        }

        // Caso contrário, retorna a view com os usuários
        return view('admin.empresa.empresaAdmin', compact('empresas'));
    }

    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastrarEmpresa');
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
                'usernameEmpresa'  => 'required',
                'nomeEmpresa' => 'required|',
                'sobreEmpresa' => 'required',
                'cnpjEmpresa' => 'required',
                'contatoEmpresa' => 'required',
                'senhaEmpresa' => 'required',
                'cidadeEmpresa' => 'required',
                'estadoEmpresa' => 'required',
                'LogradouroEmpresa' => 'required',
                'cepEmpresa' => 'required',
                'numeroLograEmpresa' => 'required',
            ],
            [
                'usernameEmpresa.required'  => 'Digite um APELIDO',
                'nomeEmpresa.required' => 'Digite um nome',
                'sobreEmpresa.required' => 'Digite sobre a empresa',
                'cnpjEmpresa.required' => 'Digite um cnpj',
                'contatoEmpresa.required' => 'Digite um contato',
                'senhaEmpresa.required' => 'Digite uma senha',
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
        $empresa->fotoEmpresa = $request->fotoEmpresa;
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

        $empresa->save();
        return redirect()->route('cadastrarAreaEmpresa', ['id' => $empresa->idEmpresa]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::where('idEmpresa', $id)->with('areas')->firstOrFail(); // Carrega a empresa com suas áreas
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
        return redirect('/verEmpresa')->with('success', 'Empresa atualizada com sucesso.');
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
        return redirect('/verEmpresa')->with('success', 'Empresa atualizada com sucesso.');
    }


    public function showEmpresaApp($id){

        $empresa = Empresa::where('idEmpresa', $id);

        return response()->json($empresa, 201);
    }
}

