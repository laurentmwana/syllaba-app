<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tome;
use Illuminate\Http\Request;
use App\Http\Requests\TomeRequest;
use App\Services\File\FileUploader;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\DataValues\DataValueFormatter;
use RuntimeException;

class AdminTomeController extends Controller
{
    public function __construct(private FileUploader $fileUploader) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $courseDocumentId = $request->query->get('course-document-id');

        if ($courseDocumentId !== null && !is_int($courseDocumentId)) {
            throw new RuntimeException(
                "Le paramètre `course-document-id` n'est pas un nombre."
            );
        }

        $tomes = null === $courseDocumentId
            ? Tome::findPaginated()
            : Tome::findPaginatedGroup($courseDocumentId);

        return view('admin.tome.index', [
            'tomes' => $tomes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.tome.create', [
            'tome' => new Tome(),
            'courseDocuments' => DataValueFormatter::getCourseDocuments()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TomeRequest $request)
    {
        $newDocument = $this->fileUploader->upload($request->validated('document'), '/tome');

        Tome::create([
            ...$request->validated(),
            'document' => $newDocument,
        ]);

        return redirect()->route('#tome.index')
            ->with('message', "tome document créé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $tome = Tome::with(['courseDocument', 'courseDocument.course'])->findOrFail($id);

        return view('admin.tome.show', [
            'tome' => $tome,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $tome = Tome::findOrFail($id);

        return view('admin.tome.edit', [
            'tome' => $tome,
            'courseDocuments' => DataValueFormatter::getCourseDocuments()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TomeRequest $request, string $id)
    {
        $tome = Tome::findOrFail($id);

        $this->fileUploader->delete($tome->document);

        $updateDocument = $this->fileUploader->upload($request->validated('document'), '/tome');

        $tome->update([...$request->validated(), 'document' => $updateDocument]);

        return redirect()->route('#tome.index')
            ->with('message', "tome document edité.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tome = Tome::findOrFail($id);

        $this->fileUploader->delete($tome->document);

        $tome->delete();

        return redirect()->route('#tome.index')
            ->with('message', "tome supprimé.");
    }
}
