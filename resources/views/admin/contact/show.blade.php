@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Contactbericht</h1>

    <div class="bg-white shadow rounded p-6 max-w-3xl">

        <p class="mb-2">
            <strong>Naam:</strong> {{ $contactMessage->name }}
        </p>

        <p class="mb-2">
            <strong>E-mail:</strong> {{ $contactMessage->email }}
        </p>

        <p class="mb-4">
            <strong>Onderwerp:</strong> {{ ucfirst($contactMessage->subject) }}
        </p>

        <div class="border-t pt-4">
            <p class="font-semibold mb-2">Bericht:</p>
            <p class="whitespace-pre-line">
                {{ $contactMessage->message }}
            </p>
        </div>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('admin.contact.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded">
                Terug
            </a>

            <form method="POST"
                  action="{{ route('admin.contact.destroy', $contactMessage) }}"
                  onsubmit="return confirm('Bericht definitief verwijderen?');">
                @csrf
                @method('DELETE')

                <button class="bg-red-600 text-white px-4 py-2 rounded">
                    Verwijderen
                </button>
            </form>
        </div>

    </div>

@endsection
