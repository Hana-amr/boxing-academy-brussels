@extends('layouts.app')

@section('content')

    {{-- HEADER --}}
    <section class="bg-red-700 text-white py-12 text-center mb-10">
        <h1 class="text-4xl font-bold mb-2">FAQ</h1>
        <p>Veelgestelde vragen over onze club en trainingen</p>
    </section>

    {{-- GEEN FAQ --}}
    @if($categories->isEmpty())
        <div class="text-center py-20">
            <p class="text-xl text-gray-600">
                Er zijn momenteel geen veelgestelde vragen beschikbaar.
            </p>
        </div>
    @else

        {{-- FAQ CATEGORIEËN --}}
        <div class="max-w-4xl mx-auto mb-20">

            @foreach($categories as $category)

                {{-- CATEGORIE TITEL --}}
                <h2 class="text-2xl font-bold mb-4 mt-8">
                    {{ $category->name }}
                </h2>

                {{-- GEEN VRAGEN IN DEZE CATEGORIE --}}
                @if($category->items->isEmpty())
                    <p class="text-gray-600 mb-6">
                        Er zijn nog geen vragen in deze categorie.
                    </p>
                @else

                    {{-- VRAGEN --}}
                    <div class="space-y-4">
                        @foreach($category->items as $item)
                            <div class="bg-white shadow rounded p-4">
                                <p class="font-semibold mb-2">
                                    {{ $item->question }}
                                </p>
                                <p class="text-gray-700">
                                    {{ $item->answer }}
                                </p>
                            </div>
                        @endforeach
                    </div>

                @endif

            @endforeach

        </div>
    @endif

@endsection
