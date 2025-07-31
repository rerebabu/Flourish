<x-layout>

    {{-- Dashboard Welcome Header --}}
    <section 
    class="bg-cover bg-center border-b border-[#e5e0d6] py-24 relative"
    style="background-image: url('{{ asset('storage/assets/Flourish-Dashboard.jpg') }}');">
    
    <div class="absolute inset-0 bg-black bg-opacity-10"></div>

        <div class="relative z-10 max-w-2xl mx-auto px-6 text-center text-white">
            <div class="bg-black bg-opacity-60 rounded-lg px-8 py-10 shadow-lg">
            <h1 class="text-4xl text-white font-serif mb-4">Welcome back to Flourish 🌿</h1>
            <p class="text-base text-gray-200">
                Every story starts a journey, and every journey helps you Flourish.
            </p>
            </div>
        </div>
    </section>


    {{-- Profile + Post Creation --}}
    <section class="max-w-7xl mx-auto px-6 mt-16 mb-20 grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Profile Card --}}
        <div class="md:col-span-1 bg-white border border-gray-200 rounded-xl shadow-2xl p-6">
        <div class="text-center">
            <img 
            src="https://picsum.photos/100" 
            alt="User Avatar" 
            class="w-24 h-24 rounded-full object-cover mx-auto mb-4 border border-gray-300"
            >

            <h2 class="text-2xl font-serif text-gray-900 mb-1">{{ auth()->user()->username }}</h2>
            <p class="text-sm text-gray-600 mb-4">{{ auth()->user()->email }}</p>
            <p class="text-xs text-gray-500 italic">
            Total posts: <span class="font-semibold">{{ $posts->total() }}</span>
            </p>

            {{-- Bio --}}
            <div class="mt-10 text-left text-sm text-gray-700 leading-relaxed">
            <h3 class="text-sm uppercase tracking-wide font-semibold text-gray-500 mb-2">About Me</h3>
            <p>
                Aspiring storyteller, observer of quiet moments, and believer in the power of words.  
                I write to reflect, connect, and grow — one post at a time.
            </p>
            </div>

            {{-- Edit Profile Button --}}
            <div class="mt-8">
            <button 
                class="inline-block px-5 py-2 bg-black text-white text-sm font-medium rounded-md hover:bg-gray-900 transition">Edit Profile</button>
            </div>
        </div>
        </div>


        {{-- Post Creation Form --}}
        <div class="md:col-span-2 bg-white border border-gray-200 rounded-xl shadow-2xl p-8">

        {{-- Heading --}}
        <h2 class="text-2xl font-serif text-gray-900 mb-6">Create a New Post</h2>

        {{-- Form --}}
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            {{-- Flash Messages --}}
            @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
            @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
            @endif

            {{-- Post Title --}}
            <div>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title') }}" 
                placeholder="Title"
                class="w-full text-2xl font-serif text-gray-900 placeholder-gray-400 focus:outline-none border-b border-gray-300 focus:border-black transition"
            >
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>

            {{-- Post Body --}}
            <div>
            <textarea 
                name="body" 
                id="body" 
                rows="8" 
                placeholder="Write your thoughts..."
                class="w-full text-base text-gray-800 placeholder-gray-400 focus:outline-none border-b border-gray-300 focus:border-black transition"
            >{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>

            {{-- Image Upload --}}
            <div class="text-sm text-gray-700">
            <label for="image" class="block mb-1 font-medium">Cover Photo</label>
            <input 
                type="file" 
                name="image" 
                id="image" 
                class="file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-black file:text-white hover:file:bg-gray-800 transition"
            >
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>

            {{-- Submit Button --}}
            <div class="text-right pt-2">
            <button type="submit" class="bg-black text-white px-6 py-2 rounded-md font-medium hover:bg-gray-900 transition">
                Publish Post
            </button>
            </div>
        </form>
        </div>

    </section>

    {{-- Latest Posts --}}
    <section class="max-w-7xl mx-auto px-6 mb-16">
        <h2 class="text-3xl font-serif font-bold text-gray-900 mb-6 text-center">Your Latest Posts</h2>

        @if ($posts->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($posts as $post)
            <x-postCard :post="$post">
                <div class="mt-4 flex justify-between">
                <a href="{{ route('posts.edit', $post) }}" class="text-sm bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-md">Update</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md">Delete</button>
                </form>
                </div>
            </x-postCard>
            @endforeach
        </div>
        @else
        <p class="text-center text-gray-500 mt-8">You haven't published any posts yet.</p>
        @endif

        <div class="mt-12 flex justify-center">
        {{ $posts->links() }}
        </div>
    </section>

</x-layout>
