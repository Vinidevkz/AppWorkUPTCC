<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Area;

class ShareAreas
{
    public function handle($request, Closure $next)
    {
        // Obter todas as áreas
        $areas = Area::all();

        // Compartilhar as áreas com todas as views
        view()->share('areas', $areas);

        return $next($request);
    }
}

