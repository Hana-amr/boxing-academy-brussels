@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">FAQ-categorie toevoegen</h1>

    <form method="POST" action="{{ route('admin.faq.categories.store') }}">
        @csrf

        <div class="mb-6">
            <label class="block font-semibold mb-1">Naam categorie</label>
            <input type="text"
                   name="name"
                   class="w-full border p-2 rounded"
                   value="{{ old('name') }}">
            @error('name')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button class="bg-green-600 text-white px-6 py-2 rounded">
                Opslaan
            </button>

            <a href="{{ route('admin.faq.categories.index') }}"
               class="bg-red-600 text-white px-6 py-2 rounded">
                Annuleren
            </a>
        </div>

    </form>

@endsection
