@extends('layouts.app')

@section('content')
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


    <p class="text-lg leading-relaxed mb-6">
        {{ $news->content }}
    </p>
    <p class="text-sm text-gray-500 mb-10">
        Gepubliceerd op {{ \Carbon\Carbon::parse($news->published_at)->format('d/m/Y') }}
    </p>
    <div class="mt-6 flex items-center gap-4">

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
            Log in om dit nieuws te liken
        </span>
        @endguest

    </div>


    <h3>Comments</h3>

    @forelse($news->comments as $comment)
        <p>
            <a href="{{ route('users.show', $comment->user) }}"
               class="font-semibold text-red-600">
                {{ $comment->user->name }}
            </a>:
            {{ $comment->content }}
        </p>
    @empty
        <p>Er zijn nog geen reacties.</p>
    @endforelse

@endsection
