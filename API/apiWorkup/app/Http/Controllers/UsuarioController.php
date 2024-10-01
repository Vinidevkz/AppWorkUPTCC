<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    // Método para retornar todos os usuários
    public function index(): JsonResponse
    {
        try {
            $usuarios = Usuario::all(); // Recupera todos os usuários
            return response()->json($usuarios, 200); // Retorna em formato JSON
        } catch (\Exception $e) {
            Log::error("Error retrieving users: ", ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Erro ao recuperar usuários.'], 500);
        }
    }

    public function show($id)
    {
        $usuario = Usuario::where('idUsuario', $id)->with('areas')->firstOrFail(); // Retorna 404 se não encontrar

        return response()->json($usuario);

        //return view('admin.usuario.allusuarioAdmin', compact('usuario')); // Retorna a view com detalhes
    }

    public function store(Request $request)
    {
        try {
            Log::info("Request data: ", $request->all());
    
            // Validação
            $request->validate([
                'nomeUsuario' => 'required|string|max:40',
                'usernameUsuario' => 'required|string|max:40',
                'nascUsuario' => 'required|date',
                'emailUsuario' => 'required|email|unique:tb_usuario,emailUsuario',
                'senhaUsuario' => 'required|min:8',
                'contatoUsuario' => 'required|string|max:20',
                'areaInteresseUsuario' => 'nullable|string|max:100', // Campo novo
                'fotoUsuario' => 'nullable|string',  // Tornado não obrigatório
                'fotoBanner' => 'nullable|string|max:300', // Campo novo
                'cidadeUsuario' => 'required|string|max:40',
                'estadoUsuario' => 'required|string|max:40',
                'logradouroUsuario' => 'required|string|max:40',
                'cepUsuario' => 'required|string|max:40',
                'numeroLograUsuario' => 'required|string|max:40',
                'sobreUsuario' => 'required|string|max:40',
                'formacaoCompetenciaUsuario' => 'required|string|max:40',
                'dataFormacaoCompetenciaUsuario' => 'required|date',
            ]);
    
            Log::info("Validated data: ", $request->all());
    
            // Criação do usuário com os novos campos
            $usuario = Usuario::create([
                'nomeUsuario' => $request->nomeUsuario,
                'usernameUsuario' => $request->usernameUsuario,
                'nascUsuario' => $request->nascUsuario,
                'emailUsuario' => $request->emailUsuario,
                'senhaUsuario' => bcrypt($request->senhaUsuario),
                'contatoUsuario' => $request->contatoUsuario,
                'areaInteresseUsuario' => $request->areaInteresseUsuario,  // Campo novo
                'fotoUsuario' => $request->fotoUsuario,  // Aqui você deve receber a string da URL
                'fotoBanner' => $request->fotoBanner,  // Campo novo
                'cidadeUsuario' => $request->cidadeUsuario,
                'estadoUsuario' => $request->estadoUsuario,
                'logradouroUsuario' => $request->logradouroUsuario,
                'cepUsuario' => $request->cepUsuario,
                'numeroLograUsuario' => $request->numeroLograUsuario,
                'sobreUsuario' => $request->sobreUsuario,
                'formacaoCompetenciaUsuario' => $request->formacaoCompetenciaUsuario,
                'dataFormacaoCompetenciaUsuario' => $request->dataFormacaoCompetenciaUsuario,
                'idStatus' => 3,
            ]);
    
            Log::info("User registered successfully: ", $usuario->toArray());
    
            return response()->json($usuario, 201);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error("Validation error: ", $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error("Error during user registration: ", ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Erro ao cadastrar o usuário. Por favor, tente novamente mais tarde.'], 500);
        }
    }
    

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        // Validação dos dados recebidos
        $request->validate([
            'nomeUsuario' => 'sometimes|required|string|max:40',
            'usernameUsuario' => 'sometimes|required|string|max:40',
            'contatoUsuario' => 'sometimes|required|string|max:20',
            'sobreUsuario' => 'sometimes|required|string|max:40',
        ]);

        // Atualiza os campos que foram passados
        $usuario->update($request->only([
            'nomeUsuario', 
            'usernameUsuario', 
            'contatoUsuario', 
            'sobreUsuario'
        ]));

        if ($request->ajax()) {
            return response()->json(['message' => 'Usuário atualizado com sucesso']);
        }

        return redirect('/verUsuario')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy($id, Request $request)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update(['idStatus' => 2]);

        if ($request->ajax()) {
            return response()->json(['message' => 'Usuário desativado com sucesso']);
        }

        return redirect('/verUsuario')->with('success', 'Usuário desativado com sucesso.');
    }

    public function login(Request $request)
    {

        // Procura o usuário no banco de dados
        $usuario = Usuario::where('emailUsuario', '=', $request->input('emailUsuario'))
            ->orWhere('usernameUsuario', $request->input('emailUsuario'))
            ->get()
            ->first();

        if ($usuario && $request->input('senhaUsuario') == $usuario->senhaUsuario) {
            return response()->json($usuario);
        }

        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }

    // Método dashboard omitido para brevidade...
}
