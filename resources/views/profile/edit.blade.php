@extends('layouts.app')

@section('content')

    <section class="max-w-3xl mx-auto py-20">

        <h1 class="text-3xl font-bold mb-8">Mijn profiel bewerken</h1>

        @if(session('success'))
            <div class="bg-green-600 text-white p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST"
              action="{{ route('profile.update') }}"
              enctype="multipart/form-data"
              class="space-y-6">
            @csrf
            @method('PATCH')

            {{-- USERNAME --}}
            <div>
                <label class="block mb-1 font-semibold">Gebruikersnaam</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', auth()->user()->name) }}"
                       class="w-full p-3 border rounded">
            </div>

            {{-- VERJAARDAG --}}
            <div>
                <label class="block mb-1 font-semibold">Verjaardag</label>
                <input type="date"
                       name="birthday"
                       value="{{ old('birthday', optional(auth()->user()->profile)->birthday) }}"
                       class="w-full p-3 border rounded">
            </div>

            {{-- OVER MIJ --}}
            <div>
                <label class="block mb-1 font-semibold">Over mij</label>
                <textarea name="about"
                          rows="4"
                          class="w-full p-3 border rounded">{{ old('about', optional(auth()->user()->profile)->about) }}</textarea>
            </div>

            {{-- FOTO --}}
            <div>
                <label class="block mb-1 font-semibold">Profielfoto</label>
                <input type="file" name="photo">

                @if(auth()->user()->profile && auth()->user()->profile->photo)
                    <img src="{{ asset('storage/' . auth()->user()->profile->photo) }}"
                         class="w-24 h-24 rounded-full mt-4 object-cover">
                @endif
            </div>

            <button type="submit"
                    class="bg-green-700 text-white px-6 py-3 rounded">
                Opslaan
            </button>
        </form>

    </section>

@endsection
