<?php

namespace App\Http\Middleware;

use App\Enum\RoleUserEnum;
use Closure;
use App\Models\User;
use App\Utilities\Auth\HasRoleUser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        if ($user instanceof User && $role === $user->role) {
            abort(Response::HTTP_FORBIDDEN, "Vous ne pouvez pas accéder à cette page.");
        }

        return $next($request);
    }
}
