@extends('layouts.app')

@section('content')
    <h1>Contact</h1>

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div>
            <label>Naam</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label>Onderwerp</label>
            <select name="subject">
                <option value="algemeen">Algemeen</option>
                <option value="inschrijving">Inschrijving</option>
                <option value="thaiboks dames">Thaiboks dames</option>
                <option value="jeugd Muay Thai">Jeugd Muay Thai</option>
                <option value="volwassenen">Volwassen</option>
                <option value="tarieven">Tarieven</option>
            </select>
        </div>
        <div>
            <label>Bericht</label>
            <textarea name="message">{{ old('message') }}</textarea>
        </div>
        <button type="submit">Verstuur</button>
    </form>
@endsection
