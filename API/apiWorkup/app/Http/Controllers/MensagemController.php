<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensagem;
use App\models\Chat;
use Illuminate\Support\Facades\DB;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Supondo que você tenha um relacionamento configurado para pegar as mensagens
        $mensagens = DB::table('tb_chat')
            ->join('tb_Mensagem', 'tb_chat.idMensagem', '=', 'tb_Mensagem.idMensagem')
            ->join('tb_Usuario', 'tb_chat.idUsuario', '=', 'tb_Usuario.idUsuario') // Substitua por seu modelo de usuário
            ->join('tb_Empresa', 'tb_chat.idEmpresa', '=', 'tb_Empresa.idEmpresa') // Substitua por seu modelo de empresa
            ->get();
    
        return view('mensagem.index', compact('mensagens'));
    }

    public function indexUsuario()
{
    // Obtendo o ID do usuário autenticado
    $usuarioId = auth()->guard('usuario')->user()->idUsuario;

    // Buscando as mensagens que o usuário recebeu
    $mensagens = DB::table('tb_chat')
        ->join('tb_Mensagem', 'tb_chat.idMensagem', '=', 'tb_Mensagem.idMensagem')
        ->join('tb_Empresa', 'tb_chat.idEmpresa', '=', 'tb_Empresa.idEmpresa') // Junta com a tabela de empresas
        ->where('tb_chat.idUsuario', $usuarioId) // Filtra mensagens recebidas pelo usuário
        ->select('tb_Mensagem.mensagem', 'tb_Empresa.nomeEmpresa as empresaNome', 'tb_chat.created_at')
        ->orderBy('tb_chat.created_at', 'desc')
        ->get();

        return response()->json($mensagens);
}

public function indexUsuarioUnico($idUsuario)
{
   // Obtendo o nome do usuário
   $usuario = DB::table('tb_Usuario')->where('idUsuario', $idUsuario)->first();

   // Verifique se o usuário foi encontrado
   if (!$usuario) {
       return redirect()->back()->with('error', 'Usuário não encontrado.');
   }

   // Buscando as mensagens que o usuário específico enviou ou recebeu
   $mensagens = DB::table('tb_chat')
       ->join('tb_Mensagem', 'tb_chat.idMensagem', '=', 'tb_Mensagem.idMensagem')
       ->join('tb_Empresa', 'tb_chat.idEmpresa', '=', 'tb_Empresa.idEmpresa')
       ->where('tb_chat.idUsuario', $idUsuario)
       ->select('tb_Mensagem.mensagem', 'tb_Empresa.nomeEmpresa as empresaNome', 'tb_chat.created_at')
       ->orderBy('tb_chat.created_at', 'desc')
       ->get();

   // Passando o nome do usuário para a view
   return view('mensagem.Unico', [
       'mensagens' => $mensagens,
       'usuarioNome' => $usuario->nomeUsuario // Adicione aqui o nome do usuário
   ]);
}

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idUsuario, $idEmpresa)
    {
        return view('mensagem.mensagem', compact('idUsuario', 'idEmpresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $mensagem = new Mensagem();
        $mensagem->idUsuario = $request->idUsuario;
        $mensagem->idEmpresa = $request->idEmpresa;
        $mensagem->mensagem = $request->mensagem;

        $mensagem->save();
        // Adiciona a entrada na tabela de chat
        DB::table('tb_chat')->insert([
            'idMensagem' => $mensagem->idMensagem,
            'idUsuario' => $request->idUsuario,
            'idEmpresa' => $request->idEmpresa,
            'created_at' => now(), // ou use $mensagem->created_at

        ]);
        return redirect('/empresa')->with('success', 'Mensagem enviada com sucesso!');
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
