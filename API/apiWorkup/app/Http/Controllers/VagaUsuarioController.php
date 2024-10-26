<?php

namespace App\Http\Controllers;

use App\Models\VagaUsuario;
use Illuminate\Http\Request;
use App\Models\Vaga;
use Illuminate\Support\Facades\Auth;

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

    }



    public function verVagaCadastrada($idVaga)
    {
        // Encontre a vaga com o ID passado
        $vaga = Vaga::findOrFail($idVaga);

        $empresaId = Auth::guard('empresa')->id();
        if ($vaga->idEmpresa !== $empresaId) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para ver os candidatos dessa vaga.');
        }
    
        // Busque os candidatos que se inscreveram para esta vaga, incluindo o status
        $candidatos = VagaUsuario::where('idVaga', $idVaga)
            ->with(['usuario', 'status']) // Inclui a relação status
            ->get();
            $empresa = Auth::guard('empresa')->user(); // Obter a empresa autenticada
        return view('verVagaCadastrada', compact('vaga', 'candidatos', 'empresa'));
    }

    public function aprovarCandidatura($id)
{
    $vagaUsuario = VagaUsuario::findOrFail($id);
    $vagaUsuario->idStatusVagaUsuario = 2; // 2 para aprovado
    $vagaUsuario->save();

    return redirect()->back()->with('success', 'Candidatura aprovada com sucesso.');
}

public function negarCandidatura($id)
{
    $vagaUsuario = VagaUsuario::findOrFail($id);
    $vagaUsuario->idStatusVagaUsuario = 3; // 3 para negado
    $vagaUsuario->save();

    return redirect()->back()->with('success', 'Candidatura negada com sucesso.');
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
    public function destroy($idUsuario, $idVaga, Request $request)
    {
        // Encontra a candidatura pelo ID da vaga e do usuário
        $vagaUsuario = VagaUsuario::where('idUsuario', $idUsuario)
            ->where('idVaga', $idVaga)
            ->firstOrFail();
    
        // Deleta a candidatura
        $vagaUsuario->delete();
    
        return response()->json(['message' => 'Candidatura cancelada com sucesso']);
    }
    

    public function verificarCandidatura($userId, $vagaId)
{
    // Consultar a tabela de candidaturas para verificar se o usuário já se candidatou à vaga
    $candidatura = VagaUsuario::where('idUsuario', $userId)
                              ->where('idVaga', $vagaId)
                              ->first();

    if ($candidatura) {
        return response()->json(['isCandidated' => true, 'message' => 'Usuário já se candidatou'], 200);
    } else {
        return response()->json(['isCandidated' => false, 'message' => 'Usuário não se candidatou'], 200);
    }
}


public function minhasVagas($userId)
{
    // Supondo que o modelo de candidatura seja Candidatura e tenha um relacionamento com Vaga
    $candidaturas = VagaUsuario::where('idUsuario', $userId)->with('vaga')->with('empresa')->get();

    return response()->json($candidaturas); // Retorna as candidaturas com os dados das vagas em JSON
}


}










