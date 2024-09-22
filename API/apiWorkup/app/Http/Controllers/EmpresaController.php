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
        $empresas = Empresa::all();

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
                'atuacaoEmpresa' => 'required',
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
                'atuacaoEmpresa.required' => 'Digite a area de atuação',
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
        $empresa->atuacaoEmpresa = $request->atuacaoEmpresa;
        $empresa->cnpjEmpresa = $request->cnpjEmpresa;
        $empresa->contatoEmpresa = $request->contatoEmpresa;
        $empresa->senhaEmpresa = Hash::make($request->senhaEmpresa);
        $empresa->cidadeEmpresa     = $request->cidadeEmpresa;
        $empresa->estadoEmpresa = $request->estadoEmpresa;
        $empresa->LogradouroEmpresa = $request->LogradouroEmpresa;
        $empresa->cepEmpresa = $request->cepEmpresa;
        $empresa->numeroLograEmpresa = $request->numeroLograEmpresa;

        $empresa->save();
        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::where('idEmpresa', $id)->firstOrFail(); // Retorna 404 se não encontrar

        return view('admin.empresa.allempresaAdmin', compact('empresa')); // Retorna a view com detalhes
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
                'atuacaoEmpresa' => $request->atuacaoEmpresa,
                'contatoEmpresa' => $request->contatoEmpresa,
                'sobreEmpresa' => $request->sobreEmpresa,

            ]);

        if ($request->ajax()) {
            return response()->json(['message' => 'Empresa atualizado com sucesso']); // Retorna JSON se for uma requisição AJAX
        }

        // Caso contrário, retorna a view com os usuários

        $empresas = Empresa::findOrFail($id);
        $empresas->update($request->all());
    
        // Redirecionar para a lista de usuários
        return redirect('/verEmpresa')->with('success', 'Empresa atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
