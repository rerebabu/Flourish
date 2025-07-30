<x-layout>
    {{-- Heading --}}
    <section class="mb-12 text-center">
        <h1 class="font-serif text-5xl mb-2">Your Dashboard</h1>
        <p class="accent text-base">Welcome back, <strong>{{ auth()->user()->username }}</strong>. You have {{ $posts->total() }} post{{ $posts->count() !== 1 ? 's' : '' }}.</p>
    </section>

    {{-- New Post Form --}}
    <section class="card mb-12">
        <h2 class="font-serif text-2xl mb-6">Create a New Post</h2>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block font-medium mb-1">Title</label>
            <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded-md p-2" value="{{ old('title') }}">
            @error('title') <p class="accent text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="body" class="block font-medium mb-1">Body</label>
            <textarea name="body" id="body" rows="6" class="w-full border border-gray-300 rounded-md p-2">{{ old('body') }}</textarea>
            @error('body') <p class="accent text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="image" class="block font-medium mb-1">Cover Image</label>
            <input type="file" name="image" id="image">
            @error('image') <p class="accent text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn-accent">Publish</button>
        </form>
    </section>

    {{-- Post List --}}
    <section>
        <h2 class="font-serif text-2xl mb-6">Your Posts</h2>

        <div class="space-y-8">
        @foreach ($posts as $post)
            <div class="border-b pb-6">
            <h3 class="text-2xl font-serif">{{ $post->title }}</h3>
            <p class="post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
            <p class="accent mb-2">{{ Str::limit($post->body, 100) }}</p>

            <div class="flex gap-4 text-sm">
                <a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:underline">Edit</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:underline">Delete</button>
                </form>
            </div>
            </div>
        @endforeach
        </div>

        <div class="mt-10">
        {{ $posts->links() }}
        </div>
    </section>
</x-layout>
