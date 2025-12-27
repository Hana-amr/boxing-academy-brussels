@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Nieuwsbeheer</h1>

    <a href="{{ route('admin.news.create') }}"
       class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded">
        + Nieuw nieuwsitem
    </a>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse bg-white shadow">
        <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3 border">Titel</th>
            <th class="p-3 border">Auteur</th>
            <th class="p-3 border">Datum</th>
            <th class="p-3 border">Acties</th>
        </tr>
        </thead>

        <tbody>
        @forelse($news as $item)
            <tr class="border-t">
                <td class="p-3 border font-semibold">{{ $item->title }}</td>
                <td class="p-3 border">{{ $item->user->name ?? 'Onbekend' }}</td>
                <td class="p-3 border">
                    {{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}
                </td>
                <td class="p-3 border">
                    <a href="{{ route('admin.news.edit', $item) }}"
                       class="bg-green-600 text-white px-3 py-1 rounded">
                        Bewerken
                    </a>

                    <form method="POST"
                          action="{{ route('admin.news.destroy', $item) }}"
                          class="inline-block"
                          onsubmit="return confirm('Ben je zeker?');">
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
                <td colspan="4" class="p-4 text-center text-gray-500">
                    Geen nieuwsitems gevonden.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
