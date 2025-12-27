@extends('admin.dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tarief bewerken</h1>

    <form method="POST" action="{{ route('admin.prices.update', $price) }}">
        @csrf
        @method('PUT')

        {{-- Doelgroep --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Doelgroep</label>
            <select name="target_group" class="form-control">
                <option value="kinderen" {{ $price->target_group === 'kinderen' ? 'selected' : '' }}>Kinderen</option>
                <option value="dames" {{ $price->target_group === 'dames' ? 'selected' : '' }}>Dames</option>
                <option value="volwassenen" {{ $price->target_group === 'volwassenen' ? 'selected' : '' }}>Volwassenen</option>
            </select>
        </div>

        {{-- Periode --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Periode</label>
            <select name="period" class="form-control">
                <option value="maandelijks" {{ $price->period === 'maandelijks' ? 'selected' : '' }}>Maandelijks</option>
                <option value="trimestrieel" {{ $price->period === 'trimestrieel' ? 'selected' : '' }}>Trimestrieel</option>
                <option value="semestrieel" {{ $price->period === 'semestrieel' ? 'selected' : '' }}>Semestrieel</option>
                <option value="jaarlijks" {{ $price->period === 'jaarlijks' ? 'selected' : '' }}>Jaarlijks</option>
            </select>
        </div>

        {{-- Prijzen --}}
        <div class="mb-4">
            <label>Abonnement (€)</label>
            <input type="number" step="0.01" name="subscription_price"
                   value="{{ old('subscription_price', $price->subscription_price) }}"
                   class="form-control">
        </div>

        <div class="mb-4">
            <label>Verzekering (€)</label>
            <input type="number" step="0.01" name="insurance_price"
                   value="{{ old('insurance_price', $price->insurance_price) }}"
                   class="form-control">
        </div>

        <div class="mb-6">
            <label>Lidkaart (€)</label>
            <input type="number" step="0.01" name="card_price"
                   value="{{ old('card_price', $price->card_price) }}"
                   class="form-control">
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
