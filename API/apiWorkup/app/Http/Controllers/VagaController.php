<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
|--------------------------------------------------------------------------
|Definindo para alem de pegar informaçoes de vaga pegar tbm de empresa
|--------------------------------------------------------------------------
*/
if ($request->has('order') && $request->order == 'status') {
    // Ordena para trazer idStatus = 2 primeiro
    $vagas = Vaga::with('empresa', 'status', 'area', 'modalidade')->orderByRaw("FIELD(idStatus, 2, 1), nomeVaga ASC")->get();
} else {
    $vagas = Vaga::with('empresa', 'status', 'area', 'modalidade')->orderBy('idStatus', 'asc')->get();
}

if ($request->ajax()) {
    return response()->json($vagas); // Retorna JSON se for uma requisição AJAX
}

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
        return view('cadastrarVaga');
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
                'idEmpresa' => 'required',
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
                'idEmpresa.required' => 'Digite o id da empresa',
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
        $vaga->idEmpresa = $request->idEmpresa;
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaga = Vaga::findOrFail($id); // Encontra o usuário pelo ID ou lança um erro 404
        return view('admin.vaga.vagaEditarAdmin', compact('vaga')); // Passa o usuário para a view

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
                'idModalidadeVaga' => $request->idModalidadeVaga,
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
}
