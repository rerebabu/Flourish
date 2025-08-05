<x-layout> 
  <section 
    class="min-h-screen bg-cover bg-center"
    style="background-image: url('{{ asset('storage/assets/Flourish-Login.png') }}');"
  >
    <div class="flex justify-center pt-12">
      <div class="w-full max-w-md bg-white bg-opacity-90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-900">Login to your account</h1>

        {{-- Session Messages --}}
        @if (session('status'))
          <x-flashMsg msg="{{ session('status') }}" />
        @endif

        {{-- 👇 Add this block above your login form --}}
        <div class="mb-6 text-center">
          <div class="flex justify-center gap-4">
              <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
                  Login as User
              </a>
              <a href="{{ route('admin.login') }}" class="bg-gray-200 text-black px-4 py-2 rounded hover:bg-gray-300 transition">
                  Login as Admin
              </a>
          </div>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
          @csrf

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

          {{-- Remember & Forgot --}}
          <div class="mb-4 flex justify-between items-center text-sm">
            <div class="flex items-center space-x-2">
              <input type="checkbox" name="remember" id="remember"
                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
              <label for="remember" class="text-gray-700">Remember Me</label>
            </div>
            <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
              Forgot your password?
            </a>
          </div>

          @error('failed')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror

          {{-- Submit --}}
          <div class="text-center">
            <button type="submit" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-900 transition">Login</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-layout>
