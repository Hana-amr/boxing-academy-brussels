@extends('layouts.app')

@section('content')
    <h1>Tarieven</h1>

    <table class="border-collapse border border-gray-400">
        <thead>
        <tr>
            <th>Doelgroep</th>
            <th>Periode</th>
            <th>Abonnementsprijs</th>
            <th>Verzekering</th>
            <th>Lidkaart</th>
            <th>Totaal eerste jaar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($prices as $price)
            <tr>
                <td>{{ $price->target_group }}</td>
                <td>{{ $price->period }}</td>
                <td>{{ $price->subscription_price }} €</td>
                <td>{{ $price->insurance_price }} €</td>
                <td>{{ $price->card_price }} €</td>
                <td>{{ $price->subscription_price + $price->insurance_price + $price->card_price }} €</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
