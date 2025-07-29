<x-layout> 
    <h1 class="text-2xl font-bold text-center mt-8 mb-6">Request a password reset email</h1>

    {{-- Session Mesasges --}}
    @if (session('status'))
        <x-flashMsg msg="{{ session('status') }}" />
    @endif 

    <div class="mx-auto max-w-md bg-white p-6 rounded-xl shadow-2xl">
        <form action="{{ route('password.request') }}" method="POST" x-data="formSubmit" @submit.prevent="submit" class="space-y-4">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 ring-red-500 @enderror" value="{{ old('email') }}">

                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="text-center">
                <button type="submit" class="btn" x-ref="btn">Submit Request</button>
            </div>
        </form>
    </div>
</x-layout>
