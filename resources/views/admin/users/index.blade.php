@extends('layouts.admin')

@section('content')

    <h1 class="text-2xl font-bold mb-6">Gebruikersbeheer</h1>
    <a href="{{ route('admin.users.create') }}"
       class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded">
        + Nieuwe gebruiker
    </a>

    <table class="w-full border-collapse bg-white shadow">
        <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3 border">Naam</th>
            <th class="p-3 border">Email</th>
            <th class="p-3 border">Admin</th>
            <th class="p-3 border">Actie</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="border-t">
                <td class="p-3 border">{{ $user->name }}</td>
                <td class="p-3 border">{{ $user->email }}</td>
                <td class="p-3 border">{{ $user->is_admin ? 'Ja' : 'Nee' }}</td>
                <td class="p-3 border">
                    <form method="POST" action="{{ route('admin.users.toggleAdmin', $user) }}">
                        @csrf
                        @method('PATCH')
                        <button class="bg-blue-600 text-white px-3 py-1 rounded">
                            {{ $user->is_admin ? 'Verwijder admin' : 'Maak admin' }}
                        </button>
                    </form>
                    <form method="POST"
                          action="{{ route('admin.users.destroy', $user) }}"
                          onsubmit="return confirm('Ben je zeker dat je deze gebruiker wil verwijderen?');">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-600 text-white px-3 py-1 rounded mt-2">
                            Verwijderen
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
