@extends('layouts.app')

@section('content')

    <div class="max-w-4xl mx-auto">

        {{-- TITEL --}}
        <h1 class="text-4xl font-extrabold mb-6">
            {{ $news->title }}
        </h1>

        {{-- AFBEELDING --}}
        @if($news->image)
            <div class="w-64 aspect-square mb-8 overflow-hidden rounded-lg">
                <img src="{{ asset('storage/' . $news->image) }}"
                     class="w-full h-full object-cover">
            </div>
        @endif

        {{-- CONTENT --}}
        <p class="text-lg leading-relaxed mb-6">
            {{ $news->content }}
        </p>

        {{-- DATUM --}}
        <p class="text-sm text-gray-500 mb-8">
            Gepubliceerd op {{ \Carbon\Carbon::parse($news->published_at)->format('d/m/Y') }}
        </p>

        {{-- ❤️ LIKES --}}
        <div class="flex items-center gap-4 mb-8">
        <span class="font-semibold">
            ❤️ {{ $news->likes->count() }} likes
        </span>

            @auth
                <form method="POST" action="{{ route('news.like', $news) }}">
                    @csrf
                    <button
                        class="px-4 py-2 rounded text-white
                    {{ $news->likes->contains('id', auth()->id()) ? 'bg-red-600' : 'bg-gray-600' }}">
                        {{ $news->likes->contains('id', auth()->id()) ? 'Unlike' : 'Like' }}
                    </button>
                </form>
            @endauth

            @guest
                <span class="text-sm text-gray-500">
                Likes zijn enkel beschikbaar voor leden.
            </span>
            @endguest
        </div>

        {{-- 💬 COMMENTS --}}
        <h3 class="text-2xl font-bold mb-4">
            Reacties ({{ $news->comments->count() }})
        </h3>

        @auth
            <form method="POST"
                  action="{{ route('news.comments.store', $news) }}"
                  class="mb-6">
                @csrf

                <textarea
                    name="content"
                    rows="3"
                    class="w-full border rounded p-3 mb-2"
                    placeholder="Schrijf een reactie..."
                ></textarea>

                <button class="bg-green-600 text-white px-4 py-2 rounded">
                    Plaatsen
                </button>
            </form>
        @endauth

        @guest
            <p class="text-sm text-gray-500 mb-6">
                Reacties zijn enkel mogelijk voor leden.            </p>
        @endguest

        @forelse($news->comments as $comment)
            <div class="border rounded p-4 mb-3 bg-gray-50">
                <p class="font-semibold text-red-600">
                    <a href="{{ route('users.show', $comment->user) }}">
                        {{ $comment->user->name }}
                    </a>
                </p>
                <p>{{ $comment->content }}</p>
            </div>
        @empty
            <p class="text-gray-500">
                Er zijn nog geen reacties.
            </p>
        @endforelse

    </div>

@endsection
