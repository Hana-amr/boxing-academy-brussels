<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class AdminFaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::withCount('items')->get();
        return view('admin.faq.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.faq.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create($validated);

        return redirect()->route('admin.faq.categories.index')
            ->with('success', 'FAQ-categorie toegevoegd.');
    }

    public function edit(FaqCategory $category)
    {
        return view('admin.faq.categories.edit', compact('category'));
    }

    public function update(Request $request, FaqCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validated);

        return redirect()->route('admin.faq.categories.index')
            ->with('success', 'FAQ-categorie bijgewerkt.');
    }

    public function destroy(FaqCategory $category)
    {
        $category->delete();

        return redirect()->route('admin.faq.categories.index')
            ->with('success', 'FAQ-categorie verwijderd.');
    }
}
