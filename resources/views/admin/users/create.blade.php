@extends('layouts.admin')

@section('content')

    <h1 class="text-2xl font-bold mb-6">Nieuwe gebruiker aanmaken</h1>

    <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4 max-w-md">
        @csrf

        <input type="text" name="name" placeholder="Naam"
               class="w-full border p-2">

        <input type="email" name="email" placeholder="Email"
               class="w-full border p-2">

        <input type="password" name="password" placeholder="Wachtwoord"
               class="w-full border p-2">

        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_admin">
            Admin maken
        </label>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Gebruiker aanmaken
        </button>

        <a href="{{ route('admin.users.index') }}"
           class="ml-4 text-gray-600">
            Annuleren
        </a>
    </form>

@endsection
