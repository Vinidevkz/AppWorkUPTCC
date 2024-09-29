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

        $empresaId = Auth::guard('empresas')->id();
        if ($vaga->idEmpresa !== $empresaId) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para ver os candidatos dessa vaga.');
        }
    
        // Busque os candidatos que se inscreveram para esta vaga, incluindo o status
        $candidatos = VagaUsuario::where('idVaga', $idVaga)
            ->with(['usuario', 'status']) // Inclui a relação status
            ->get();
    
        return view('verVagaCadastrada', compact('vaga', 'candidatos'));
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
    public function destroy($id, Request $request)
    {
                // Encontra o usuario pelo ID
                $vagasUsuario = VagaUsuario::findOrFail($id);
    
                // Atualiza o status da usuario para 2
                $vagasUsuario->delete();
            
                    return response()->json(['message' => 'Vaga atualizada com sucesso']);
                
        
    }
}
