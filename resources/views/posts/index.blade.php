<x-layout> 
   <h1 class="text-3xl font-bold text-center mt-8 mb-6">Latest Posts</h1>

   {{-- Lists of Post --}}
   <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-6 md:px-12">
      
      @foreach ($posts as $post)
         <x-postCard :post="$post" />
      @endforeach
   </div>

   <div>
      {{ $posts->links() }}
   </div>
</x-layout>
