<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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

/*
|--------------------------------------------------------------------------
Validação
|--------------------------------------------------------------------------
*/

        $request->validate([
            'nomeUsuario' => 'required|string|max:40',
            'usernameUsuario' => 'required|string|max:40',
            'nascUsuario' => 'required|date',
            'emailUsuario' => 'required|email',
            'senhaUsuario' => 'required|min:8',
            'areaInteresseUsuario' => 'required|string|max:40',
            'contatoUsuario' => 'required|string|max:20',
            'cidadeUsuario' => 'required|string|max:40',
            'estadoUsuario' => 'required|string|max:40',
            'logradouroUsuario' => 'required|string|max:40',
            'cepUsuario' => 'required|string|max:40',
            'numeroLograUsuario' => 'required|string|max:40',
            'sobreUsuario' => 'required|string|max:40',
            'formacaoCompetenciaUsuario' => 'required|string|max:40',
            'dataFormacaoCompetenciaUsuario' => 'required|date',
        ],
        [
            //mensagens de erro:

        ]);

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
        $usuario = Usuario::where('idUsuario', $id)->get()->first();

        return response()->json($usuario);
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
        $usuario = Usuario::where('idUsuario', $id)->get()->first();

            DB::table('tb_usuario')
            ->where('idUsuario', $id)
            ->update([
                'nomeUsuario'=>$request->nomeUsuario,
                'usernameUsuario' => $request->usernameUsuario,
                'nascUsuario' => $request->nascUsuario,
                //'emailUsuario' => $request->emailUsuario,
                //'senhaUsuario' => $request->senhaUsuario,
                'areaInteresseUsuario' => $request->areaInteresseUsuario,
                'contatoUsuario' => $request->contatoUsuario,
                //'fotoUsuario' => $request->fotoUsuario,
                //'cidadeUsuario' => $request->cidadeUsuario,
                //'estadoUsuario' => $request->estadoUsuario,
                //'logradouroUsuario' => $request->logradouroUsuario,
                //'cepUsuario' => $request->cepUsuario,
                //'numeroLograUsuario' => $request->numeroLograUsuario,
                'sobreUsuario' => $request->sobreUsuario,
                'formacaoCompetenciaUsuario' => $request->formacaoCompetenciaUsuario,
                //'dataFormacaoCompetenciaUsuario' => $request->dataFormacaoCompetenciaUsuario
            ]);
            
        return response()->json(['message'=>'Usuario atualizado com sucesso']);
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

    public function login(Request $request){

        // Procura o usuário no banco de dados
        $usuario = Usuario::where('emailUsuario', '=', $request->input('emailUsuario'))
                        ->orWhere('usernameUsuario', $request->input('emailUsuario'))
                        ->get()
                        ->first();

        if($usuario && $request->input('senhaUsuario') == $usuario->senhaUsuario){
            return response()->json($usuario);
        }

        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }
}
