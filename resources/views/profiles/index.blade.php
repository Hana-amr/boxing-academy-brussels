@extends('layouts.app')

@section('content')

    <h1 class="text-3xl font-bold mb-8">Onze leden</h1>

    @if($users->isEmpty())
        <p>Er zijn nog geen profielen.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($users as $user)
                <div class="bg-white p-4 shadow rounded text-center">
                    @if($user->profile && $user->profile->photo)
                        <img src="{{ asset('storage/' . $user->profile->photo) }}"
                             class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                    @else
                        <div class="w-24 h-24 rounded-full mx-auto mb-4 bg-gray-300"></div>
                    @endif

                    <h2 class="font-bold">{{ $user->name }}</h2>

                    <a href="{{ route('profiles.show', $user) }}"
                       class="inline-block mt-3 bg-green-700 text-white px-4 py-2 rounded">
                        Bekijk profiel
                    </a>
                </div>
            @endforeach
        </div>
    @endif

@endsection
