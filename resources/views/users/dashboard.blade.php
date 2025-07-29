<x-layout> 
    <h1 class="title"> Hello {{ auth()->user()->username }}, you have {{ $posts ->total() }} posts</h1>

    {{-- Create Post Form --}}
    <div class=" card mb-4">
        <h2 class="font-bold mb-4"> Create a new post </h2>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Session Mesasges --}}
            @if (session('success'))
                <x-flashMsg msg="{{ session('success') }}" />
            @elseif (session('delete'))
                <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500"/>
            @endif 

            {{-- Post Title --}}
            <div>
                <label for="title" class="block font-medium text-gray-700 mb-1">Post Title</label>
                <input type="title" name="title" id="title" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('title') border-red-500 ring-red-500 @enderror" value="{{ old('title') }}">

                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}
                @enderror
            </div>

            {{-- Post Body --}}
            <div>
                <label for="body" class="block font-medium text-gray-700 mb-1">Post body</label>

                <textarea name="body" rows="6" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('body') border-red-500 ring-red-500 @enderror">{{ old('body') }}</textarea>

                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}
                @enderror
            </div>

            {{-- Post Image --}}
            <div class="mb-6">
                <label for="image">Cover Photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}
                @enderror
            </div>

             {{-- Submit Button --}}
            <div class="text-center mt-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Create</button>
            </div>

        </form>
    </div>

        {{--User Posts --}}
        <h2 class="font-bold mb-4">Your Latest Posts</h2>

            <div class="grid grid-cols-2 gap-6">
                @foreach ( $posts as $post )
                    <x-postCard :post="$post">

                        {{-- Update Post --}}
                        <a href="{{ route('posts.edit', $post) }}" class="bg-green-500 text-white px-2 py-1 text-xs rounded-md">Update</a>

                        {{-- Delete Post --}}
                        <form action="{{ route('posts.destroy',  $post) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 text-xs rounded-md">Delete</button>
                        </form>
                   </x-postCard>
                @endforeach
            </div>
            
        </div>

        <div>
            {{ $posts->links() }}
        </div>

</x-layout>



