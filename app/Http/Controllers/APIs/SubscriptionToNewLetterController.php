<?php

namespace App\Http\Controllers\APIs;

use App\Enums\NewLetterStateEnum;
use App\Http\Controllers\Controller;
use App\Models\NewLetter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionToNewLetterController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $user = $request->user();

        $newLetter = NewLetter::where('user_id', '=', $user->id)->first();

        if (null === $newLetter) {
            NewLetter::create([
                'user_id' => $user->id,
            ]);

            return new JsonResponse([
                'message' => 'Vous êtes inscrit(e) au service de new-letter',
                'change' => true,
            ]);
        } elseif ($newLetter instanceof NewLetter && $newLetter->status === NewLetterStateEnum::SUBSCRIBE->value) {
            return new JsonResponse([
                'message' => 'vous êtes déjà inscrit(e) au serice new-letter',
                'change' => false,
            ]);
        } elseif ($newLetter instanceof NewLetter && $newLetter->status === NewLetterStateEnum::UNSUBSCRIBE->value) {

            $newLetter->update([
                'status' => NewLetterStateEnum::SUBSCRIBE->value,
                'change' => true
            ]);

            return new JsonResponse([
                'message' => 'Vous êtes réinscrit(e) au service de new-letter'
            ]);
        }

        return new JsonResponse([
            'message' => 'Nous n\'avons pas pu effectué cette action, merci de réessayer.'
        ]);
    }

    public function remove(Request $request): JsonResponse
    {
        $user = $request->user();

        $newLetter = NewLetter::where('user_id', '=', $user->id)->find();

        if ($newLetter === null) {
            return new JsonResponse([
                'message' => 'Nous n\'avons pas pu effectué cette action, merci de réessayer.'
            ]);
        }

        $newLetter->update([
            'status' => NewLetterStateEnum::UNSUBSCRIBE->value,
            'change' => true
        ]);

        return new JsonResponse([
            'message' => 'Vous êtes déinscrit(e) au service de new-letter',
        ]);
    }
}
