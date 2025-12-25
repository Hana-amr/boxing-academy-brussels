@extends('layouts.app')

@section('content')
    <h1>Nieuws</h1>
    @foreach($news as $item)
        <div class="border p-2 mb-2">
            <h2><a href="{{ route('news.show', $item) }}">{{ $item->title }}</a></h2>
            <p>{{ Str::limit($item->content, 150) }}</p>
        </div>
    @endforeach

    {{ $news->links() }}
@endsection
