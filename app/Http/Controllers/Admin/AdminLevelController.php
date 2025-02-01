<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Option;
use App\Models\Faculty;
use App\Http\Requests\LevelRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class AdminLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $levels = Level::findPaginated();

        return view('admin.level.index', [
            'levels' => $levels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.level.create', [
            'level' => new Level(),
            'options' => $this->getCollectionOptions()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelRequest $request)
    {
        Level::create($request->validated());

        return redirect()->route('#level.index')
            ->with('message', "promotion créée.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $level = Level::findOrFail($id);

        return view('admin.level.show', [
            'level' => $level,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $level = Level::findOrFail($id);

        return view('admin.level.edit', [
            'level' => $level,
            'options' => $this->getCollectionOptions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LevelRequest $request, string $id)
    {
        $level = Level::findOrFail($id);

        $level->update($request->validated());

        return redirect()->route('#level.index')
            ->with('message', "promotion editée.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $level = Level::findOrFail($id);

        $level->delete();

        return redirect()->route('#level.index')
            ->with('message', "promotion supprimée.");
    }

    private function getCollectionOptions(): Collection
    {
        return Option::orderByDesc('updated_at')
            ->get(['name', 'id']);
    }
}
