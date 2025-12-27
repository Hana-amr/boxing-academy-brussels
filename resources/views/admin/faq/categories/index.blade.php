@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">FAQ-categorieën</h1>

    <a href="{{ route('admin.faq.categories.create') }}"
       class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded">
        + Nieuwe categorie
    </a>

    <a href="{{ route('admin.faq.items.create') }}"
       class="inline-block mb-4 ml-2 bg-green-700 text-white px-4 py-2 rounded">
        + Nieuwe FAQ-vraag
    </a>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse bg-white shadow">
        <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3 border">Categorie</th>
            <th class="p-3 border">Aantal vragen</th>
            <th class="p-3 border">Acties</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr class="border-t">
                <td class="p-3 border font-semibold">
                    {{ $category->name }}
                </td>

                <td class="p-3 border">
                    {{ $category->items_count }}
                </td>

                <td class="p-3 border">
                    <a href="{{ route('admin.faq.categories.edit', $category) }}"
                       class="bg-green-600 text-white px-3 py-1 rounded">
                        Bewerken
                    </a>

                    <form method="POST"
                          action="{{ route('admin.faq.categories.destroy', $category) }}"
                          class="inline-block"
                          onsubmit="return confirm('Categorie verwijderen? Alle vragen verdwijnen mee.');">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-3 py-1 rounded ml-2">
                            Verwijderen
                        </button>
                    </form>
                </td>
            </tr>

            {{-- FAQ ITEMS --}}
            @foreach($category->items as $item)
                <tr class="bg-gray-50">
                    <td class="p-3 border pl-8 text-sm">
                        • {{ $item->question }}
                    </td>
                    <td class="p-3 border text-sm">–</td>
                    <td class="p-3 border">
                        <a href="{{ route('admin.faq.items.edit', $item) }}"
                           class="bg-green-500 text-white px-2 py-1 rounded text-sm">
                            Bewerken
                        </a>

                        <form method="POST"
                              action="{{ route('admin.faq.items.destroy', $item) }}"
                              class="inline-block"
                              onsubmit="return confirm('FAQ-vraag verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded text-sm ml-1">
                                Verwijderen
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        @empty
            <tr>
                <td colspan="3" class="p-4 text-center text-gray-500">
                    Geen FAQ-categorieën gevonden.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
