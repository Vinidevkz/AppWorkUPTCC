<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seguir;

class SeguirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idUsuario)
    {
                // Validação do parâmetro de rota
                if (!is_numeric($idUsuario)) {
                    return response()->json([
                        'message' => 'O id do usuario deve ser um número inteiro',
                    ], 400);
                }
            
                try {
                    $seguindo = Seguir::where('idUsuario', $idUsuario)->get();
            
                    return response()->json($seguindo, 200);
                } catch (\Exception $e) {
                    return response()->json([
                        'message' => 'Erro ao buscar vagas salvas',
                        'error' => $e->getMessage(),
                    ], 500);
                }
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
                'idEmpresa' => 'required',
            ],
            [
                'idUsuario.required' => 'Não está logado',
                'idEmpresa.required' => 'Selecione uma Empresa',
            ]
        );
    
        $idUsuario = $request->idUsuario; // Obtenha do corpo da requisição
        $idEmpresa = $request->idEmpresa; // Obtenha do corpo da requisição
        
    
        try {
            $seguindo = new Seguir();
            $seguindo->idUsuario = $idUsuario;
            $seguindo->idEmpresa = $idEmpresa;
            $seguindo->created_at = now();
    
            if ($seguindo->save()) {
                return response()->json(['message' => 'seguindo Empresa com sucesso!'], 201);
            } else {
                return response()->json(['message' => 'Erro ao seguir a empresa.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao seguir a empresa.',
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
    public function destroy(Request $request)
    {
        $request->validate(
            [
                'idUsuario' => 'required',
                'idEmpresa' => 'required',
            ],
            [
                'idUsuario.required' => 'Não está logado',
                'idEmpresa.required' => 'Selecione uma empresa',
            ]
        );
    
        $idUsuario = $request->idUsuario;
        $idEmpresa = $request->idEmpresa;
    
        try {
            // Encontre a empresa seguindo com base no idUsuario e idEmpresa
            $seguindo = Seguir::where('idUsuario', $idUsuario)
                ->where('idEmpresa', $idEmpresa)
                ->first();
    
            // Verifique se o salvamento foi encontrado
            if (!$seguindo) {
                return response()->json(['message' => 'Seguindo não encontrado.'], 404);
            }
    
            // Exclua o registro
            if ($seguindo->delete()) {
                return response()->json(['message' => 'Seguindo removida com sucesso!'], 200);
            } else {
                return response()->json(['message' => 'Erro ao parar de seguir.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao tentar parar de seguir a empresa.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
