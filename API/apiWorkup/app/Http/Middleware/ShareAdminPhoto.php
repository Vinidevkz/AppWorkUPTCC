<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View; 

class ShareAdminPhoto
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::guard('admin')->check()) {
            $idAdmin = Auth::guard('admin')->id();
            $admin = \App\Models\Admin::find($idAdmin);
            $fotoAdmin = $admin->fotoAdmin;

            // Compartilhe a variável com todas as views
            View::share('fotoAdmin', $fotoAdmin);
        }

        return $next($request);
        return $next($request);
    }


    
}



