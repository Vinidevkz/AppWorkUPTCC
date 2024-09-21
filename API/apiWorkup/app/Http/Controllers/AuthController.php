<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
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
                Auth::guard('empresas')->login($empresa);
                return redirect('/cadastrarVaga');
            }
        }

        // Verificar na tabela tb_admin
        $admin = Admin::where('emailAdmin', $email)->first();
        if ($admin) {
            if (Hash::check($password, $admin->senhaAdmin)) {
                Auth::guard('admins')->login($admin);
                Log::info('Admin logged in:', ['email' => $email]); // Log de sucesso
                return redirect()->route('admin');
            } else {
                    Log::warning('Incorrect password for email:', ['email' => $email]); // Log de falha
                return redirect()->back()->with('error', 'Senha incorreta para o email informado.');
            }
        }
        


        return redirect()->back()->with(['error' => 'Credenciais inválidas.']);
    }

    public function showFormLogin()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::guard('empresas')->logout(); // Use o guard correto
        return redirect('/')->with('message', 'Logout realizado com sucesso.'); // Redireciona para a página de login
    }
}
