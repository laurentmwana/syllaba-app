<?php

namespace App\Http\Controllers;

use App\Enums\NewLetterStateEnum;
use App\Models\NewLetter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsLetterController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $newLetter = NewLetter::where('user_id', '=', $user->id)->first();

        if (! ($newLetter instanceof NewLetter)) {
            abort(Response::HTTP_NOT_FOUND, "Nous n'êtes pas inscrit(e) au service new-letter");
        }

        return view('news-letter.index', [
            'newLetter' => $newLetter
        ]);
    }

    public function add(Request $request): RedirectResponse
    {
        $user = $request->user();

        $newLetter = NewLetter::where('user_id', '=', $user->id)->first();

        if (! ($newLetter instanceof NewLetter)) {
            NewLetter::create([
                'user_id' => $user->id,
                'status' => NewLetterStateEnum::SUBSCRIBE->value,
            ]);
        } else {
            $newLetter->update([
                'status' => NewLetterStateEnum::SUBSCRIBE->value,
                'unsubscribe_at' => null
            ]);
        }

        return redirect()->route('news-letter.index')
            ->with('message', 'vous êtes inscrit(e) au service de newsLetter');
    }


    public function remove(Request $request): RedirectResponse
    {
        $user = $request->user();

        $newLetter = NewLetter::where('user_id', '=', $user->id)->first();

        if (! ($newLetter instanceof NewLetter)) {
            abort(Response::HTTP_NOT_FOUND, "Nous n'êtes encore pas inscrit(e) au service new-letter");
        }

        $newLetter->update([
            'status' => NewLetterStateEnum::UNSUBSCRIBE->value,
            'unsubscribe_at' => now()
        ]);

        return redirect()->route('news-letter.index')
            ->with('message', 'vous êtes desinscrit(e) au service de newsLetter');
    }
}
