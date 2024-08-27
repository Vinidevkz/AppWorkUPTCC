<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $vagas = Vaga::with('empresa')->get();

        return response()->json($vagas); // Retorna o resultado como JSON
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
        $vaga = new Vaga;

        $vaga->nomeVaga = $request->nomeVaga;
        $vaga->dataPublicacaoVaga = $request->dataPublicacaoVaga;
        $vaga->prazoVaga = $request->prazoVaga;
        $vaga->modalidadeVaga = $request->modalidadeVaga;
        $vaga->salarioVaga = $request->salarioVaga;
        $vaga->cidadeVaga = $request->cidadeVaga;
        $vaga->estadoVaga = $request->estadoVaga;
        $vaga->areaVaga = $request->areaVaga;
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
        $vaga->areaVaga = $request->areaVaga;
        $vaga->beneficiosVaga = $request->beneficiosVaga;
        $vaga->diferencialVaga = $request->diferencialVaga;
        $vaga->idEmpresa = $request->idEmpresa;
        $vaga->idStatusVaga = $request->idStatusVaga;

        $vaga->save();
        
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
