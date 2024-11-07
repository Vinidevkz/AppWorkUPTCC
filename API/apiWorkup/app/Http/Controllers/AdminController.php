<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AreaInteresseUsuario;
use App\Models\Empresa;
use App\Models\Usuario;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();

        return $admin;
    }

    protected function calcularEstatisticas()
    {
        
        // Adicione outras contagens necessárias aqui
        $totalDenuncias = DB::table('tb_denunciausuario')->count();
        $totalDenunciasEmpresa = DB::table('tb_denunciaempresa')->count();
        $totalDenunciasVagas = DB::table('tb_denunciavaga')->count();
        
        // Calcula o total de denúncias
        $totalDenunciasGeral = $totalDenuncias +
                               $totalDenunciasEmpresa +
                               $totalDenunciasVagas;

        // Iteresses de usuarios                       
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
        
        $totalRegistrosUsuario =  Usuario::where('idStatus', 1)->count();
        $totalRegistrosEmpresa = DB::table('tb_empresa')->count();
        
        // STATUS
        $statusAtivo = Usuario::where('idStatus', 1)->count();
        $statusBloqueado = Usuario::where('idStatus', 2)->count();
        
        return [
            'totalDenuncias' => $totalDenuncias,
            'totalDenunciasGeral' => $totalDenunciasGeral,
            'totalDenunciasVagas' => $totalDenunciasVagas,
            'totalDenunciasEmpresa' => $totalDenunciasEmpresa,
            'totalUsuariosTecnologia' => $totalUsuariosTecnologia,
            'totalUsuariosAlimentacao' => $totalUsuariosAlimentacao,
            'totalUsuariosGestao' => $totalUsuariosGestao,
            'totalUsuariosEngenharia' => $totalUsuariosEngenharia,
            'totalUsuariosAdministracao' => $totalUsuariosAdministracao,
            'totalUsuariosMarketing' => $totalUsuariosMarketing,
            'totalUsuariosEducacao' => $totalUsuariosEducacao,
            'totalUsuariosFinancas' => $totalUsuariosFinancas,
            'totalUsuariosRecursosHumanos' => $totalUsuariosRecursosHumanos,
            'totalUsuariosLogistica' => $totalUsuariosLogistica,
            'totalUsuariosMeioAmbiente' => $totalUsuariosMeioAmbiente,
            'totalUsuarioGastronomia' => $totalUsuarioGastronomia,
            'totalUsuariosServicosGerais' => $totalUsuariosServicosGerais,
            'totalUsuarioMedicina' => $totalUsuarioMedicina,
            'totalUsuarioHigienizacao' => $totalUsuarioHigienizacao,
            'totalRegistrosVaga' => $totalRegistrosVaga,
            'totalRegistrosUsuario' => $totalRegistrosUsuario,
            'totalRegistrosEmpresa' => $totalRegistrosEmpresa,
            'totalVagaTecnologia' => $totalVagaTecnologia,
            'totalVagaGastronomia' => $totalVagaGastronomia,
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
            'totalVagaGestao' => $totalVagaGestao,
            'totalVagaMeioAmbiente' => $totalVagaMeioAmbiente,
            'statusAtivo' => $statusAtivo,
            'statusBloqueado' => $statusBloqueado,
        ];
    }
    


    public function dashboard()
    {
        if (Auth::guard('admin')->check()) {
            $idAdmin = Auth::guard('admin')->id();
            $admin = Admin::select('*')->where('idAdmin', $idAdmin)->first();
            
            $nomeAdmin = $admin->nomeAdmin;
            $usernameAdmin = $admin->usernameAdmin;
            $emailAdmin = $admin->emailAdmin;
            $fotoAdmin = $admin->fotoAdmin;
            
        } else {
            // Redirecionar ou mostrar uma mensagem de erro
            return redirect()->route('login')->withErrors('Você precisa estar logado como admin.');
        }
        
$estatisticas = $this->calcularEstatisticas();

        $usuarios = Usuario::where('idStatus', 1)->get();
        
        return view('admin.Homeadmin', [
            'totalDenunciasGeral' => $estatisticas['totalDenunciasGeral'],
            'totalDenunciasVagas' => $estatisticas['totalDenunciasVagas'],
            'totalDenunciasEmpresa' => $estatisticas['totalDenunciasEmpresa'],
            'totalDenuncias' => $estatisticas['totalDenuncias'],
            'totalUsuariosTecnologia' => $estatisticas['totalUsuariosTecnologia'],
            'totalUsuariosAlimentacao' => $estatisticas['totalUsuariosAlimentacao'],
            'totalUsuariosGestao' => $estatisticas['totalUsuariosGestao'],
            'totalUsuariosEngenharia' => $estatisticas['totalUsuariosEngenharia'],
            'totalUsuariosAdministracao' => $estatisticas['totalUsuariosAdministracao'],
            'totalUsuariosMarketing' => $estatisticas['totalUsuariosMarketing'],
            'totalUsuariosEducacao' => $estatisticas['totalUsuariosEducacao'],
            'totalUsuariosFinancas' => $estatisticas['totalUsuariosFinancas'],
            'totalUsuariosRecursosHumanos' => $estatisticas['totalUsuariosRecursosHumanos'],
            'totalUsuariosLogistica' => $estatisticas['totalUsuariosLogistica'],
            'totalUsuariosMeioAmbiente' => $estatisticas['totalUsuariosMeioAmbiente'],
            'totalUsuarioGastronomia' => $estatisticas['totalUsuarioGastronomia'],
            'totalUsuariosServicosGerais' => $estatisticas['totalUsuariosServicosGerais'],
            'totalUsuarioMedicina' => $estatisticas['totalUsuarioMedicina'],
            'totalUsuarioHigienizacao' => $estatisticas['totalUsuarioHigienizacao'],
            'totalRegistrosVaga' => $estatisticas['totalRegistrosVaga'],
            'totalRegistrosUsuario' => $estatisticas['totalRegistrosUsuario'],
            'totalRegistrosEmpresa' => $estatisticas['totalRegistrosEmpresa'],
            'totalVagaTecnologia' => $estatisticas['totalVagaTecnologia'],
            'totalVagaGastronomia' => $estatisticas['totalVagaGastronomia'],
            'totalVagaServiçosGerais' => $estatisticas['totalVagaServiçosGerais'],
            'totalVagaHigienizacao' => $estatisticas['totalVagaHigienizacao'],
            'totalVagaEngenharia' => $estatisticas['totalVagaEngenharia'],
            'totalVagaAdministracao' => $estatisticas['totalVagaAdministracao'],
            'totalVagaMarketing' => $estatisticas['totalVagaMarketing'],
            'totalVagaMedicina' => $estatisticas['totalVagaMedicina'],
            'totalVagaEducacao' => $estatisticas['totalVagaEducacao'],
            'totalVagaFinanca' => $estatisticas['totalVagaFinanca'],
            'totalVagaRh' => $estatisticas['totalVagaRh'],
            'totalVagaLogistica' => $estatisticas['totalVagaLogistica'],
            'totalVagaAlimentacao' => $estatisticas['totalVagaAlimentacao'],
            'totalVagaGestao' => $estatisticas['totalVagaGestao'],
            'totalVagaMeioAmbiente' => $estatisticas['totalVagaMeioAmbiente'],
            'statusAtivo' => $estatisticas['statusAtivo'],
            'statusBloqueado' => $estatisticas['statusBloqueado'],
            'usernameAdmin'=>$usernameAdmin,
            'emailAdmin'=>$emailAdmin,
            'usuarios' => $usuarios,
            'nomeAdmin'=>$nomeAdmin,
            'fotoAdmin'=>$fotoAdmin,
        ]);
    }
    

    public function create()
    {
        Log::info('Accessing cadastrarAdmin view');
        $idAdmin = Auth::guard('admin')->id();
        return view('cadastrarAdmin');
    }

    public function store(Request $request)
{
    // Validação
    $request->validate(
        [
            'nomeAdmin' => 'required',
            'usernameAdmin' => 'required|unique:tb_admin,usernameAdmin',
            'emailAdmin' => 'required|email|unique:tb_admin,emailAdmin',
            'contatoAdmin' => 'required',
            'senhaAdmin' => 'required',
        ],
        [
            'nomeAdmin.required' => 'Digite um nome!',
            'usernameAdmin.required' => 'Digite um apelido!',
            'emailAdmin.required' => 'Digite um email!',
            'emailAdmin.unique' => 'Este apelido já está registrado!',
            'usernameAdmin.unique' => 'Este e-mail já está registrado!',
            'contatoAdmin.required' => 'Digite um contato!',
            'senhaAdmin.required' => 'Digite uma senha!',
        ]
    );

    // Criação do administrador
    $admin = new Admin;
    $admin->nomeAdmin = $request->nomeAdmin;
    $admin->usernameAdmin = $request->usernameAdmin;
    $admin->emailAdmin = $request->emailAdmin;
    $admin->contatoAdmin = $request->contatoAdmin;
    $admin->senhaAdmin = Hash::make($request->senhaAdmin);
    $admin->idStatus = 1;

    // Verifica se há um arquivo de imagem
    if ($request->hasFile('fotoAdmin') && $request->file('fotoAdmin')->isValid()) {
        // Trata a imagem se estiver presente
        $requestImage = $request->fotoAdmin;
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('assets/img/perfil/admin'), $imageName);

        // Salva o nome da imagem no campo fotoAdmin
        $admin->fotoAdmin = $imageName;
    } else {
        // Se não houver imagem, define uma imagem padrão ou deixa como null
        $admin->fotoAdmin = null;  // Ou defina um valor padrão, como 'default.png'
    }

    // Salva os dados no banco
    $admin->save();

    // Retorna com uma mensagem de sucesso
    return redirect()->route('admin.dashboard')->with('success', 'Admin cadastrado com sucesso!');
}


    public function show($id)
    {
        $admin = Admin::where('idAdmin', $id)->get();

        return $admin;
    }


    // AdminController
    public function showEmpresa($id)
    {
        $empresa = Empresa::with('areas')->findOrFail($id);
    return view('admin.empresa.allempresaAdmin', compact('empresa'));
    }
    


    public function edit($id)
    {
        // 
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
