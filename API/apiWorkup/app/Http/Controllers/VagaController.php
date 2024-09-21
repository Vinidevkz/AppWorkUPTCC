<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
|--------------------------------------------------------------------------
|Definindo para alem de pegar informaçoes de vaga pegar tbm de empresa
|--------------------------------------------------------------------------
*/
        $vagas = Vaga::with('empresa')->get();

        return response()->json($vagas);
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
                'dataPublicacaoVaga' => 'required|',
                'prazoVaga' => 'required',
                'modalidadeVaga' => 'required',
                'salarioVaga' => 'required',
                'cidadeVaga' => 'required',
                'estadoVaga' => 'required',
                'areaVaga' => 'required',
                'beneficiosVaga' => 'required',
                'diferencialVaga' => 'required',
                'idEmpresa' => 'required',
                'idStatusVaga' => 'required',
            ],
            [
                'nomeVaga.required'  => 'Digite um nome para continuar',
                'dataPublicacaoVaga.required' => 'Digite uma data',
                'prazoVaga.required' => 'Digite um prazo',
                'modalidadeVaga.required' => 'Digite uma modalidade',
                'salarioVaga.required' => 'Digite um salario',
                'cidadeVaga.required' => 'Digite uma cidade',
                'estadoVaga.required' => 'Digite um estado',
                'areaVaga.required' => 'Digite uma area',
                'beneficiosVaga.required' => 'Digite um beneficio',
                'diferencialVaga.required' => 'Digite um diferencal',
                'idEmpresa.required' => 'Digite o id da empresa',
                'idStatusVaga.required' => 'Digite um id vaga',
            ]
        );

        $vaga = new Vaga;

        $vaga->nomeVaga = $request->nomeVaga;
        $vaga->dataPublicacaoVaga = $request->dataPublicacaoVaga;
        $vaga->prazoVaga = $request->prazoVaga;
        $vaga->modalidadeVaga = $request->modalidadeVaga;
        $vaga->salarioVaga = $request->salarioVaga;
        $vaga->cidadeVaga = $request->cidadeVaga;
        $vaga->estadoVaga = $request->estadoVaga;
        $vaga->idAreaVaga = $request->areaVaga;
        $vaga->beneficiosVaga = $request->beneficiosVaga;
        $vaga->diferencialVaga = $request->diferencialVaga;
        $vaga->idEmpresa = $request->idEmpresa;
        $vaga->idStatusVaga = $request->idStatusVaga;

        $vaga->save();

        $vaga = new Vaga;

        $vaga->nomeVaga = $request->nomeVaga;
        $vaga->dataPublicacaoVaga = $request->dataPublicacaoVaga;
        $vaga->prazoVaga = $request->prazoVaga;
        $vaga->modalidadeVaga = $request->modalidadeVaga;
        $vaga->salarioVaga = $request->salarioVaga;
        $vaga->cidadeVaga = $request->cidadeVaga;
        $vaga->estadoVaga = $request->estadoVaga;
        $vaga->idAreaVaga = $request->areaVaga;
        $vaga->beneficiosVaga = $request->beneficiosVaga;
        $vaga->diferencialVaga = $request->diferencialVaga;
        $vaga->idEmpresa = $request->idEmpresa;
        $vaga->idStatusVaga = $request->idStatusVaga;

        $vaga->save();
        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaga = Vaga::where('idVaga', $id)->get();

        return $vaga;
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
