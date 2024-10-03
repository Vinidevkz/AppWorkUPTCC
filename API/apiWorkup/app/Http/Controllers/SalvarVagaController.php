<?php

namespace App\Http\Controllers;

use App\Models\SalvarVaga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalvarVagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'idUsuario' => 'required',
                'idVaga' => 'required',
            ],
            [
                'idUsuario.required' => 'Não está logado',
                'idVaga.required' => 'Selecione uma vaga',
            ]
        );
    
        $idUsuario = $request->idUsuario; // Obtenha do corpo da requisição
        $idVaga = $request->idVaga; // Obtenha do corpo da requisição
    
        try {
            $vagaSalva = new SalvarVaga();
            $vagaSalva->idUsuario = $idUsuario;
            $vagaSalva->idVaga = $idVaga;
    
            if ($vagaSalva->save()) {
                return response()->json(['message' => 'Vaga salva com sucesso!'], 201);
            } else {
                return response()->json(['message' => 'Erro ao salvar a vaga.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao salvar a vaga.',
                'error' => $e->getMessage(), // Mensagem de erro detalhada
                'code' => $e->getCode() // Código de erro, se disponível
            ], 500);
        }
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
