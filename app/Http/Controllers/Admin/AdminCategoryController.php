<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::with(['posts'])->paginate();

        return view('admin.category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.category.create', [
            'category' => new Category(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        Category::create($request->validated());

        return redirect()->route('#category.index')
            ->with('message', "categorie créée.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $category = Category::with(['posts'])->findOrFail($id);

        return view('admin.category.create', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $category = Category::with(['posts'])->findOrFail($id);

        return view('admin.category.create', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->validated());

        return redirect()->route('#category.index')
            ->with('message', "categorie editée.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('#category.index')
            ->with('message', "categorie supprimée.");
    }
}
