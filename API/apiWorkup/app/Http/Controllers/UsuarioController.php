<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::all();

        return $usuario;
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
        $usuario = new Usuario;

        $usuario->nomeUsuario = $request->nomeUsuario;
        $usuario->usernameUsuario = $request->usernameUsuario;
        $usuario->nascUsuario = $request->nascUsuario;
        $usuario->emailUsuario = $request->emailUsuario;
        $usuario->senhaUsuario = $request->senhaUsuario;
        $usuario->areaInteresseUsuario = $request->areaInteresseUsuario;
        $usuario->contatoUsuario = $request->contatoUsuario;
        $usuario->fotoUsuario = $request->fotoUsuario;
        $usuario->cidadeUsuario = $request->cidadeUsuario;
        $usuario->estadoUsuario = $request->estadoUsuario;
        $usuario->logradouroUsuario = $request->logradouroUsuario;
        $usuario->cepUsuario = $request->cepUsuario;
        $usuario->numeroLograUsuario = $request->numeroLograUsuario;
        $usuario->sobreUsuario = $request->sobreUsuario;
        $usuario->formacaoCompetenciaUsuario = $request->formacaoCompetenciaUsuario;
        $usuario->dataFormacaoCompetenciaUsuario = $request->dataFormacaoCompetenciaUsuario;
        
        $usuario->save();
        return response()->json($usuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::where('idUsuario', $id)->get();

        return $usuario;
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
