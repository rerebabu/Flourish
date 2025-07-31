<x-layout> 

    <section 
        class="min-h-screen bg-cover bg-center px-4 pt-24 flex justify-center">
    <div class="flex justify-center">
      <div class="w-full max-w-md bg-white bg-opacity-90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-900">Forgot your Password?</h1>

            {{-- Instruction --}}
            <p class="text-sm text-gray-600 text-center mb-6">
                Enter your email and we’ll send you a link to reset your password.
            </p>

            {{-- Flash Message --}}
            @if (session('status'))
                <x-flashMsg msg="{{ session('status') }}" />
            @endif 

            {{-- Form --}}
            <form 
                action="{{ route('password.request') }}" 
                method="POST" 
                x-data="formSubmit" 
                @submit.prevent="submit" 
                class="space-y-5"
            >
                @csrf

                {{-- Email Field --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 placeholder-gray-400 focus:outline-none focus:border-black focus:ring-0 transition @error('email') border-red-500 @enderror" 
                        placeholder="you@example.com"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="text-center">
                    <button 
                        type="submit" 
                        class="bg-black text-white px-6 py-2 rounded-md font-medium hover:bg-gray-900 transition"
                        x-ref="btn"
                    >
                        Send Reset Link
                    </button>
                </div>
            </form>
            </div>
        </div>
    </section>

</x-layout>
