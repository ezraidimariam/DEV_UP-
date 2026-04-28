<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Check if user has the required role
        switch ($role) {
            case 'formateur':
                if (!$user->isFormateur()) {
                    abort(403, 'Unauthorized action.');
                }
                break;
            case 'apprenant':
                if (!$user->isApprenant()) {
                    abort(403, 'Unauthorized action.');
                }
                break;
            case 'admin':
                if (!$user->isAdmin()) {
                    abort(403, 'Unauthorized action.');
                }
                break;
        }

        return $next($request);
    }
}
