<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white-900 text-dark">
    <header>
        <nav class="bg-gray-800 text-white px-4 py-3 flex items-center justify-between">
            <div class="text-lg font-semibold">
            <a href="{{ route('posts.index') }}">{{ env('APP_NAME', 'Navbar') }}</a>
            </div>

            @auth
                <div class="relative grid place-items-center" x-data="{ open: false }">
                {{-- Dropdown Menu Button --}}
                <button @click="open = !open"  type="button" class="round-btn"> 
                    <img src="https://picsum.photos/200" alt="">
                </button>

                {{-- Dropdown Menu --}}
                <div 
                    x-show="open" @click.outside="open=false"
                    x-transition
                    class="bg-white shadow-lg absolute top-12 right-0 rounded-lg overflow-hidden font-light text-black w-40"
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
                <li><a href="{{ route ('posts.index') }}"
                class="hover:text-gray-300">Home</a></li>
                <li><a href="{{ route ('login') }}" class="hover:text-gray-300">Login</a></li>
                <li><a href="{{ route ('register') }}" class="hover:text-gray-300">Register</a></li>
            </ul>
            @endguest
            
        </nav>
    </header>

    <main class="p-4">
        {{ $slot }}
    </main>

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
