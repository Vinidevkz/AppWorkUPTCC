<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Vaga;
use App\Models\AreaInteresseUsuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Método para retornar todos os usuários
    public function index()
    {

            $usuarios = Usuario::all(); // Recupera todos os usuários

            if (Auth::guard('admin')->check()) {
                $idAdmin = Auth::guard('admin')->id();
                $admin = Admin::select('usernameAdmin', 'emailAdmin', 'nomeAdmin')->where('idAdmin', $idAdmin)->first();
                
                $nomeAdmin = $admin->nomeAdmin;
                $usernameAdmin = $admin->usernameAdmin;
                $emailAdmin = $admin->emailAdmin;
                
            } else {
                // Redirecionar ou mostrar uma mensagem de erro
                return redirect()->route('login')->withErrors('Você precisa estar logado como admin.');
            }


            
            return view('admin.usuario.usuarioAdmin',[
            'usuarios'=>$usuarios,
            'usernameAdmin'=>$usernameAdmin,
            'emailAdmin'=>$emailAdmin,
            'nomeAdmin'=>$nomeAdmin
        ]);

    }

    public function indexApp()
    {

            return response()->json(['message' => 'Erro ao recuperar usuários.'], 500);
        
    }

    public function show(Request $request, $id)
    {
        $usuario = Usuario::where('idUsuario', $id)->with('areas')->firstOrFail(); // Retorna 404 se não encontrar
        

        return view('admin.usuario.allUsuarioAdmin', ['usuario'=>$usuario]);
    }

    public function showApp(Request $request, $id)
    {
        $usuario = Usuario::where('idUsuario', $id)->with('areas')->firstOrFail(); // Retorna 404 se não encontrar
        

        return response()->json($usuario, 201);

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
                'emailContato' => 'required|string|max:50',
                'areaInteresseUsuario' => 'required|string|max:100',
                'linguaUsuario' => 'nullable|string|max:20',
                'ensinoMedio' => 'nullable|string|max:50',
                'anoFormacao' => 'nullable|int',
                'fotoUsuario' => 'nullable|string|max:300',
                'fotoBanner' => 'nullable|string|max:300',
                'cidadeUsuario' => 'required|string|max:40',
                'estadoUsuario' => 'required|string|max:40',
                'logradouroUsuario' => 'required|string|max:40',
                'cepUsuario' => 'required|string|max:40',
                'numeroLograUsuario' => 'required|string|max:40',
                'sobreUsuario' => 'required|string|max:200',
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
                'senhaUsuario' => $request->senhaUsuario,
                'contatoUsuario' => $request->contatoUsuario,
                'emailContato' => $request->emailContato,
                'areaInteresseUsuario' => $request->areaInteresseUsuario,
                'linguaUsuario' => $request->linguaUsuario,
                'ensinoMedio' => $request->ensinoMedio,
                'anoFormacao' => $request->anoFormacao,
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
            Log::info("Valor de emailContato no request: " . $request->emailContato);
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
            'nomeUsuario' => 'sometimes|required|string|max:50',
            'usernameUsuario' => 'sometimes|required|string|max:50',
            'contatoUsuario' => 'sometimes|required|string|max:50',
            'sobreUsuario' => 'sometimes|required|string|max:200',
            'areaInteresseUsuario' => 'sometimes|required|string|max:100'
            
        ]);

        // Atualiza os campos que foram passados
        $usuario->update($request->only([
            'nomeUsuario', 
            'usernameUsuario', 
            'contatoUsuario', 
            'sobreUsuario',
            'areaInteresseUsuario'
        ]));

            return response()->json(['message' => 'Usuário atualizado com sucesso']);
    }

    public function updateApp(Request $request, $id) {
        $usuario = Usuario::findOrFail($id);
    
        // Validação dos dados recebidos
        $request->validate([
            'nomeUsuario' => 'sometimes|required|string|max:50',
            'usernameUsuario' => 'sometimes|required|string|max:50',
            'sobreUsuario' => 'sometimes|required|string|max:300',
            'nascUsuario' => 'sometimes|required|string|max:50',
            'areaInteresseUsuario' => 'sometimes|required|string|max:40',
            'formacaoCompetenciaUsuario' => 'sometimes|required|string|max:50',
            'contatoUsuario' => 'sometimes|required|string|max:50',
            'fotoUsuario' => 'sometimes|nullable|string|max:300',
            'fotoBanner' => 'sometimes|nullable|string|max:300',
        ]);
    
        // Coletar os dados para atualização, excluindo fotoUsuario e fotoBanner se forem null
        $data = $request->only([
            'nomeUsuario', 
            'usernameUsuario',
            'sobreUsuario',
            'nascUsuario',
            'areaInteresseUsuario',
            'formacaoCompetenciaUsuario',
            'contatoUsuario'
        ]);
    
        // Verifica se 'fotoUsuario' foi enviado e não é null
        if ($request->has('fotoUsuario') && $request->fotoUsuario !== null) {
            $data['fotoUsuario'] = $request->fotoUsuario;
        }
    
        // Verifica se 'fotoBanner' foi enviado e não é null
        if ($request->has('fotoBanner') && $request->fotoBanner !== null) {
            $data['fotoBanner'] = $request->fotoBanner;
        }
    
        // Atualiza os campos que foram passados
        $usuario->update($data);
    
        return response()->json(['message' => 'Usuário atualizado com sucesso']);
    }
    
    

    public function destroy($id, Request $request)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update(['idStatus' => 2]);

        if ($request->ajax()) {
            return response()->json(['message' => 'Usuário desativado com sucesso']);
        }

        return redirect('/admin/usuario/listar')->with('success', 'Usuário desativado com sucesso.');
    }

    public function login(Request $request)
    {
        // Procura o usuário no banco de dados
        $usuario = Usuario::where('emailUsuario', '=', $request->input('emailUsuario'))
            ->orWhere('usernameUsuario', $request->input('emailUsuario'))
            ->first();

        if ($usuario && Hash::check($request->input('senhaUsuario'), $usuario->senhaUsuario)) {
            return response()->json($usuario);
        }

        return response()->json(['message' => 'Credenciais inválidas'], 401);
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
                return redirect('/admin/usuario/listar')->with('success', 'Vaga atualizada com sucesso.');
        if ($request->ajax()) {
            return response()->json(['message' => 'Usuário desativado com sucesso']);
        }

        return redirect('/admin/usuario/listar')->with('success', 'Usuário desativado com sucesso.');
    }

    public function edit($id)
{
    // Recupera o usuário pelo ID ou lança um erro 404 se não encontrar
    $usuario = Usuario::findOrFail($id);

    // Adiciona outras informações que deseja passar para a view, como áreas de interesse, se necessário
    $areasInteresse = AreaInteresseUsuario::all();

    // Retorna a view de edição com os dados do usuário
    return view('admin.usuario.usuarioEditarAdmin', compact('usuario', 'areasInteresse'));
}

}
