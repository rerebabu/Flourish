<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white-900 text-dark">
    <header>
        <nav class="bg-gray-800 text-white px-4 py-3 flex items-center justify-between">
            <div class="text-lg font-semibold">
                {{ env('APP_NAME', 'Navbar') }}
            </div>
            <ul class="flex space-x-4">
                <li><a href="{{ route ('home') }}"
                class="hover:text-gray-300">Home</a></li>
                <li><a href="#" class="hover:text-gray-300">About</a></li>
                <li><a href="{{ route ('register') }}" class="hover:text-gray-300">Register</a></li>
            </ul>
        </nav>
    </header>

    <main class="p-4">
        {{ $slot }}
    </main>
</body>
</html>
