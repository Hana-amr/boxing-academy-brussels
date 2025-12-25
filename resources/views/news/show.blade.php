@extends('layouts.app')

@section('content')
    <h1>{{ $news->title }}</h1>
    <p>{{ $news->content }}</p>
    <p><small>Gepubliceerd op {{ $news->published_at }}</small></p>

    <h3>Comments</h3>
    @foreach($news->comments as $comment)
        <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
    @endforeach
@endsection
