<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContatoMail;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function enviar(Request $request) {
        $dados = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'mensagem' => 'required|string',
        ]);
    
        Mail::to('eduardo.ademir32@gmail.com')->send(new ContatoMail($dados));
    
        return back()->with('sucesso', 'Email enviado com sucesso!');
    }
    
}
