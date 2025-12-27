@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Contactberichten</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse bg-white shadow">
        <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3 border">Naam</th>
            <th class="p-3 border">E-mail</th>
            <th class="p-3 border">Onderwerp</th>
            <th class="p-3 border">Datum</th>
            <th class="p-3 border">Acties</th>
        </tr>
        </thead>

        <tbody>
        @forelse($messages as $message)
            <tr class="border-t">
                <td class="p-3 border font-semibold">
                    {{ $message->name }}
                </td>

                <td class="p-3 border">
                    {{ $message->email }}
                </td>

                <td class="p-3 border">
                    {{ ucfirst($message->subject) }}
                </td>

                <td class="p-3 border">
                    {{ $message->created_at->format('d/m/Y H:i') }}
                </td>

                <td class="p-3 border">
                    <a href="{{ route('admin.contact.show', $message) }}"
                       class="bg-green-600 text-white px-3 py-1 rounded">
                        Bekijken
                    </a>

                    <form method="POST"
                          action="{{ route('admin.contact.destroy', $message) }}"
                          class="inline-block"
                          onsubmit="return confirm('Ben je zeker dat je dit bericht wil verwijderen?');">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-600 text-white px-3 py-1 rounded ml-2">
                            Verwijderen
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">
                    Geen contactberichten gevonden.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
