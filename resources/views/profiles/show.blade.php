@extends('layouts.app')

@section('content')

    <h1 class="text-3xl font-bold mb-2">
        {{ $user->name }}
    </h1>

    {{-- LEEFTIJD --}}
    @if($user->profile && $user->profile->birthday)
        <p class="text-gray-600 mb-4">
            Leeftijd:
            {{ \Carbon\Carbon::parse($user->profile->birthday)->age }} jaar
        </p>
    @endif

    {{-- OVER MIJ --}}
    @if($user->profile && $user->profile->about)
        <p class="text-gray-700">
            {{ $user->profile->about }}
        </p>
    @else
        <p class="text-gray-500">
            Deze gebruiker heeft nog geen beschrijving toegevoegd.
        </p>
    @endif

    @auth
        @if(auth()->id() === $user->id)
            <a href="{{ route('profile.edit') }}"
               class="inline-block mt-6 bg-gray-800 text-white px-4 py-2 rounded">
                Profiel bewerken
            </a>
        @endif
    @endauth

@endsection
