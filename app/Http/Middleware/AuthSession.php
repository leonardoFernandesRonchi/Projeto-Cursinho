<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthSession
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está na sessão
        if (!session('user')) {
            return redirect()->route('login'); // Redireciona para a página de login se não houver usuário na sessão
        }

        return $next($request);
    }
}
