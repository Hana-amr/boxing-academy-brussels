@extends('layouts.app')

@section('content')

    <section class="max-w-6xl mx-auto py-20 grid md:grid-cols-2 gap-16">

        {{-- LINKERKANT: FORMULIER --}}
        <div>
            <h1 class="text-4xl font-bold mb-10 text-black">
                Neem nu contact met ons op!
            </h1>

            @if(session('success'))
                <div class="bg-green-600 text-white p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <input
                        type="text"
                        name="name"
                        placeholder="Naam en voornaam"
                        value="{{ old('name') }}"
                        class="w-full p-3 rounded bg-white-800 text-black"
                    >

                    <input
                        type="email"
                        name="email"
                        placeholder="E-mail"
                        value="{{ old('email') }}"
                        class="w-full p-3 rounded bg-white-800 text-black"
                    >
                </div>

                <select
                    name="subject"
                    class="w-full p-3 rounded bg-white-800 text-black"
                >
                    <option value="">Onderwerp</option>
                    <option value="algemeen">Algemene vraag</option>
                    <option value="inschrijving">Inschrijving</option>
                    <option value="tarieven">Tarieven</option>
                    <option value="trainingen">Trainingen</option>
                    <option value="gratis">Gratis proefles</option>
                    <option value="andere">Andere vraag</option>
                </select>

                <textarea
                    name="message"
                    rows="6"
                    placeholder="Bericht"
                    class="w-full p-3 rounded bg-white-800 text-black"
                >{{ old('message') }}</textarea>

                <button
                    type="submit"
                    class="bg-green-700 hover:bg-green-600 text-white px-8 py-3 rounded"
                >
                    Verzenden
                </button>
            </form>
        </div>

        {{-- RECHTERKANT: INFO --}}
        <div class="text-black">
            <br>
            <br>
            <h2 class="text-2xl font-bold mb-4">Vragen?</h2>
            <p>
                Wij helpen je graag. Vul het formulier in en je ontvangt
                zo snel mogelijk een reactie van ons team.
            </p>
            <br>
            <br>
            <h2 class="text-2xl font-bold mb-4">Ontdek Thaiboksen met een Gratis Proefles!</h2>

            <p>
                Bij Boxing Academy Brussels ervaar je de kracht en passie van Thaiboksen tijdens een gratis en vrijblijvende proefles.
                Onze lessen zijn toegankelijk voor iedereen, met aparte dameslessen (Ladies Only) en speciale trainingen voor kinderen.
                <br>
                <br>
                <h2 class="font-bold">Waarom wachten?</h2>
                Profiteer van een gratis kennismaking om de sfeer en training zelf te ervaren.
                Onze lessen zijn geschikt voor elk niveau, of je nu beginner of gevorderd bent.
                Voor dames bieden we een ‘safe space’ met eigen lessen onder begeleiding van vrouwelijke trainers.
                En ook voor de jeugd hebben we speciale lessen,
                waar sportiviteit en discipline centraal staan.
                <br>
                <br>
                Doe mee, groei sterker en verleg je grenzen! Vul het formulier in en reserveer direct je plek.
                Begin vandaag nog jouw ontdekkingsreis naar meer energie, zelfvertrouwen en plezier.
                Meld je nú aan voor je gratis proefles! </p>
        </div>

    </section>

@endsection
