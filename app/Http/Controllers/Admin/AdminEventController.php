<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use App\Services\File\FileUploader;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\DataValues\DataValueFormatter;


class AdminEventController extends Controller
{
    public function __construct(private FileUploader $fileUploader) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $events = Event::findPaginated();

        return view('admin.event.index', [
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.event.create', [
            'event' => new Event(),
            'types' => DataValueFormatter::getTypeEvents()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $newImage = $this->fileUploader->upload($request->validated('image'), '/event');

        Event::create([
            ...$request->validated(),
            'image' => $newImage,
        ]);

        return redirect()->route('#event.index')
            ->with('message', "évènement créé.");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $event = Event::findOrFail($id);

        return view('admin.event.show', [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $event = Event::findOrFail($id);

        return view('admin.event.edit', [
            'event' => $event,
            'types' => DataValueFormatter::getTypeEvents()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        $event = Event::findOrFail($id);

        $this->fileUploader->delete($event->image);

        $updateImage = $this->fileUploader->upload($request->validated('image'), '/event');

        $event->update([...$request->validated(), 'image' => $updateImage]);

        return redirect()->route('#event.index')
            ->with('message', "évènement edité.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        $this->fileUploader->delete($event->image);

        $event->delete();

        return redirect()->route('#event.index')
            ->with('message', "évènement supprimé.");
    }
}
