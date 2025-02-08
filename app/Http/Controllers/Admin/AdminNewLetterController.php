<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewLetterStateEnum;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\NewLetter;

class AdminNewLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $newLetters = NewLetter::findPaginated();

        return view('admin.new-letter.index', [
            'newLetters' => $newLetters,
        ]);
    }

    public function changeState(int $id)
    {
        $newLetter = NewLetter::with(['user'])->findOrFail($id);

        if ($newLetter->state === NewLetterStateEnum::SUBSCRIBE->value) {
            $newLetter->state = NewLetterStateEnum::UNSUBSCRIBE->value;
        } else {
            $newLetter->state = NewLetterStateEnum::SUBSCRIBE->value;
        }

        $newLetter->save();

        return redirect()->route('#new-letter.index')
            ->with('message', "le newletter créé.");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newLetter = NewLetter::findOrFail($id);

        $newLetter->delete();

        return redirect()->route('#new-letter.index')
            ->with('message', "le newletter supprimé.");
    }
}
