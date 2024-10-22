<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DenunciaVaga;
use App\Http\Controllers\Controller;

class DenunciaVagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denuncias = DenunciaVaga::with(['usuario', 'empresa', 'status', 'vaga'])->get();

        return view('admin.denuncias.denunciaVaga', compact('denuncias'));
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
            'idVaga' => 'required|integer', // Adicione a validação para o ID da empresa
        ]);
    
        try {
            DenunciaVaga::create([
                'idUsuario' => $request->idUsuario,
                'Motivo' => $request->motivo,
                'idStatus' => $request->idStatus,
                'idVaga' => $request->idVaga, // Salve o ID da empresa
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
        $denuncias = DenunciaVaga::where('idDenunciaVaga', $id)->with(['usuario', 'empresa', 'status', 'vaga'])->firstOrFail(); // Retorna 404 se não encontrar
        

        return view('admin.denuncias.allDenunciaVaga', ['denuncia'=>$denuncias]);
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
