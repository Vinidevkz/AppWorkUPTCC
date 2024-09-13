<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Verificar na tabela tb_empresa
        $empresa = Empresa::where('emailEmpresa', $email)->first();
        if ($empresa) {
            if (Hash::check($password, $empresa->senhaEmpresa)) {
                return redirect('/cadastrarVaga');
            } else {
                return redirect()->back()->with('error', 'Senha incorreta para o email informado.');
            }
        }

        // Verificar na tabela tb_admin
        $admin = Admin::where('emailAdmin', $email)->first();
        if ($admin) {
            if (Hash::check($password, $admin->senhaAdmin)) {
                return redirect('/cadastrarAdmin');
            } else {
                return redirect()->back()->with('error', 'Senha incorreta para o email informado.');
            }
        }

        // Se não encontrou o email em nenhuma tabela
        return redirect()->back()->with('error', 'Nenhum usuário encontrado com os dados informados.');
    }
}
