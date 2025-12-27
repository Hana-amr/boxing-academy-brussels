@extends('admin.dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Nieuw tarief toevoegen</h1>

    <form method="POST" action="{{ route('admin.prices.store') }}">
        @csrf

        {{-- Doelgroep --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Doelgroep</label>
            <select name="target_group" class="form-control">
                <option value="">-- Kies doelgroep --</option>
                <option value="kinderen">Kinderen</option>
                <option value="dames">Dames</option>
                <option value="volwassenen">Volwassenen</option>
            </select>
            @error('target_group')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
        </div>

        {{-- Periode --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Periode</label>
            <select name="period" class="form-control">
                <option value="">-- Kies periode --</option>
                <option value="maandelijks">Maandelijks</option>
                <option value="trimestrieel">Trimestrieel</option>
                <option value="semestrieel">Semestrieel</option>
                <option value="jaarlijks">Jaarlijks</option>
            </select>
            @error('period')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
        </div>

        {{-- Prijzen --}}
        <div class="mb-4">
            <label>Abonnement (€)</label>
            <input type="number" step="0.01" name="subscription_price" class="form-control">
        </div>

        <div class="mb-4">
            <label>Verzekering (€)</label>
            <input type="number" step="0.01" name="insurance_price" class="form-control">
        </div>

        <div class="mb-6">
            <label>Lidkaart (€)</label>
            <input type="number" step="0.01" name="card_price" class="form-control">
        </div>

        <button type="submit"
                class="bg-green-600 text-white px-6 py-2 rounded">
            Bijwerken
        </button>        <a href="{{ route('admin.prices.index') }}"
                            class="bg-red-600 text-white px-6 py-2 rounded">
            Annuleren
        </a>
    </form>
@endsection
