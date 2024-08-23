<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckTaxStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);

        $user = Auth::user();
        if ($user && $user->id_level == 5)
        {
            return $next($request);
        }
        return redirect()->route('deliveries.index')->with('error',"Anda tidak memiliki akses");
    }
}
