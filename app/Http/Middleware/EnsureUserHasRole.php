<?php

namespace App\Http\Middleware;

use App\Enums\RoleUserEnum;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        if ($user instanceof User) {
            switch ($role) {
                case RoleUserEnum::ADMIN->value:
                    if (!isAdmin($user->role)) {
                        abort(Response::HTTP_FORBIDDEN, "Accès réservé à l'administrateur.");
                    }
                    break;

                case RoleUserEnum::STUDENT->value:
                    if (!isStudent($user->role)) {
                        abort(Response::HTTP_FORBIDDEN, "Vous devez passer en prémium pour accéder à cette page.");
                    }
                    break;

                default:
                    abort(Response::HTTP_FORBIDDEN, "Rôle non autorisé.");
            }
        }



        return $next($request);
    }
}
