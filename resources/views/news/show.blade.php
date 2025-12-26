@extends('layouts.app')

@section('content')

    <h1>{{ $news->title }}</h1>
    <p>{{ $news->content }}</p>
    <p><small>Gepubliceerd op {{ $news->published_at }}</small></p>

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
