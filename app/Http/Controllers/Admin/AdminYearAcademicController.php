<?php

namespace App\Http\Controllers\Admin;

use App\Models\YearAcademic;
use App\Enums\YearAcademicEnum;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Exceptions\YearAcademicIsClosedException;

class AdminYearAcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $years = YearAcademic::findPaginated();

        return view('admin.year-academic.index', [
            'years' => $years,
        ]);
    }

    public function closed(int $id): RedirectResponse
    {
        $year = YearAcademic::findOrFail($id);

        if ($year->status === YearAcademicEnum::CLOSED->value) {
            throw new YearAcademicIsClosedException($year);
        }

        $year->update(['status' => YearAcademicEnum::CLOSED->value]);

        return redirect()->route('#year-academic.index')
            ->with('message', "le status de l'année académique a été mis à jour.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $year = YearAcademic::findOrFail($id);

        return view('admin.year-academic.show', [
            'year' => $year,
        ]);
    }

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $year = YearAcademic::findOrFail($id);

        $year->delete();

        return redirect()->route('#year-academic.index')
            ->with('message', "année académique supprimée.");
    }
}
