<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AreaInteresseUsuario;
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

    public function dashboard()
    {
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

        $totalRegistrosUsuario =  Usuario::where('idStatus', 1)->count();
        $totalRegistrosEmpresa = DB::table('tb_empresa')->count();
        $usuarios = Usuario::where('idStatus', 1)->get();
    
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
            'statusBloqueado' => $statusBloqueado,
            'usernameAdmin'=>$usernameAdmin,
            'emailAdmin'=>$emailAdmin,
            'nomeAdmin'=>$nomeAdmin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('Accessing cadastrarAdmin view');
        $idAdmin = Auth::guard('admin')->id();
        return view('cadastrarAdmin');
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
                'nomeAdmin'  => 'required',
                'usernameAdmin' => 'required|',
                'emailAdmin' => 'required',
                'contatoAdmin' => 'required',
                'senhaAdmin' => 'required', 

            ],
            [
                'nomeAdmin.required'  => 'Digite um nome',
                'usernameAdmin.required' => 'Digite um apelido',
                'emailAdmin.required' => 'Digite um email',
                'contatoAdmin.required' => 'Digite um contato',
                'senhaAdmin.required' => 'Digite uma senha',
            ]
        );
        $admin = new Admin;

        $admin->nomeAdmin = $request->nomeAdmin;
        $admin->usernameAdmin = $request->usernameAdmin;
        $admin->emailAdmin = $request->emailAdmin;
        $admin->contatoAdmin = $request->contatoAdmin;
        $admin->senhaAdmin = Hash::make($request->senhaAdmin);
        $admin->fotoAdmin = $request->fotoAdmin;
        $admin->idStatus = 1;

        $admin->save();
        
        return view('admin.homeAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::where('idAdmin', $id)->get();

        return $admin;
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
