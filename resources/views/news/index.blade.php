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
                <a href="{{ route('news.show', $item) }}"
                   class="block bg-white rounded-lg shadow p-4 flex flex-col hover:shadow-lg transition">

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

                    {{-- DATUM --}}
                    <div class="text-sm text-gray-700">
                        {{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}
                    </div>

                </a>
            @endforeach


        </div>
    @endif

@endsection
