@extends('layouts.app')

@section('content')

    <section class="max-w-4xl mx-auto py-20">

        <div class="bg-white shadow rounded p-8 text-center">

            {{-- PROFIELFOTO --}}
            @if($user->profile && $user->profile->photo)
                <img
                    src="{{ asset('storage/' . $user->profile->photo) }}"
                    class="w-32 h-32 rounded-full mx-auto mb-4 object-cover"
                >
            @else
                <div class="w-32 h-32 rounded-full bg-gray-300 mx-auto mb-4 flex items-center justify-center">
                    Geen foto
                </div>
            @endif

            {{-- USERNAME --}}
            <h1 class="text-3xl font-bold mb-2">
                {{ $user->name }}
            </h1>

            {{-- LEEFTIJD (OPTIONEEL) --}}
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

        </div>

    </section>

@endsection
