@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">FAQ-vraag bewerken</h1>

    <form method="POST" action="{{ route('admin.faq.items.update', $item) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Categorie</label>
            <select name="faq_category_id" class="w-full border p-2 rounded">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $item->faq_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Vraag</label>
            <input type="text"
                   name="question"
                   value="{{ old('question', $item->question) }}"
                   class="w-full border p-2 rounded">
        </div>

        <div class="mb-6">
            <label class="block font-semibold mb-1">Antwoord</label>
            <textarea name="answer"
                      rows="4"
                      class="w-full border p-2 rounded">{{ old('answer', $item->answer) }}</textarea>
        </div>

        <div class="flex gap-3">
            <button class="bg-green-600 text-white px-6 py-2 rounded">
                Bijwerken
            </button>

            <a href="{{ route('admin.faq.categories.index') }}"
               class="bg-red-600 text-white px-6 py-2 rounded">
                Annuleren
            </a>
        </div>

    </form>

@endsection
