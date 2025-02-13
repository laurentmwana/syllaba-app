<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\CourseDocument;
use App\Services\DataValues\DataValueFormatter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $cards = Card::findAllForStudent($user->student_id);

        return view('card.index', [
            'cards' => $cards,
        ]);
    }

    public function show(Request $request, int $id): View
    {
        $studentId = $request->user()->student_id;

        $card = Card::with(['courseDocument', 'student'])
            ->where('student_id', '=', $studentId)
            ->findOrFail($id);

        return view('card.show', [
            'card' => $card,
        ]);
    }

    public function add(Request $request, int $courseDocumentId): RedirectResponse
    {
        $studentId = $request->user()->student_id;

        $CourseDocument = CourseDocument::findOrFail($courseDocumentId);

        $card = Card::where('student_id', '=', $studentId)
            ->where('course_document_id', '=', $CourseDocument->id)
            ->where('completed', '=', false)
            ->first();

        if (! ($card instanceof Card)) {
            Card::create([
                'course_document_id' => $CourseDocument->id,
                'student_id' => $studentId,
                'prices' => $CourseDocument->price,
                'quantities' => 1
            ]);

            return redirect()->route('card.index')
                ->with('message', 'support de cours ajouté dans le panier');
        }

        return redirect()->route('card.index')
            ->with('message', 'support de cours existe dans le panier');
    }

    public function edit(Request $request, int $id): View
    {
        $studentId = $request->user()->student_id;

        $card = Card::with(['courseDocument', 'student'])
            ->where('student_id', '=', $studentId)
            ->findOrFail($id);

        return view('card.edit', [
            'card' => $card,
            'courseDocuments' => DataValueFormatter::getCourseDocuments(),
        ]);
    }

    public function update(CardRequest $request, int $id): RedirectResponse
    {
        $studentId = $request->user()->student_id;

        $card = Card::with(['courseDocument', 'student'])
            ->where('student_id', '=', $studentId)
            ->findOrFail($id);

        if ($card->completed) {
            return redirect()->route('card.index')
                ->with('message', 'support de cours ajouté dans le panier');
        }

        $prices = ((int)$request->validated('quantities') * (float)$card->courseDocument->price);

        $card->update([
            ...$request->validated(),
            'prices' => $prices
        ]);

        return redirect()->route('card.index')
            ->with('message', 'support de cours ajouté dans le panier');
    }

    public function destroy(Request $request, int $id): RedirectResponse
    {

        $studentId = $request->user()->student_id;

        $card = Card::with(['courseDocument', 'student'])
            ->where('student_id', '=', $studentId)
            ->findOrFail($id);

        if ($card->completed) {
            return redirect()->route('card.index')
                ->with('message', 'Impossible de supprimer ce produit dans le panier, car il est déjà completé');
        }

        $card->delete();

        return redirect()->route('card.index')
            ->with('message', 'support de cours supprimé dans le panier');
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $studentId = $request->user()->student_id;

        DB::table('cards')
            ->where('completed', '=', false)
            ->where('student_id', '=', $studentId)
            ->delete();

        return redirect()->route('card.index')
            ->with('message', 'Le panier a été vidé avec succès.');
    }
}
