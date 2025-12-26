@extends('layouts.app')

@section('content')

    {{-- HEADER --}}
    <section class="bg-red-700 text-white py-12 text-center mb-10">
        <h1 class="text-4xl font-bold mb-2">Nieuws</h1>
        <p>Blijf op de hoogte van alles in en rond de club.</p>
    </section>

    {{-- GEEN NIEUWS --}}
    @if($news->isEmpty())
        <div class="text-center py-20">
            <p class="text-xl text-gray-600">
                Er is momenteel geen nieuws beschikbaar.
            </p>
        </div>
    @else

        {{-- NIEUWS GRID --}}
        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 mb-20">

            @foreach($news as $item)
                <div class="bg-white rounded-lg shadow p-4 flex flex-col">

                    {{-- AFBEELDING --}}
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}"
                             class="rounded mb-4 h-40 w-full object-cover">
                    @else
                        <div class="h-40 bg-gray-300 flex items-center justify-center mb-4 rounded">
                            Geen afbeelding
                        </div>
                    @endif

                    {{-- TITEL --}}
                    <h2 class="font-bold text-lg mb-2">
                        {{ $item->title }}
                    </h2>

                    {{-- TEKST --}}
                    <p class="text-sm mb-4 flex-grow">
                        {{ Str::limit($item->content, 120) }}
                    </p>

                    {{-- FOOTER --}}
                    <div class="flex justify-between items-center text-sm text-gray-700">
                <span>
                    {{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}
                </span>

                    </div>

                </div>
            @endforeach

        </div>
    @endif

@endsection
