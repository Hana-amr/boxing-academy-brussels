@extends('layouts.admin')

@section('content')

    {{-- TITEL --}}
    <h1 class="text-3xl font-bold mb-6">Tarievenbeheer</h1>

    {{-- NIEUW TARIEF --}}
    <a href="{{ route('admin.prices.create') }}"
       class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded">
        + Nieuw tarief
    </a>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABEL --}}
    <table class="w-full border-collapse bg-white shadow">
        <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3 border">Doelgroep</th>
            <th class="p-3 border">Periode</th>
            <th class="p-3 border">Abonnement (€)</th>
            <th class="p-3 border">Verzekering (€)</th>
            <th class="p-3 border">Lidkaart (€)</th>
            <th class="p-3 border">Acties</th>
        </tr>
        </thead>

        <tbody>
        @forelse($prices as $price)
            <tr class="border-t">
                <td class="p-3 border font-semibold">
                    {{ ucfirst($price->target_group) }}
                </td>

                <td class="p-3 border">
                    {{ ucfirst($price->period) }}
                </td>

                <td class="p-3 border">
                    €{{ number_format($price->subscription_price, 2) }}
                </td>

                <td class="p-3 border">
                    €{{ number_format($price->insurance_price, 2) }}
                </td>

                <td class="p-3 border">
                    €{{ number_format($price->card_price, 2) }}
                </td>

                <td class="p-3 border">
                    {{-- BEWERKEN --}}
                    <a href="{{ route('admin.prices.edit', $price) }}"
                       class="inline-block bg-green-600 text-white px-3 py-1 rounded">
                        Bewerken
                    </a>

                    {{-- VERWIJDEREN --}}
                    <form method="POST"
                          action="{{ route('admin.prices.destroy', $price) }}"
                          class="inline-block"
                          onsubmit="return confirm('Ben je zeker dat je dit tarief wil verwijderen?');">
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
                <td colspan="6" class="p-4 text-center text-gray-500">
                    Geen tarieven gevonden.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
