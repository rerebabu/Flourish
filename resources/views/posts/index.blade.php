<x-layout>

   {{-- Hero Section --}}
   <section class="bg-[#fdfaf4] border-b border-[#e5e0d6] py-20">
      <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between px-6 gap-6">
         
         {{-- Text Content --}}
      <div class="w-full lg:w-1/2">
         <h1 class="text-5xl lg:text-6xl font-serif leading-tight text-black mb-6">
            Nurture your voice, and let your thoughts <span class="italic">Flourish</span>.
         </h1>
         <p class="text-lg text-gray-700 mb-8 leading-relaxed">
            A quiet space where words take root—where every thought you write helps something grow. At Flourish, your voice matters. It's not just expression, but a way to connect, create, and come home to yourself.
         </p>
         <a href="{{ route('register') }}" class="inline-block bg-black text-white text-sm px-6 py-3 rounded-full font-semibold hover:bg-gray-900 transition">
            Start writing
         </a>
      </div>


         {{-- Illustration or Brand Graphic --}}
         <div class="hidden lg:block w-full lg:w-[55%] max-w-lg">
         <img src="{{ asset('storage/assets/Flourish-Welcome.png') }}" alt="Flourish-Welcome Page" class="w-full object-contain opacity-90">
         </div>

      </div>
   </section>

   {{-- Section Title --}}
   <section class="mt-20 mb-8 text-center">
      <h2 class="text-3xl font-serif font-bold text-gray-900">Latest Posts</h2>
      <p class="mt-2 text-base text-gray-600"> Discover thoughtful writing and fresh ideas from the community.</p>
   </section>

   {{-- Post List --}}
   <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach ($posts as $post)
         <x-postCard :post="$post" />
      @endforeach
   </div>

   {{-- Pagination --}}
   <div class="mt-16 flex justify-center">
   {{ $posts->links() }}
   </div>

   {{-- About Section --}}
   <section id="about" class="py-20 bg-[#fdfaf4] border-t border-[#e5e0d6]">
      <div class="max-w-5xl mx-auto px-6 text-center">
         <h2 class="text-3xl font-serif font-bold text-gray-900 mb-4">About Flourish</h2>
         <p class="text-lg text-gray-700 leading-relaxed">
            Flourish is a space for thoughtful writing, reflection, and timeless design.
            We believe in the power of stories and shared ideas to inspire growth.
            Whether you're a reader or a writer, you're welcome here.
         </p>

         <p class="text-sm text-gray-500 italic">
         Created with care by <span class="font-semibold text-gray-700">Reynalyn R. Bawag</span>
         </p>
      </div>
   </section>


</x-layout>
