<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Modalidade;
use App\Models\Area;
use Carbon\Carbon;
use Exception;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

        if ($request->has('order') && $request->order == 'status') {
            // Ordena para trazer idStatus = 2 primeiro
            $vagas = Vaga::with('empresa', 'status', 'area', 'modalidade')
                ->orderByRaw("FIELD(idStatus, 2, 1), nomeVaga ASC")
                ->get();
        } else {
            $vagas = Vaga::with('empresa', 'status', 'area', 'modalidade')
                ->orderBy('idStatus', 'asc')
                ->get();
        }

        // Verifica se a requisição espera um json
        if($request->expectsJson()){
            return response()->json($vagas); // Retorna o JSON esperado
        }




        // Caso contrário, retorna a view com as vagas
        return view('admin.vaga.vagaAdmin', [
            'vagas'=>$vagas,
            'usernameAdmin'=>$usernameAdmin,
            'emailAdmin'=>$emailAdmin,
            'nomeAdmin'=>$nomeAdmin,
        ]);
    }

    public function indexApp(Request $request)
    {

        if ($request->has('order') && $request->order == 'status') {
            // Ordena para trazer idStatus = 2 primeiro
            $vagas = Vaga::with('empresa', 'status', 'area', 'modalidade')
                ->orderByRaw("FIELD(idStatus, 2, 1), nomeVaga ASC")
                ->get();
        } else {
            $vagas = Vaga::with('empresa', 'status', 'area', 'modalidade')
                ->orderBy('idStatus', 'asc')
                ->get();
        }
            return response()->json($vagas); 
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $idEmpresa = Auth::guard('empresa')->id(); // Pega o ID da empresa autenticada
        $modalidades = Modalidade::all();
        $areas = Area::all();
        return view('cadastrarVaga', compact('idEmpresa', 'modalidades', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Verificar se a data está no formato 'd/m/Y' e convertê-la para 'Y-m-d'
        try {
            $request->merge([
                'prazoVaga' => Carbon::createFromFormat('d/m/Y', $request->prazoVaga)->format('Y-m-d'),
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['prazoVaga' => 'Formato de data inválido.']);
        }
    
        // Validação
        $request->validate(
            [
                'nomeVaga' => 'required',
                'prazoVaga' => 'required|date_format:Y-m-d|date',
                'salarioVaga' => 'required|numeric', // Certifique-se de que o salário seja um número
                'cidadeVaga' => 'required',
                'estadoVaga' => 'required',
                'beneficiosVaga' => 'required',
                'diferencialVaga' => 'required',
                'idArea' => 'required',
                'idModalidadeVaga' => 'required',
            ],
            [
                'nomeVaga.required' => 'Digite um nome para continuar',
                'prazoVaga.required' => 'Digite um prazo',
                'prazoVaga.date_format' => 'Formato de data errado',
                'prazoVaga.date' => 'Data inválida',
                'salarioVaga.required' => 'Digite um salário',
                'salarioVaga.numeric' => 'O salário deve ser um número', // Mensagem para caso não seja numérico
                'cidadeVaga.required' => 'Digite uma cidade',
                'estadoVaga.required' => 'Digite um estado',
                'beneficiosVaga.required' => 'Digite um benefício',
                'diferencialVaga.required' => 'Digite um diferencial',
                'idArea.required' => 'Digite um id área',
                'idModalidadeVaga.required' => 'Digite uma modalidade',
            ]
        );
    
        // Criar uma nova vaga
        $vaga = new Vaga;
        $vaga->nomeVaga = $request->nomeVaga;
        $vaga->prazoVaga = $request->prazoVaga;
        $vaga->salarioVaga = $request->salarioVaga;
        $vaga->cidadeVaga = $request->cidadeVaga;
        $vaga->descricaoVaga = 'adicionar campo de descricao de vaga';
        $vaga->estadoVaga = $request->estadoVaga;
        $vaga->beneficiosVaga = $request->beneficiosVaga;
        $vaga->diferencialVaga = $request->diferencialVaga;
        $vaga->idEmpresa = Auth::guard('empresa')->id();
        $vaga->idArea = $request->idArea;
        $vaga->idStatus = 3; // Certifique-se de que este status está correto para sua lógica
        $vaga->idModalidadeVaga = $request->idModalidadeVaga;
    
        // Salvar a vaga no banco de dados
        $vaga->save();
    
        return redirect('/empresa/dashboard')->with('success', 'Vaga cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request, $id)
    {


        $vaga = Vaga::where('idVaga', $id)->with(['empresa', 'status', 'modalidade', 'area'])->firstOrFail(); // Retorna 404 se não encontrar


        //return view('admin.vaga.allvagaAdmin', compact('vaga')); // Retorna a view com detalhes

        if($request->expectsJson()){
            return response()->json($vaga, 201);
        }

        return view('admin.vaga.allVagaAdmin', ['vaga'=>$vaga]);
    }

    public function showApp(Request $request, $id){
        $vaga = Vaga::where('idVaga', $id)->with(['empresa', 'status', 'modalidade', 'area'])->firstOrFail(); 

        return response()->json($vaga, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function showVagasPorEmpresa()
     {
        // Verifica se o usuário está autenticado
        if (!Auth::guard('empresa')->check()) {
            return redirect()->route('login'); // Redireciona para a página de login se não estiver autenticado
        }

        $empresaId = Auth::guard('empresa')->id(); // Pega o ID da empresa autenticada


        // Busca todas as vagas cadastradas pela empresa
        $vagas = Vaga::where('idEmpresa', $empresaId)->with('status', 'area', 'modalidade')->get();

        return view('homeEmpresa', compact('vagas')); // Passa a variável $vagas para a view
    }

    public function showVagasEmpresa($idEmpresa)
    {
        $vagaempresa = Vaga::where('idEmpresa', $idEmpresa)
            ->select('idVaga', 'nomeVaga', 'cidadeVaga', 'estadoVaga', 'salarioVaga')
            ->get();
    
        return response()->json($vagaempresa, 200);
    }
    

    public function edit($id)
    {

        $idEmpresa = Auth::guard('empresa')->id();
        $modalidades = Modalidade::all();
        $areas = Area::all();
        $vaga = Vaga::findOrFail($id); // Encontra o usuário pelo ID ou lança um erro 404
        return view('admin.vaga.vagaEditarAdmin', compact('vaga', 'idEmpresa', 'modalidades', 'areas')); // Passa o usuário para a view

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
        $vaga = Vaga::where('idVaga', $id)->get()->first();

        DB::table('tb_vaga')
            ->where('idVaga', $id)
            ->update([
                'nomeVaga' => $request->nomeVaga,
                'estadoVaga' => $request->estadoVaga,
                'prazoVaga' => $request->prazoVaga,
                'idModalidadeVaga' => $request->idModalidadeVaga,
                'salarioVaga' => $request->salarioVaga,
                'cidadeVaga' => $request->cidadeVaga,
                'estadoVaga' => $request->estadoVaga,
                'estadoVaga' => $request->estadoVaga,

            ]);

        if ($request->ajax()) {
            return response()->json(['message' => 'Vaga atualizado com sucesso']); // Retorna JSON se for uma requisição AJAX
        }

        // Caso contrário, retorna a view com os usuários

        $vaga = Vaga::findOrFail($id);
        $vaga->update($request->all());

        // Redirecionar para a lista de usuários
        return redirect('/empresa/dashboard')->with('success', 'Vaga atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        // Encontra a vaga pelo ID
        $vaga = Vaga::findOrFail($id);

        // Atualiza o status da vaga para 2
        $vaga->update(['idStatus' => 2]);

        // Verifica se a requisição foi feita via AJAX
        if ($request->ajax()) {
            return response()->json(['message' => 'Vaga atualizada com sucesso']);
        }

        // Redireciona para a lista de vagas com mensagem de sucesso
        return redirect('/admin/vaga/listar')->with('success', 'Vaga atualizada com sucesso.');
    }

    public function aprovar($id, Request $request)
    {
        // Encontra a vaga pelo ID
        $vaga = Vaga::findOrFail($id);

        // Atualiza o status da vaga para 2
        $vaga->update(['idStatus' => 1]);

        // Verifica se a requisição foi feita via AJAX
        if ($request->ajax()) {
            return response()->json(['message' => 'Vaga atualizada com sucesso']);
        }

        // Redireciona para a lista de vagas com mensagem de sucesso
        return redirect('/admin/vaga/listar')->with('success', 'Vaga atualizada com sucesso.');
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('search');

            if ($query) {
                $vagas = DB::table('tb_vaga')
                    ->leftJoin('tb_empresa', 'tb_vaga.idEmpresa', '=', 'tb_empresa.idEmpresa')
                    ->select('tb_vaga.*')
                    ->where('tb_vaga.nomeVaga', 'LIKE', "%{$query}%")
                    ->orWhere('tb_empresa.nomeEmpresa', 'LIKE', "%{$query}%")
                    ->orWhere('tb_empresa.usernameEmpresa', 'LIKE', "%{$query}%")
                    ->get();

                $empresas = DB::table('tb_empresa')
                    ->select('tb_empresa.idEmpresa', 'tb_empresa.nomeEmpresa', 'tb_empresa.usernameEmpresa', 'tb_empresa.estadoEmpresa')
                    ->where('tb_empresa.nomeEmpresa', 'LIKE', "%{$query}%")
                    ->orWhere('tb_empresa.usernameEmpresa', 'LIKE', "%{$query}%")
                    ->get();

                if ($vagas->isEmpty() && $empresas->isNotEmpty()) {
                    return response()->json($empresas);
                }

                if ($vagas->isEmpty() && $empresas->isEmpty()) {
                    return response()->json(['message' => 'Não foi possivel encontrar nenhuma vaga ou empresa.'], 400);
                }

                return response()->json(['empresas' => $empresas, 'vagas' => $vagas]);
            }

            return response()->json(['message' => 'A busca não pode estar vazia'], 400);

        } catch (Exception $exception) {
            return response()->json(['message' => 'Erro ao realizar a busca', 'error' => $exception->getMessage()], 500);
        }
    }

    public function verVagaPorArea($nomeArea){
        // Debugging para verificar o valor de nomeArea

        
        $areaVaga = Vaga::join('tb_area', 'tb_vaga.idArea', '=', 'tb_area.idArea')
            ->where('tb_area.nomeArea', $nomeArea)
            ->select('tb_vaga.idVaga', 'tb_vaga.nomeVaga', 'tb_vaga.cidadeVaga', 'tb_vaga.salarioVaga', 'tb_vaga.idEmpresa', 'tb_vaga.prazoVaga', 'tb_vaga.idModalidadeVaga', 'tb_vaga.idArea')
            ->with('empresa', 'status', 'modalidade', 'area')
            ->get();
    
    
        return response()->json($areaVaga, 200);
    }

    public function verOutrasVagas($nomeArea){
        // Debugging para verificar o valor de nomeArea

        
        $areaVaga = Vaga::join('tb_area', 'tb_vaga.idArea', '=', 'tb_area.idArea')
            ->where('tb_area.nomeArea', '!=', $nomeArea)
            ->select('tb_vaga.idVaga', 'tb_vaga.nomeVaga', 'tb_vaga.cidadeVaga', 'tb_vaga.salarioVaga', 'tb_vaga.idEmpresa', 'tb_vaga.prazoVaga', 'tb_vaga.idModalidadeVaga', 'tb_vaga.idArea')
            ->with('empresa', 'status', 'modalidade', 'area')
            ->get();
    
    
        return response()->json($areaVaga, 200);
    }
    

    /*
    public function verVagaPorArea(Request $request){
        // try {

        // }catch{
            
        // }
    }
    */

}
