<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiProductController extends Controller
{

    public function add(Request $request): JsonResponse
    {
        $user = $request->user();

        if (!$user instanceof User) {
            return new JsonResponse([
                'message' => "Veuillez vous connecter pour effectuer cette action (:",
            ], Response::HTTP_UNAUTHORIZED);
        }

        $productId = $request->request->get('productId');

        try {
            $product = Product::findOrFail($productId);

            return new JsonResponse([
                'message' => "produit enregistré dans le panier"
            ]);

            
        } catch (\Throwable $th) {
            return new JsonResponse([
                'message' => sprintf("Une erreur est survenue, merci de réessayer : %s", $th->getMessage()),
            ], $th->getCode());
        }
    }
}
