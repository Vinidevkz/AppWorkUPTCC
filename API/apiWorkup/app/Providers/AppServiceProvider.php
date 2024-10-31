<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
{
    View::composer('*', function ($view) {
        // Obter o objeto completo da empresa autenticada, se existir
        $empresa = Auth::guard('empresa')->user();
        $admin = Auth::guard('admin')->user();

        // Compartilhar a variável `$empresa`, mesmo que seja null
        $view->with('empresa', $empresa);
        

        if ($admin) {
            // Obter contagens para o admin, se autenticado
            $totalDenuncias = DB::table('tb_denunciausuario')->count();
            $totalDenunciasEmpresa = DB::table('tb_denunciaempresa')->count();
            $totalDenunciasVagas = DB::table('tb_denunciavaga')->count();

            // Calcular o total de denúncias
            $totalDenunciasGeral = $totalDenuncias + $totalDenunciasEmpresa + $totalDenunciasVagas;

            $dadosDenuncias = [
                'totalDenuncias' => $totalDenuncias,
                'totalDenunciasEmpresa' => $totalDenunciasEmpresa,
                'totalDenunciasVagas' => $totalDenunciasVagas,
                'totalDenunciasGeral' => $totalDenunciasGeral,
            ];

            $view->with('admin', $admin)->with('dadosDenuncias', $dadosDenuncias);
        }
    });
}

}
