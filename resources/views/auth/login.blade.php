<x-layout> 
    <h1 class="text-2xl font-bold text-center mt-8 mb-6">Login to your account</h1>

    {{-- Session Mesasges --}}
    @if (session('status'))
        <x-flashMsg msg="{{ session('status') }}" />
    @endif 

    <div class="mx-auto max-w-md bg-white p-6 rounded-xl shadow-2xl">

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 ring-red-500 @enderror" value="{{ old('email') }}">

                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 ring-red-500 @enderror">

                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}
                @enderror
            </div>

            {{-- Remember Checkbox and Forgot Password --}}
            <div class="mb-4 flex justify-between items-center text-sm">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="remember" class="text-gray-700">Remember Me</label>
                </div>

                <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                    Forgot your password?
                </a>
            </div>


                @error('failed')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}
                @enderror

            {{-- Submit Button --}}
            <div class="text-center">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</x-layout>
