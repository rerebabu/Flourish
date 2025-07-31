<x-layout>

  <div class="min-h-screen bg-cover bg-center pt-6">

    <div class="flex justify-center">
    <section class="w-full max-w-xl text-center card">
      {{-- Heading --}}
      <h1 class="text-3xl font-serif mb-4">Verify Your Email</h1>

      {{-- Instruction --}}
      <p class="text-base text-gray-600 mb-6">
        We’ve sent a verification link to your email address.  
        Please check your inbox and click the link to activate your account.
      </p>

      {{-- Secondary Prompt --}}
      <p class="text-sm text-gray-500 mb-4">
        Didn’t receive anything?
      </p>

      {{-- Resend Form --}}
      <form action="{{ route('verification.send') }}" method="POST" class="inline-block">
        @csrf
        <button type="submit" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-900 transition">
          Resend Verification Email
        </button>
      </form>
    </section>
    </div>
  </div>

</x-layout>
