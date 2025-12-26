@extends('layouts.app')

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative bg-black text-white mb-16">
        <img src="/images/BoxingHome.jpg" class="w-full h-[500px] object-cover opacity-60">
        <div class="absolute inset-0 flex flex-col justify-center px-12">
            <h1 class="text-5xl font-bold text-red-600 mb-4">
                Boxing Academy Brussels
            </h1>
            <p class="text-xl mb-6">
                Meer dan een sport. Een manier van leven
            </p>
            <a href="{{ route('contact.index') }}"
               class="bg-red-600 text-white px-6 py-3 rounded w-fit">
                Word lid
            </a>
        </div>
    </section>

    {{-- OVER ONS --}}
    <section class="relative bg-black text-white mb-16">
        <div class="absolute inset-0 flex flex-col justify-center px-12">
            <h2 class="text-5xl font-bold text-red-600 mb-4">Over ons</h2>
            <p>
                Wij zijn de plek waar Muay Thai écht leeft. Bij Boxing Academy Brussels combineren we passie voor de sport met persoonlijke begeleiding. Onze ervaren trainers helpen je groeien, niet alleen als sporter maar vooral als persoon.
                Onze community staat bekend om zijn warme en inclusieve sfeer. Van jeugdtrainingen tot speciale dameslessen en intensieve volwassenentrainingen, er is voor iedereen een passend aanbod.
                Ware kracht ontstaat waar discipline en community samenkomen. Heb je vragen over onze trainingen of tarieven? Neem gerust contact met ons op via het contactformulier. Ons team helpt je graag verder.
            </p>
        </div>
        <img src="/images/Overons.jpg" class="w-full h-[500px] object-cover opacity-30">
    </section>

    {{-- TRAINING BLOKKEN --}}
    <section class="max-w-6xl mx-auto mb-20 grid md:grid-cols-3 gap-6">
        <div class="relative">
            <img src="/images/Vrouwen.webp" class="rounded">
            <a href="{{ route('contact.index') }}"
               class="absolute bottom-4 left-4 bg-red-600 text-white px-3 py-1 rounded">
            Thaiboks dames
            </a>
        </div>
        <div class="relative">
            <img src="/images/KiDslessen.jpg" class="rounded">
            <a href="{{ route('contact.index') }}"
                class="absolute bottom-4 left-4 bg-red-600 text-white px-3 py-1 rounded">
            Jeugd Muay Thai
        </a>

        </div>
        <div class="relative">
            <img src="/images/volwassenen.jpg" class="rounded">
            <a href="{{ route('contact.index') }}"
                class="absolute bottom-4 left-4 bg-red-600 text-white px-3 py-1 rounded">
            Trainen voor volwassenen
        </a>
        </div>
    </section>

    {{-- LAATSTE NIEUWS --}}
    <section class="bg-red-800 text-white py-12">
        <h1 class="text-center text-3xl font-bold mb-8">
            Laatste Nieuws & Updates
        </h1>
        <p class=" text-center text-1xl font-bold mb-8">Blijf op de hoogte van alles in en rond de club!</p>


        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-6">
            @foreach($latestNews as $news)
                <div class="bg-white text-black rounded p-4">
                    <img src="{{ asset('storage/' . $news->image) }}"
                         class="rounded mb-3 h-40 w-full object-cover">

                    <h3 class="font-bold mb-2">{{ $news->title }}</h3>
                    <p class="text-sm mb-3">
                        {{ Str::limit($news->content, 100) }}
                    </p>

                </div>
            @endforeach
        </div>
    </section>

@endsection
