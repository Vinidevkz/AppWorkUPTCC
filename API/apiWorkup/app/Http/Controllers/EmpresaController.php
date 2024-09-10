<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = Empresa::all();

        return $empresa;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'usernameEmpresa'  => 'required', 
                'nomeEmpresa' => 'required|', 
                'sobreEmpresa'=>'required',
                'atuacaoEmpresa'=>'required',
                'cnpjEmpresa'=>'required',
                'contatoEmpresa'=>'required',
                'senhaEmpresa'=>'required',
                'cidadeEmpresa'=>'required',
                'estadoEmpresa'=>'required',
                'LogradouroEmpresa'=>'required',
                'cepEmpresa'=>'required',
                'numeroLograEmpresa'=>'required',
            ],
            [
                'usernameEmpresa.required'  => 'Digite um APELIDO',
                'nomeEmpresa.required' => 'Digite um nome', 
                'sobreEmpresa.required' =>'Digite sobre a empresa',
                'atuacaoEmpresa.required' =>'Digite a area de atuação',
                'cnpjEmpresa.required' =>'Digite um cnpj',
                'contatoEmpresa.required' =>'Digite um contato',
                'senhaEmpresa.required' =>'Digite uma senha',
                'cidadeEmpresa.required' =>'Digite uma cidade',
                'estadoEmpresa.required' =>'Digite um estado',
                'LogradouroEmpresa.required' =>'Digite um logradouro',
                'cepEmpresa.required' =>'Digite um cep',
                'numeroLograEmpresa.required' =>'Digite um numero',
                ]
        );
        $empresa = new Empresa;

        $empresa->usernameEmpresa = $request->usernameEmpresa;
        $empresa->nomeEmpresa = $request->nomeEmpresa;
        $empresa->fotoEmpresa = $request->fotoEmpresa;
        $empresa->sobreEmpresa = $request->sobreEmpresa;
        $empresa->atuacaoEmpresa = $request->atuacaoEmpresa;
        $empresa->cnpjEmpresa = $request->cnpjEmpresa;
        $empresa->contatoEmpresa = $request->contatoEmpresa;
        $empresa->senhaEmpresa = $request->senhaEmpresa;
        $empresa->cidadeEmpresa	 = $request->cidadeEmpresa;
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
        $empresa = Empresa::where('idEmpresa', $id)->get();

        return $empresa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
