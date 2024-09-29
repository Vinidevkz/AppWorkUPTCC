<?php

namespace App\Http\Controllers;

use App\Models\VagaUsuario;
use Illuminate\Http\Request;

class VagaUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vagasUsuario = VagaUsuario::all();

        return $vagasUsuario;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Area');
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
                'idVaga' => 'required',
                'idUsuario' => 'required', // Adicione esta linha
            ],
            [
                'idVaga.required' => 'Escolha uma vaga',
                'idUsuario.required' => 'O ID do usuário é necessário', // Mensagem de erro personalizada
            ]
        );
        
    
        $vagasUsuario = new VagaUsuario();
        $vagasUsuario->idVaga = $request->idVaga;
        $vagasUsuario->idUsuario = $request->idUsuario;
        $vagasUsuario->idStatusVagaUsuario = 1;
    
        if ($vagasUsuario->save()) {
            return response()->json(['message' => 'Candidatura realizada com sucesso!'], 201);
        }
    
        return response()->json(['message' => 'Erro ao cadastrar candidatura.'], 500);
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
