@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">FAQ-categorie bewerken</h1>

    <form method="POST" action="{{ route('admin.faq.categories.update', $category) }}">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block font-semibold mb-1">Naam categorie</label>
            <input type="text"
                   name="name"
                   class="w-full border p-2 rounded"
                   value="{{ old('name', $category->name) }}">
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
