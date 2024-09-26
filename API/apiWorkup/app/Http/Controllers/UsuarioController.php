<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Usuario;
use App\Models\AreaInteresseUsuario;
use App\Models\Vaga;
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
    public function index(Request $request)
    {

        if ($request->has('order') && $request->order == 'status') {
            // Ordena para trazer idStatus = 2 primeiro
            $usuarios = Usuario::with('status')->orderByRaw("FIELD(idStatus, 2, 1), nomeUsuario ASC")->get();
        } else {
            // Caso contrário, traz os Usuario normalmente (com idStatus = 1 primeiro)
            $usuarios = Usuario::with('status')->orderBy('idStatus', 'asc')->get();
        }

        if ($request->ajax()) {
            return response()->json($usuarios); // Retorna JSON se for uma requisição AJAX
        }

        // Caso contrário, retorna a view com os usuários
        return view('admin.usuario.usuarioAdmin', compact('usuarios'));
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

        $request->validate(
            [
                'nomeUsuario' => 'required|string|max:40',
                'usernameUsuario' => 'required|string|max:40',
                'nascUsuario' => 'required|date',
                'emailUsuario' => 'required|email',
                'senhaUsuario' => 'required|min:8',
                'contatoUsuario' => 'required|string|max:20',
                'fotoUsuario' => 'required',
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

            ]
        );

        $usuario = new Usuario;

        $usuario->nomeUsuario = $request->nomeUsuario;
        $usuario->usernameUsuario = $request->usernameUsuario;
        $usuario->nascUsuario = $request->nascUsuario;
        $usuario->emailUsuario = $request->emailUsuario;
        $usuario->senhaUsuario = $request->senhaUsuario;
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
        $usuario->idStatus = 3;

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
        $usuario = Usuario::where('idUsuario', $id)->with('areas')->firstOrFail(); // Retorna 404 se não encontrar

        return view('admin.usuario.allusuarioAdmin', compact('usuario')); // Retorna a view com detalhes
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id); // Encontra o usuário pelo ID ou lança um erro 404
        return view('admin.usuario.usuarioEditarAdmin', compact('usuario')); // Passa o usuário para a view
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
                'nomeUsuario' => $request->nomeUsuario,
                'usernameUsuario' => $request->usernameUsuario,
                'nascUsuario' => $request->nascUsuario,
                //'emailUsuario' => $request->emailUsuario,
                //'senhaUsuario' => $request->senhaUsuario,
                'contatoUsuario' => $request->contatoUsuario,
                //'fotoUsuario' => $request->fotoUsuario,
                //'cidadeUsuario' => $request->cidadeUsuario,
                //'estadoUsuario' => $request->estadoUsuario,
                //'logradouroUsuario' => $request->logradouroUsuario,
                //'cepUsuario' => $request->cepUsuario,
                //'numeroLograUsuario' => $request->numeroLograUsuario,
                'sobreUsuario' => $request->sobreUsuario,
                // 'formacaoCompetenciaUsuario' => $request->formacaoCompetenciaUsuario,
                //'dataFormacaoCompetenciaUsuario' => $request->dataFormacaoCompetenciaUsuario
            ]);

        if ($request->ajax()) {
            return response()->json(['message' => 'Usuario atualizado com sucesso']); // Retorna JSON se for uma requisição AJAX
        }

        // Caso contrário, retorna a view com os usuários

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
    
        // Redirecionar para a lista de usuários
        return redirect('/verUsuario')->with('success', 'Usuário atualizado com sucesso.');
    
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
                $usuario = Usuario::findOrFail($id);
    
                // Atualiza o status da usuario para 2
                $usuario->update(['idStatus' => 2]);
            
                // Verifica se a requisição foi feita via AJAX
                if ($request->ajax()) {
                    return response()->json(['message' => 'Vaga atualizada com sucesso']);
                }
            
                // Redireciona para a lista de usuarios com mensagem de sucesso
                return redirect('/verUsuario')->with('success', 'Vaga atualizada com sucesso.');
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


    // CONTRROLLER PARA AS TELAS DE ADMIN
    public function dashboard()
    {
        $totalUsuariosTecnologia = Usuario::where('areaInteresseUsuario', 'Tecnologia')->count();
        $totalUsuariosAlimentacao = Usuario::where('areaInteresseUsuario', 'Alimentação')->count();
        $totalUsuariosGestao = Usuario::where('areaInteresseUsuario', 'Gestão')->count();
        $totalUsuarioGastronomia = Usuario::where('areaInteresseUsuario', 'Gastronomia')->count();
        $totalUsuariosEngenharia = Usuario::where('areaInteresseUsuario', 'Engenharia')->count();
        $totalUsuariosAdministracao = Usuario::where('areaInteresseUsuario', 'Administração')->count();
        $totalUsuariosMarketing = Usuario::where('areaInteresseUsuario', 'Marketing')->count();
        $totalUsuariosEducacao = Usuario::where('areaInteresseUsuario', 'Educação')->count();
        $totalUsuariosFinancas = Usuario::where('areaInteresseUsuario', 'Finanças')->count();
        $totalUsuariosRecursosHumanos = Usuario::where('areaInteresseUsuario', 'Recursos Humanos')->count();
        $totalUsuariosLogistica = Usuario::where('areaInteresseUsuario', 'Logística')->count();
        $totalUsuariosServicosGerais = Usuario::where('areaInteresseUsuario', 'Serviços Gerais')->count();
        $totalUsuariosMeioAmbiente = Usuario::where('areaInteresseUsuario', 'Meio Ambiente')->count();
        $totalUsuarioMedicina = Usuario::where('areaInteresseUsuario', 'Medicina')->count();
        $totalUsuarioHigienizacao = Usuario::where('areaInteresseUsuario', 'Higienização')->count();  


        $totalVagaTecnologia = Vaga::where('idAreaVaga', 1)->count();
        $totalVagaMarketing = Vaga::where('idAreaVaga', 2)->count();
        $totalVagaGestao = Vaga::where('idAreaVaga', 3)->count();
        $totalVagaEngenharia = Vaga::where('idAreaVaga', 14)->count();
        $totalVagaAdministracao = Vaga::where('idAreaVaga', 5)->count();
        $totalVagaGastronomia = Vaga::where('idAreaVaga', 4)->count();
        $totalVagaMedicina = Vaga::where('idAreaVaga', 6)->count();
        $totalVagaEducacao = Vaga::where('idAreaVaga', 7)->count();
        $totalVagaFinanca = Vaga::where('idAreaVaga', 8)->count();
        $totalVagaRh = Vaga::where('idAreaVaga', 9)->count();
        $totalVagaLogistica = Vaga::where('idAreaVaga', 10)->count();
        $totalVagaAlimentacao = Vaga::where('idAreaVaga', 11)->count();
        $totalVagaMeioAmbiente = Vaga::where('idAreaVaga', 15)->count();
        $totalVagaServiçosGerais = Vaga::where('idAreaVaga', 12)->count();
        $totalVagaHigienizacao = Vaga::where('idAreaVaga', 13)->count();
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
            'totalUsuarioHigienizacao' => $totalUsuarioHigienizacao
        ]);
    }};

