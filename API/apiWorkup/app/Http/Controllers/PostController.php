<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\AuthController;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtendo o ID da empresa autenticada
        $empresaId = auth()->guard('empresa')->user()->idEmpresa;
    
        // Buscando as postagens da empresa
        $posts = Post::where('idEmpresa', $empresaId)
            ->get();
    
        // Retorna a view com as postagens
        return view('posts.index', compact('posts'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresaId = auth()->guard('empresa')->user()->idEmpresa;

        return view('posts.create', compact('empresaId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Validação
            $request->validate([
                'detalhePublicacao' => 'required|max:120',
             
            ]);


    // Criação da postagem
    $post = new Post();
    $post->detalhePublicacao = $request->detalhePublicacao;
    $post->idEmpresa = $request->idEmpresa;
    $post->idVaga = $request->idVaga;
    $post->fotoPublicacao = $request->fotoUrl;

    $post->save();

    return redirect()->route('empresa.dashboard')->with('success', 'Postagem criada com sucesso!');
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
