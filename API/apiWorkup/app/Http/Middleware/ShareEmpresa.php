<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ShareEmpresa
{
    public function handle($request, Closure $next)
    {
        $empresa = Auth::user()->empresa ?? null;
        View::share('empresa', $empresa);
        return $next($request);
    }
}

