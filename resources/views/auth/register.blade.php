<x-layout> 
  <section 
    class="min-h-screen bg-cover bg-center pb-3"
    style="background-image: url('{{ asset('storage/assets/Flourish-Register.png') }}');"
  >
    <div class="flex justify-center pt-12">
      <div class="w-full max-w-md bg-white bg-opacity-90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-900">Register a new account</h1>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
          @csrf

          {{-- Username --}}
          <div>
            <label for="username" class="block font-medium text-gray-700 mb-1">Username</label>
            <input type="text" name="username" id="username"
              class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('username') border-red-500 ring-red-500 @enderror"
              value="{{ old('username') }}">
            @error('username')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Email --}}
          <div>
            <label for="email" class="block font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email"
              class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 ring-red-500 @enderror"
              value="{{ old('email') }}">
            @error('email')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Password --}}
          <div>
            <label for="password" class="block font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" id="password"
              class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 ring-red-500 @enderror">
            @error('password')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Confirm Password --}}
          <div>
            <label for="password_confirmation" class="block font-medium text-gray-700 mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
              class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
          </div>

          {{-- Subscribe Checkbox --}}
          <div class="flex items-center space-x-2">
            <input type="checkbox" name="subscribe" id="subscribe" class="rounded border-gray-300">
            <label for="subscribe" class="text-gray-700">Subscribe to our Newsletter</label>
          </div>

          {{-- Submit --}}
          <div class="text-center">
            <button type="submit" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-900 transition">Register</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-layout>
