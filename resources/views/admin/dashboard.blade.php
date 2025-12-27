@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Admin dashboard</h1>

    <p>Welkom, {{ auth()->user()->name }} !</p>
    <br>
    <br>
            <a href="{{ route('admin.users.index') }}" class="bg-blue-600 text-white px-3 py-1 rounded">
                Gebruikersbeheer
            </a>
    <br>
    <br>

        <a href="{{ route('admin.prices.index') }}" class="bg-blue-600 text-white px-3 py-1 rounded">Tarieven beheren</a>
    <br>
    <br>
    <a href="{{ route('admin.news.index') }}" class="bg-blue-600 text-white px-3 py-1 rounded">Nieuwsbeheer</a>


@endsection
