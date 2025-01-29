<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddNumberPhone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $state): Response
    {
        $user = $request->user();
        if ($user instanceof User) {
            switch ($state) {
                case 'ok':

                    if ($user->phone === null) {
                        return redirect()->route('number-phone.index')
                            ->with('message', 'Ajouter un numéro de téléphone valide.');
                    }
                    break;
                case 'fail':
                    if ($user->phone !== null) {
                        abort(Response::HTTP_FORBIDDEN, "Vous ne pouvez pas accèder à cette page, car vous avez déjà ajouter un numéro de téléphone");
                    }
                    break;

                default:
                    abort(Response::HTTP_FORBIDDEN, ".");
            }
        }
        return $next($request);
    }
}
