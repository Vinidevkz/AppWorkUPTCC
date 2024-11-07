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
        // Validação de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Verificar na tabela tb_empresa
        $empresa = Empresa::where('emailEmpresa', $email)->first();
        if ($empresa) {
            // Se a senha estiver correta, faça o login
            if (Hash::check($password, $empresa->senhaEmpresa)) {
                Auth::guard('empresa')->login($empresa);
                return redirect('/empresa/dashboard');
            } else {
                // Senha incorreta para empresa
                return redirect()->back()->with('error', 'Senha incorreta para empresa.');
            }
        }

        // Verificar na tabela tb_admin
        $admin = Admin::where('emailAdmin', $email)->first();
        if ($admin) {
            // Se a senha estiver correta, faça o login
            if (Hash::check($password, $admin->senhaAdmin)) {
                Auth::guard('admin')->login($admin);
                Log::info('Admin logged in:', ['email' => $email]);
                
                    return redirect('/admin');  // Adicionado redirecionamento correto
            } else {
                // Senha incorreta para admin
                return redirect()->back()->with('error', 'Senha incorreta para admin.');
            }
        }

        // Se nenhum usuário for encontrado (nem empresa nem admin)
        return redirect()->back()->with('error', 'Credenciais inválidas.');
    }

    public function showFormLogin()
    {
        return view('login');
    }

    public function logout(Request $request)
    {

        if($request){
            if (Auth::guard('empresa')->check()) {
                Auth::guard('empresa')->logout();
            } elseif (Auth::guard('admin')->check()) {
                Auth::guard('admin')->logout();
            }
    
            return redirect()->route('login')->with('message', 'Logout realizado com sucesso.');

        }

    }
}

