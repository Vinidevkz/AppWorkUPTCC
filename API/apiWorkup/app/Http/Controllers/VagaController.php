<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Modalidade;
use App\Models\Area;
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
        /*
        |----------------------------------------------------------------------
        | Definindo para além de pegar informações de vaga pegar também de empresa
        |----------------------------------------------------------------------
        */

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

        // Verifica se a requisição é AJAX

        // return response()->json($vagas); // Retorna JSON se for uma requisição AJAX


        // Caso contrário, retorna a view com as vagas
        return view('admin.vaga.vagaAdmin', compact('vagas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $idEmpresa = Auth::guard('empresas')->id(); // Pega o ID da empresa autenticada
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

        /*
|--------------------------------------------------------------------------
|Validação
|--------------------------------------------------------------------------
*/

        $request->validate(
            [
                'nomeVaga'  => 'required',
                'prazoVaga' => 'required',
                'salarioVaga' => 'required',
                'cidadeVaga' => 'required',
                'estadoVaga' => 'required',
                'beneficiosVaga' => 'required',
                'diferencialVaga' => 'required',
                'idArea' => 'required',
                'idModalidadeVaga' => 'required',
            ],
            [
                'nomeVaga.required'  => 'Digite um nome para continuar',
                'prazoVaga.required' => 'Digite um prazo',
                'salarioVaga.required' => 'Digite um salario',
                'cidadeVaga.required' => 'Digite uma cidade',
                'estadoVaga.required' => 'Digite um estado',
                'beneficiosVaga.required' => 'Digite um beneficio',
                'diferencialVaga.required' => 'Digite um diferencal',
                'idArea.required' => 'Digite um id vaga',
                'idModalidadeVaga.required' => 'Digite uma modalidade',
            ]
        );

        $vaga = new Vaga;

        $vaga->nomeVaga = $request->nomeVaga;
        $vaga->prazoVaga = $request->prazoVaga;
        $vaga->salarioVaga = $request->salarioVaga;
        $vaga->cidadeVaga = $request->cidadeVaga;
        $vaga->estadoVaga = $request->estadoVaga;
        $vaga->beneficiosVaga = $request->beneficiosVaga;
        $vaga->diferencialVaga = $request->diferencialVaga;
        $vaga->idEmpresa = Auth::guard('empresas')->id();
        $vaga->idArea = $request->idArea;
        $vaga->idStatus = 3;
        $vaga->idModalidadeVaga = $request->idModalidadeVaga;

        $vaga->save();

        return view('/homeEmpresa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $vaga = Vaga::where('idVaga', $id)->with(['empresa', 'status', 'modalidade', 'area'])->firstOrFail(); // Retorna 404 se não encontrar


        return view('admin.vaga.allvagaAdmin', compact('vaga')); // Retorna a view com detalhes

        //return response()->json($vaga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $idEmpresa = Auth::guard('empresas')->id();
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
        return redirect('/verVaga')->with('success', 'Vaga atualizado com sucesso.');
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
        return redirect('/verVaga')->with('success', 'Vaga atualizada com sucesso.');
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
        return redirect('/verVaga')->with('success', 'Vaga atualizada com sucesso.');
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
                    ->select('tb_empresa.nomeEmpresa', 'tb_empresa.usernameEmpresa')
                    ->where('tb_empresa.nomeEmpresa', 'LIKE', "%{$query}%")
                    ->orWhere('tb_empresa.usernameEmpresa', 'LIKE', "%{$query}%")
                    ->get();

                if ($vagas->isEmpty() && $empresas->isNotEmpty()) {
                    return response()->json($empresas, 200);
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
}
