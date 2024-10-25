<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DenunciaVaga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;


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
            'idVaga' => 'required|integer',
            'motivo' => 'required|string|max:255',
            'idStatus' => 'required|integer',
        ]);
    
        try {
            DenunciaVaga::create([
                'idUsuario' => $request->idUsuario,
                'idVaga' => $request->idVaga,
                'Motivo' => $request->motivo,
                'idStatus' => $request->idStatus,
            ]);
    
            return response()->json(['success' => true, 'message' => 'Denúncia registrada com sucesso.'], 200);
        } catch (\Exception $e) {
            // Log do erro para análise no backend
            Log::error('Erro ao registrar denúncia:', ['exception' => $e]);
    
            // Retorna uma resposta JSON com detalhes do erro
            return response()->json([
                'success' => false,
                'message' => 'Erro ao registrar a denúncia.',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
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
