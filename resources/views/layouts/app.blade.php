<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Boxing Academy Brussels</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    <header class="bg-white shadow p-4">
        <nav>
            <a href="{{ route('home') }}">Home</a> |
            <a href="{{ route('news.index') }}">Nieuws</a> |
            <a href="{{ route('faq.index') }}">FAQ</a> |
            <a href="{{ route('prices.index') }}">Tarieven</a> |
            <a href="{{ route('contact.index') }}">Contact</a>
        </nav>
        <div>
            @guest
                <a href="{{ route('login') }}" class="mr-4">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @else
                <span class="mr-4">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endguest
        </div>
    </header>

    <main class="p-4">
        @yield('content')

    </main>

</div>
</body>
<footer>Boxing Academy Brussels | By Hana Amrani</footer>

</html>
