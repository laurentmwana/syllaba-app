<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Document;
use App\Services\File\FileUploader;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Services\DataValues\DataValueFormatter;

class AdminDocumentController extends Controller
{
    public function __construct(private FileUploader $fileUploader) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $documents = Document::findPaginated();

        return view('admin.document.index', [
            'documents' => $documents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.document.create', [
            'document' => new Document(),
            'levels' => DataValueFormatter::getLevels(),
            'yearAcademics' => DataValueFormatter::getYearAcademics(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request)
    {
        $newFile = $this->fileUploader->upload($request->validated('file'), '/document');

        $document = Document::create([
            ...$request->validated(),
            'file' => $newFile,
        ]);

        $document->levels()->sync($request->validated('levels'));
        $document->yearAcademics()->sync($request->validated('year_academics'));

        return redirect()->route('#document.index')
            ->with('message', "document créé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $document = Document::with(['levels'])->findOrFail($id);

        return view('admin.document.show', [
            'document' => $document,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $document = Document::with(['levels'])->findOrFail($id);

        return view('admin.document.edit', [
            'document' => $document,
            'levels' => DataValueFormatter::getLevels(),
            'yearAcademics' => DataValueFormatter::getYearAcademics(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentRequest $request, string $id)
    {
        $document = Document::findOrFail($id);

        $this->fileUploader->delete($document->file);

        $updateFile = $this->fileUploader->upload($request->validated('file'), '/document');

        $document->update([...$request->validated(), 'file' => $updateFile]);

        $document->levels()->sync($request->validated('levels'));
        $document->yearAcademics()->sync($request->validated('year_academics'));

        return redirect()->route('#document.index')
            ->with('message', "document edité.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);

        $this->fileUploader->delete($document->image);

        $document->delete();

        return redirect()->route('#document.index')
            ->with('message', "document supprimé.");
    }
}
