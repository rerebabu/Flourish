<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex bg-gray-200">

        {{-- Sidebar --}}
        <aside class="w-64 bg-black text-white flex flex-col justify-between">
            <div>
                <div class="p-6 text-2xl font-bold border-b border-gray-800">
                    Flourish 
                    <p>Admin Panel</p>
                </div>

                <nav class="mt-6 px-4 space-y-2 text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Dashboard</a>

                    {{-- Dropdown: Accounts --}}
                    <div x-data="{ open: false }" class="space-y-1">
                        <button @click="open = !open" class="flex justify-between items-center w-full py-2 px-3 rounded hover:bg-gray-800">
                            <span>Accounts</span>
                            <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" class="ml-4 space-y-1" x-cloak>
                            <a href="{{ route('admin.users.index') }}" class="block py-1 px-2 rounded hover:bg-gray-700">User Accounts</a>
                            <a href="{{ route('admin.users.index') }}" class="block py-1 px-2 rounded hover:bg-gray-700">Admin Accounts</a>
                        </div>
                    </div>

                    {{-- Dropdown: Blog Management --}}
                    <div x-data="{ open: false }" class="space-y-1">
                        <button @click="open = !open" class="flex justify-between items-center w-full py-2 px-3 rounded hover:bg-gray-800">
                            <span>Blog Management</span>
                            <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" class="ml-4 space-y-1" x-cloak>
                            <a href="{{ route('admin.users.index') }}" class="block py-1 px-2 rounded hover:bg-gray-700">All Posts</a>
                            <a href="{{ route('admin.categories.index') }}" class="block py-1 px-2 rounded hover:bg-gray-700">Post Categories</a>
                            <a href="{{ route('admin.tags.index') }}" class="block py-1 px-2 rounded hover:bg-gray-700">Post Tags</a>
                        </div>
                    </div>

                    <a href="{{ route('admin.users.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Settings</a>
                </nav>
            </div>
            {{-- Logout Button --}}
                <div class="p-4 border-t">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button 
                        type="submit" 
                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100 rounded-md transition"
                    >
                        Logout
                    </button>
                </form>

            {{-- Footer --}}
            <div class="p-4 border-t border-gray-800 text-xs text-gray-400">
                &copy; {{ now()->year }} Flourish Admin
            </div>
        </aside>

        {{ $slot }}
    </div>
</body>
</html>
