<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DenunciaEmpresa;
use App\Http\Controllers\Controller;

class DenunciaEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                // Obtendo todas as denúncias com o nome da empresa
                $denuncias = DenunciaEmpresa::with(['usuario', 'empresa', 'status'])->get();

                return view('admin.denuncias.denunciaEmpresa', compact('denuncias'));
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
        $request->validate([
            'idUsuario' => 'required|integer',
            'motivo' => 'required|string|max:255',
            'idStatus' => 'required|integer',
            'idEmpresa' => 'required|integer', // Adicione a validação para o ID da empresa
        ]);
    
        try {
            DenunciaEmpresa::create([
                'idUsuario' => $request->idUsuario,
                'Motivo' => $request->motivo,
                'idStatus' => $request->idStatus,
                'idEmpresa' => $request->idEmpresa, // Salve o ID da empresa
            ]);
    
            return redirect()->back()->with('success', 'Denúncia registrada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao registrar a denúncia: ' . $e->getMessage());
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
        $denuncias = DenunciaEmpresa::where('idDenunciaEmpresa', $id)->with(['usuario', 'empresa', 'status'])->firstOrFail(); // Retorna 404 se não encontrar
        

        return view('admin.denuncias.allDenunciaEmpresa', ['denuncia'=>$denuncias]);
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
