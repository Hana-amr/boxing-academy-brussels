<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Boxing Academy Brussels</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

<div class="min-h-screen">

    <header class="bg-black shadow p-4">
        <nav class="container mx-auto flex items-center justify-between">

            {{-- Linkse titel --}}
            <div class="text-white font-serif italic text-lg select-none">
                Boxing Academy Brussels
            </div>

            {{-- Middelste menu --}}
            <ul class="flex space-x-3">
                <li>
                    <a href="{{ route('home') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('news.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                        Nieuws
                    </a>
                </li>
                <li>
                    <a href="{{ route('faq.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                        FAQ
                    </a>
                </li>
                <li>
                    <a href="{{ route('prices.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                        Tarieven
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                        Contact
                    </a>
                </li>
                <li>
                    <a href="{{ route('profiles.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                        Profielen</a>
                </li>
            </ul>
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}"
                       class="bg-gray-800 text-white px-3 py-1 rounded mr-3">
                        Dashboard
                    </a>
                @endif
            @endauth
            {{-- Rechtse login/registreer knoppen --}}
            <div class="flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}"
                       class="bg-green-900 hover:bg-green-800 text-white px-4 py-2 rounded-md transition">
                        Log in
                    </a>                    <a href="{{ route('register') }}" class="bg-green-600 px-3 py-1 rounded text-white">
                        Registreer
                    </a>
                @else
                    <a href="{{ route('users.show', Auth::user()) }}"
                       class="bg-green-900 hover:bg-green-800 text-white px-4 py-2 rounded-md transition">
                        Mijn profiel
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="bg-red-600 px-3 py-1 rounded text-white">
                            Logout
                        </button>
                    </form>
                @endguest
            </div>


        </nav>
    </header>

    <main class="p-4 container mx-auto">
        @yield('content')
    </main>

</div>

<footer class="text-center p-4 text-gray-500 text-sm select-none">
    Boxing Academy Brussels | By Hana Amrani
</footer>

</body>
</html>
