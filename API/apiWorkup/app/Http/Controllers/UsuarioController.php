<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Vaga;
use App\Models\AreaInteresseUsuario;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
                'areaInteresseUsuario' => 'required|string|max:100',
                'fotoUsuario' => 'required|string',
                'fotoBanner' => 'required|string|max:300',
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

            // Criação do usuário
            $usuario = Usuario::create([
                'nomeUsuario' => $request->nomeUsuario,
                'usernameUsuario' => $request->usernameUsuario,
                'nascUsuario' => $request->nascUsuario,
                'emailUsuario' => $request->emailUsuario,
                'senhaUsuario' => bcrypt($request->senhaUsuario),
                'contatoUsuario' => $request->contatoUsuario,
                'areaInteresseUsuario' => $request->areaInteresseUsuario,
                'fotoUsuario' => $request->fotoUsuario,
                'fotoBanner' => $request->fotoBanner,
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
            ->first();

        if ($usuario && password_verify($request->input('senhaUsuario'), $usuario->senhaUsuario)) {
            return response()->json($usuario);
        }

        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }

    public function dashboard()
    {
        $areaCounts = [
            'Tecnologia' => AreaInteresseUsuario::where('idArea', 1)->count(),
            'Alimentacao' => AreaInteresseUsuario::where('idArea', 11)->count(),
            'Gestao' => AreaInteresseUsuario::where('idArea', 3)->count(),
            'Gastronomia' => AreaInteresseUsuario::where('idArea', 4)->count(),
            'Engenharia' => AreaInteresseUsuario::where('idArea', 14)->count(),
            'Administracao' => AreaInteresseUsuario::where('idArea', 5)->count(),
            'Marketing' => AreaInteresseUsuario::where('idArea', 2)->count(),
            'Educacao' => AreaInteresseUsuario::where('idArea', 7)->count(),
            'Financas' => AreaInteresseUsuario::where('idArea', 8)->count(),
            'RecursosHumanos' => AreaInteresseUsuario::where('idArea', 9)->count(),
            'Logistica' => AreaInteresseUsuario::where('idArea', 10)->count(),
            'ServicosGerais' => AreaInteresseUsuario::where('idArea', 12)->count(),
            'MeioAmbiente' => AreaInteresseUsuario::where('idArea', 15)->count(),
            'Medicina' => AreaInteresseUsuario::where('idArea', 6)->count(),
            'Higienizacao' => AreaInteresseUsuario::where('idArea', 13)->count(),
        ];

        // STATUS
        $statusCounts = [
            'Ativo' => Usuario::where('idStatus', 1)->count(),
            'Bloqueado' => Usuario::where('idStatus', 2)->count(),
        ];

        // Vaga counts
        $vagaCounts = [
            'Tecnologia' => Vaga::where('idArea', 1)->count(),
            'Marketing' => Vaga::where('idArea', 2)->count(),
            'Gestao' => Vaga::where('idArea', 3)->count(),
            'Engenharia' => Vaga::where('idArea', 14)->count(),
            'Administracao' => Vaga::where('idArea', 5)->count(),
            'Gastronomia' => Vaga::where('idArea', 4)->count(),
            'Medicina' => Vaga::where('idArea', 6)->count(),
            'Educacao' => Vaga::where('idArea', 7)->count(),
            'Financa' => Vaga::where('idArea', 8)->count(),
            'Rh' => Vaga::where('idArea', 9)->count(),
            'Logistica' => Vaga::where('idArea', 10)->count(),
            'Alimentacao' => Vaga::where('idArea', 11)->count(),
            'MeioAmbiente' => Vaga::where('idArea', 15)->count(),
            'ServicosGerais' => Vaga::where('idArea', 12)->count(),
            'Higienizacao' => Vaga::where('idArea', 13)->count(),
        ];

        $totalRegistrosVaga = DB::table('tb_vaga')->count();
        $totalRegistrosUsuario = DB::table('tb_usuario')->count();
       
    }}