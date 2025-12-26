<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">

<nav class="bg-gray-900 text-white p-4 flex gap-4">
    <a href="{{ route('admin.dashboard') }}"
       class="bg-gray-700 px-3 py-1 rounded">
        Dashboard
    </a>

    <a href="{{ route('home') }}"
       class="bg-green-900 px-3 py-1 rounded">
        Website
    </a>
</nav>


<main class="p-8">
    @yield('content')
</main>

</body>
</html>
