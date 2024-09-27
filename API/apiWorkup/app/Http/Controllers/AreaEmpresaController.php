<?php

namespace App\Http\Controllers;

use App\Models\AreaEmpresa;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class AreaEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areasEmpresa = AreaEmpresa::all();

        return $areasEmpresa;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empresa = Empresa::findOrFail($id); // Isso vai lançar uma exceção se a empresa não for encontrada
        return view('cadastrarAreaEmpresa', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Ativa o log de consultas para depuração
        DB::enableQueryLog();
        
        try {
            // Valida os dados do request
            $request->validate(
                [
                    'idArea' => 'required|array',
                    'idArea.*' => 'exists:tb_area,idArea', // Ajustado para usar 'idArea'
                ],
                [
                    'idArea.required' => 'Escolha pelo menos uma área',
                    'idArea.array' => 'Área inválida',
                    'idArea.*.exists' => 'Uma ou mais áreas selecionadas não existem',
                ]
            );
    
            $idEmpresa = $request->idEmpresa; // Obtém o ID da empresa
    
            // Loop para salvar as áreas selecionadas
            foreach ($request->idArea as $idArea) {
                $areaEmpresa = new AreaEmpresa();
                $areaEmpresa->idArea = $idArea;
                $areaEmpresa->idEmpresa = $idEmpresa;
    
                // Salva a área da empresa
                $areaEmpresa->save();
            }
    
            // Redireciona após o sucesso
            return redirect()->route('verUsuario')->with('success', 'Áreas cadastradas com sucesso!');
            
        } catch (\Exception $e) {
            // Captura o erro e retorna uma mensagem amigável
            return back()->withErrors(['error' => 'Erro ao salvar: ' . $e->getMessage()]);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
