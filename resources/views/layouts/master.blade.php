<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-white shadow p-4 flex justify-between">

    <div class="font-bold text-lg">
        Sistem Arsip Surat
    </div>

    <div class="flex items-center gap-4">

        <!-- Nama User Login -->
        <span>
            {{ Auth::user()->name }}
        </span>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-500 text-white px-3 py-1 rounded">
                Logout
            </button>
        </form>

    </div>

</nav>

<!-- Content -->
<div class="container mx-auto mt-6">
    @yield('content')
</div>

</body>
</html>