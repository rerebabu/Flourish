<x-layout> 
    <h1 class="text-2xl font-bold text-center mt-8 mb-6">Reset your Password</h1>

    <div class="mx-auto max-w-md bg-white p-6 rounded-xl shadow-2xl">

        <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

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

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            {{-- Submit Button --}}
            <div class="text-center">
                <button type="submit" class="btn">Reset Password</button>
            </div>
        </form>
    </div>
</x-layout>
