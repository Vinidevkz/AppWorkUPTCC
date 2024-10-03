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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
        'detalhePublicacao' => 'required|string',
        'fotoPublicacao' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Limite de 2MB
        'idEmpresa' => 'required|exists:tb_empresa,id', // Supondo que você tenha um campo id na tabela
        'idVaga' => 'required|exists:tb_vaga,idVaga', // Supondo que você tenha um campo id na tabela de vagas
    ]);

    // Criação da postagem
    $post = new Post();
    $post->detalhePublicacao = $request->detalhePublicacao;
    $post->idEmpresa = $request->idEmpresa;
    $post->idVaga = $request->idVaga;

    // Verifique se foi enviada uma imagem
    if ($request->hasFile('fotoPublicacao')) {
        $path = $request->file('fotoPublicacao')->store('uploads', 'public');
        $post->fotoPublicacao = $path;
    }

    $post->save();

    return redirect()->route('empresa')->with('success', 'Postagem criada com sucesso!');
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
