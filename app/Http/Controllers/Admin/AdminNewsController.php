<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Afbeelding uploaden (optioneel)
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Verplichte velden uit jouw model
        $validated['user_id'] = auth()->id();
        $validated['published_at'] = now();

        News::create($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem succesvol toegevoegd.');
    }

    /**Toon formulier om bestaand nieuws te bewerken**/
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**Update bestaand nieuwsitem**/
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Nieuwe afbeelding uploaden (oude verwijderen)
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem succesvol bijgewerkt.');
    }

    /**Verwijder nieuwsitem + afbeelding**/
    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem succesvol verwijderd.');
    }
}
