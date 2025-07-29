<x-layout>

    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500"> &larr; Go Back to your Dashboard</a>

    {{-- Update Form Card --}}
    <div class=" card mb-2">
        <h2 class="font-bold mb-4"> Update your post </h2>

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Post Title --}}
            <div>
                <label for="title" class="block font-medium text-gray-700 mb-1">Post Title</label>
                <input type="title" name="title" id="title" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('title') border-red-500 ring-red-500 @enderror" value="{{ $post->title }}">

                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}
                @enderror
            </div>

            {{-- Post Body --}}
            <div>
                <label for="body" class="block font-medium text-gray-700 mb-1">Post body</label>

                <textarea name="body" rows="6" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('body') border-red-500 ring-red-500 @enderror">{{ $post->body }}</textarea>

                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}
                @enderror
            </div>

            {{-- Current Cover Photo if exists --}}
            @if ($post->image)
             <div class="h-64 mb-4 w-1/4 object-cover overflow-hidden">
                
                <label>Current Cover Photo</label>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="">    
            </div>
            @endif

             {{-- Update Image --}}
            <div class="mb-6">
                <label for="image">Cover Photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}
                @enderror
            </div>

             {{-- Submit Button --}}
            <div class="text-center mt-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update</button>
            </div>

        </form>
    </div>

</x-layout>

