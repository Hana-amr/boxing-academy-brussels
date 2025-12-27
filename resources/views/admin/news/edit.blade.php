@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Nieuws bewerken</h1>

    <form method="POST"
          action="{{ route('admin.news.update', $news) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- TITEL --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Titel</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $news->title) }}"
                   class="w-full border p-2 rounded">
            @error('title')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- INHOUD --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Inhoud</label>
            <textarea name="content"
                      rows="6"
                      class="w-full border p-2 rounded">{{ old('content', $news->content) }}</textarea>
            @error('content')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- AFBEELDING --}}
        <div class="mb-6">
            <label class="block font-semibold mb-1">Afbeelding</label>
            <input type="file" name="image">

            @if($news->image)
                <p class="text-sm text-gray-600 mt-2">Huidige afbeelding:</p>
                <img src="{{ asset('storage/' . $news->image) }}"
                     class="h-32 mt-2 rounded">
            @endif

            @error('image')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- ACTIES --}}
        <div class="flex gap-3">
            <button type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded">
                Bijwerken
            </button>

            <a href="{{ route('admin.news.index') }}"
               class="bg-red-600 text-white px-6 py-2 rounded">
                Annuleren
            </a>
        </div>

    </form>

@endsection
