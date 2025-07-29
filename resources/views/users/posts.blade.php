<x-layout>

    <h1 class="title">{{ $user->username }}'s Posts &#9829; {{ $posts->total() }} </h1>

    {{-- User's Posts --}}

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-6 md:px-12">
      
      @foreach ($posts as $post)
         <x-postCard :post="$post" />
      @endforeach
   </div>

   <div>
      {{ $posts->links() }}
   </div>

</x-layout>