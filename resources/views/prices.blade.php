@extends('layouts.app')

@section('content')

    {{-- PAGINA TITEL --}}
    <section class="bg-black text-white py-12 text-center mb-16">
        <h1 class="text-4xl font-bold">Tarieven</h1>
        <p class="text-gray-300 mt-2">Thai boksen – transparante prijzen</p>
    </section>

    @php
        $groups = [
            'volwassenen' => 'Volwassenen',
            'dames' => 'Dames (Ladies Only)',
            'kinderen' => 'Kinderen'
        ];
    @endphp

    @foreach($groups as $key => $title)

        <section class="max-w-6xl mx-auto mb-24">

            {{-- GROEP TITEL --}}
            <h2 class="text-3xl font-bold text-center mb-10 text-white bg-gray-900 py-4">
                {{ $title }}
            </h2>

            @if(!isset($prices[$key]) || $prices[$key]->isEmpty())
                <p class="text-center text-gray-500">
                    Geen tarieven beschikbaar voor {{ strtolower($title) }}.
                </p>
            @else

                {{-- PRIJSKAARTEN --}}
                <div class="grid md:grid-cols-4 gap-4">

                    @foreach($prices[$key] as $price)

                        <div class="bg-white text-black border rounded shadow">

                            {{-- PERIODE --}}
                            <div class="bg-gray-800 text-white text-center py-4 font-bold uppercase">
                                {{ ucfirst($price->period) }}
                            </div>

                            {{-- PRIJS --}}
                            <div class="text-center py-8">
                        <span class="text-5xl font-bold">
                            €{{ $price->subscription_price }}
                        </span>
                                <p class="text-sm text-gray-600 mt-2">
                                    @if($price->period === 'maandelijks') per maand
                                    @elseif($price->period === 'trimestrieel') / 3 maanden
                                    @elseif($price->period === 'semestrieel') / 6 maanden
                                    @else per jaar
                                    @endif
                                </p>
                            </div>

                            {{-- INSCHRIJVING --}}
                            <div class="border-t px-6 py-6 text-sm">
                                <p class="font-semibold mb-2">Inschrijvingskosten</p>
                                <p>Jaarlijkse verzekering: €{{ $price->insurance_price }}</p>
                                <p>Lidkaart: €{{ $price->card_price }}</p>

                                <p class="mt-4 font-bold">
                                    Totaal eerste jaar:
                                    €{{ $price->subscription_price + $price->insurance_price + $price->card_price }}
                                </p>
                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </section>

    @endforeach

@endsection
