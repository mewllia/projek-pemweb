<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }
        return $next($request);
    }
}
