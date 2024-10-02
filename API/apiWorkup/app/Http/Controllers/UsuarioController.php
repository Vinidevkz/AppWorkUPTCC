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
    public function index()
    {

            $usuarios = Usuario::all(); // Recupera todos os usuários
            return view('admin.usuario.usuarioAdmin',['usuarios'=>$usuarios]); // Retorna em formato JSON

    }

    public function indexApp()
    {

            return response()->json(['message' => 'Erro ao recuperar usuários.'], 500);
        
    }

    public function show(Request $request, $id)
    {
        $usuario = Usuario::where('idUsuario', $id)->with('areas')->firstOrFail(); // Retorna 404 se não encontrar
        
        if($request->expectsJson()){
            return response()->json($usuario, 201);
        }

        return view('admin.usuario.allUsuarioAdmin', ['usuario'=>$usuario]);
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
                'senhaUsuario' => 'required|min:3',
                'contatoUsuario' => 'required|string|max:20',
                'areaInteresseUsuario' => 'required|string|max:100',
                'fotoUsuario' => 'nullable|string|max:300',
                'fotoBanner' => 'nullable|string|max:300',
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
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar o usuário. Por favor, tente novamente mais tarde.',
                'error' => $e->getMessage() // Para depuração, você pode retornar a mensagem de erro.
            ], 500);
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
        $totalUsuariosTecnologia = AreaInteresseUsuario::where('idArea', 1)->count();
        $totalUsuariosAlimentacao = AreaInteresseUsuario::where('idArea', 11)->count();
        $totalUsuariosGestao = AreaInteresseUsuario::where('idArea', 3)->count();
        $totalUsuarioGastronomia = AreaInteresseUsuario::where('idArea', 4)->count();
        $totalUsuariosEngenharia = AreaInteresseUsuario::where('idArea', 14)->count();
        $totalUsuariosAdministracao = AreaInteresseUsuario::where('idArea', 5)->count();
        $totalUsuariosMarketing = AreaInteresseUsuario::where('idArea', 2)->count();
        $totalUsuariosEducacao = AreaInteresseUsuario::where('idArea', 7)->count();
        $totalUsuariosFinancas = AreaInteresseUsuario::where('idArea', 8)->count();
        $totalUsuariosRecursosHumanos = AreaInteresseUsuario::where('idArea', 9)->count();
        $totalUsuariosLogistica = AreaInteresseUsuario::where('idArea', 10)->count();
        $totalUsuariosServicosGerais = AreaInteresseUsuario::where('idArea', 12)->count();
        $totalUsuariosMeioAmbiente = AreaInteresseUsuario::where('idArea', 15)->count();
        $totalUsuarioMedicina = AreaInteresseUsuario::where('idArea', 6)->count();
        $totalUsuarioHigienizacao = AreaInteresseUsuario::where('idArea', 13)->count();

        // STATUS
        $statusAtivo = Usuario::where('idStatus', 1)->count();
        $statusBloqueado = Usuario::where('idStatus', 2)->count();
        


        $totalVagaTecnologia = Vaga::where('idArea', 1)->count();
        $totalVagaMarketing = Vaga::where('idArea', 2)->count();
        $totalVagaGestao = Vaga::where('idArea', 3)->count();
        $totalVagaEngenharia = Vaga::where('idArea', 14)->count();
        $totalVagaAdministracao = Vaga::where('idArea', 5)->count();
        $totalVagaGastronomia = Vaga::where('idArea', 4)->count();
        $totalVagaMedicina = Vaga::where('idArea', 6)->count();
        $totalVagaEducacao = Vaga::where('idArea', 7)->count();
        $totalVagaFinanca = Vaga::where('idArea', 8)->count();
        $totalVagaRh = Vaga::where('idArea', 9)->count();
        $totalVagaLogistica = Vaga::where('idArea', 10)->count();
        $totalVagaAlimentacao = Vaga::where('idArea', 11)->count();
        $totalVagaMeioAmbiente = Vaga::where('idArea', 15)->count();
        $totalVagaServiçosGerais = Vaga::where('idArea', 12)->count();
        $totalVagaHigienizacao = Vaga::where('idArea', 13)->count();
        $totalRegistrosVaga = DB::table('tb_vaga')->count();

        $totalRegistrosUsuario = DB::table('tb_usuario')->count();
        $totalRegistrosEmpresa = DB::table('tb_empresa')->count();
        $usuarios = Usuario::all();
    
        return view('admin.homeAdmin', [
            'totalUsuariosTecnologia' => $totalUsuariosTecnologia,
            'totalUsuariosAlimentacao' => $totalUsuariosAlimentacao,
            'totalUsuariosGestao' => $totalUsuariosGestao,
            'totalUsuariosEngenharia' => $totalUsuariosEngenharia,
            'totalUsuariosAdministracao' => $totalUsuariosAdministracao,
            'totalUsuariosMarketing' => $totalUsuariosMarketing,
            // 'totalUsuariosSaude' => $totalUsuariosSaude,
            'totalUsuariosEducacao' => $totalUsuariosEducacao,
            'totalUsuariosFinancas' => $totalUsuariosFinancas,
            'totalUsuariosRecursosHumanos' => $totalUsuariosRecursosHumanos,
            'totalUsuariosLogistica' => $totalUsuariosLogistica,
            // 'totalUsuariosDesign' => $totalUsuariosDesign,
            'totalRegistrosVaga' => $totalRegistrosVaga,
            'usuarios' => $usuarios,
            'totalRegistrosUsuario' => $totalRegistrosUsuario,
            'totalRegistrosEmpresa' => $totalRegistrosEmpresa,
            'totalVagaTecnologia' => $totalVagaTecnologia,
            'totalVagaGatronomia' => $totalVagaGastronomia,
            'totalVagaServiçosGerais' => $totalVagaServiçosGerais,
            'totalVagaHigienizacao' => $totalVagaHigienizacao,
            'totalVagaEngenharia' => $totalVagaEngenharia,
            'totalVagaAdministracao' => $totalVagaAdministracao,
            'totalVagaMarketing' => $totalVagaMarketing,
            'totalVagaMedicina' => $totalVagaMedicina,
            'totalVagaEducacao' => $totalVagaEducacao,
            'totalVagaFinanca' => $totalVagaFinanca,
            'totalVagaRh' => $totalVagaRh,
            'totalVagaLogistica' => $totalVagaLogistica,
            'totalVagaAlimentacao' => $totalVagaAlimentacao,
            'totalUsuariosMeioAmbiente' => $totalUsuariosMeioAmbiente,
            'totalVagaGestao' => $totalVagaGestao,
            'totalVagaMeioAmbiente' => $totalVagaMeioAmbiente,
            'totalUsuarioGastronomia' => $totalUsuarioGastronomia,
            'totalUsuariosServicosGerais' => $totalUsuariosServicosGerais,
            'totalUsuarioMedicina' => $totalUsuarioMedicina,
            'totalUsuarioHigienizacao' => $totalUsuarioHigienizacao,
            'statusAtivo' => $statusAtivo,
            'statusBloqueado' => $statusBloqueado
        ]);
    }

    public function aprovar($id, Request $request)
    {
                // Encontra o usuario pelo ID
                $usuario = Usuario::findOrFail($id);
    
                // Atualiza o status da usuario para 2
                $usuario->update(['idStatus' => 1]);
            
                // Verifica se a requisição foi feita via AJAX
                if ($request->ajax()) {
                    return response()->json(['message' => 'Vaga atualizada com sucesso']);
                }
            
                // Redireciona para a lista de usuarios com mensagem de sucesso
                return redirect('/verUsuario')->with('success', 'Vaga atualizada com sucesso.');
        if ($request->ajax()) {
            return response()->json(['message' => 'Usuário desativado com sucesso']);
        }

        return redirect('/verUsuario')->with('success', 'Usuário desativado com sucesso.');
    }
}
