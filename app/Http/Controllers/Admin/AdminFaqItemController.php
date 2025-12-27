<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class AdminFaqItemController extends Controller
{
    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FaqItem::create($validated);

        return redirect()->route('admin.faq.categories.index')
            ->with('success', 'FAQ-vraag toegevoegd.');
    }

    public function edit(FaqItem $item)
    {
        $categories = FaqCategory::all();
        return view('admin.faq.items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, FaqItem $item)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $item->update($validated);

        return redirect()->route('admin.faq.categories.index')
            ->with('success', 'FAQ-vraag bijgewerkt.');
    }

    public function destroy(FaqItem $item)
    {
        $item->delete();

        return redirect()->back()
            ->with('success', 'FAQ-vraag verwijderd.');
    }
}
