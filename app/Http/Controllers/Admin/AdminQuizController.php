<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use App\Http\Requests\QuizRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $quizzes = Quiz::findPaginated();

        return view('admin.quiz.index', [
            'quizzes' => $quizzes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.quiz.create', [
            'quiz' => new Quiz(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizRequest $request)
    {

        Quiz::create($request->validated());

        return redirect()->route('#quiz.index')
            ->with('message', "quiz créé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $quiz = Quiz::findOrFail($id);

        return view('admin.quiz.show', [
            'quiz' => $quiz,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $quiz = Quiz::findOrFail($id);

        return view('admin.quiz.edit', [
            'quiz' => $quiz,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuizRequest $request, string $id)
    {
        $quiz = Quiz::findOrFail($id);

        $quiz->update($request->validated());

        return redirect()->route('#quiz.index')
            ->with('message', "quiz edité.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz = Quiz::findOrFail($id);

        $quiz->delete();

        return redirect()->route('#quiz.index')
            ->with('message', "quiz supprimé.");
    }
}
