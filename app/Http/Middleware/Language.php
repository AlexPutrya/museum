<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Support\Facades\Session;

class Language
{
    public function handle($request, Closure $next){
        App::setLocale(Session::get('applocale'));
        return $next($request);
    }
}
