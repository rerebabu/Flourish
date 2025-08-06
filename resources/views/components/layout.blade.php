<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-black pb-20">

    {{-- Navigation Bar --}}
    <header class="border-b border-gray-200 stick top-0 z-50 bg-white">
        <nav class="flex items-center justify-between max-w-7xl mx-auto px-6 py-4 font-inter">
            <div class="text-lg font-semibold">
            <a href="{{ route('posts.index') }}">Flourish</a>
            </div>

            @auth
                <div class="relative grid place-items-center round-btn" x-data="{ open: false }">
                {{-- Dropdown Menu Button --}}
                <button @click="open = !open"  type="button" class="round-btn"> 
                    <img src="https://picsum.photos/200" alt="" class="w-10 h-10 rounded-full object-cover">
                </button>

                {{-- Dropdown Menu --}}
                <div 
                    x-show="open" @click.outside="open=false"
                    x-transition
                    class="bg-white shadow-xl absolute top-full mt-2 right-0 rounded-lg overflow-hidden font-light text-black w-44 z-50 border border-gray-200"
                >
                    <p class="px-4 py-2 text-sm font-semibold text-gray-800 username"> {{ auth()->user()->username }}</p>
                    <a href=" {{ route('dashboard') }}" class="block hover:bg-slate-100 px-4 py-2 text-sm">Dashboard</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="block w-full text-left hover:bg-slate-100 pl-4 pr-8 py-2">Logout</button>
                    </form>

                </div>
            </div>

            @endauth

            @guest
                <ul class="flex space-x-4">
                <li><a href="#about"
                class="hover:text-gray-300">About</a></li>
                <li><a href="{{ route ('login') }}" class="hover:text-gray-300">Login</a></li>
                <li><a href="{{ route ('register') }}" class="hover:text-gray-300">Register</a></li>
            </ul>
            @endguest
            
        </nav>
    </header>

    <main class="p-4">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class=" inset-x-0 text-center text-xs text-white py-4 border-t border-gray-800 bg-black z-50">
    <p>&copy; {{ date('Y') }} Flourish — Crafted for the literary mind ✒️</p>
    </footer>


    <script>
        // Set form: x-data="formSubmit" @submit.prevent="submit" and button: x-ref="btn"
        document.addEventListener('alpine:init', () => {
            Alpine.data('formSubmit', () => ({
                submit() {
                    this.$refs.btn.disabled = true;
                    this.$refs.btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                    this.$refs.btn.classList.add('bg-indigo-400');
                    this.$refs.btn.innerHTML =
                        `<span class="absolute left-2 top-1/2 -translate-y-1/2 transform">
                        <i class="fa-solid fa-spinner animate-spin"></i>
                        </span>Please wait...`;

                    this.$el.submit()
                }
            }))
        })
    </script>
</body>
</html>

