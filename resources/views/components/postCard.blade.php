@props(['post', 'full' => false])

<div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition border border-gray-200 flex flex-col h-full">

    {{-- Cover Photo --}}
    <div class="h-52 w-full overflow-hidden bg-gray-100">
        <img 
            src="{{ $post->image ? asset('storage/' . $post->image) : asset('storage/posts_images/default.jpg') }}" 
            alt="Cover Image"
            class="w-full h-full object-cover transition duration-300 hover:scale-105"
        >
    </div>

    {{-- Content --}}
    <div class="p-5 flex flex-col flex-grow">

        {{-- Title --}}
        <h2 class="text-xl font-semibold text-gray-900 mb-1 hover:text-blue-600 transition">
            {{ $post->title }}
        </h2>

        {{-- Author and Date --}}
        <div class="text-sm text-gray-500 mb-3">
            Posted {{ $post->created_at->diffForHumans() }} by
            <a href="{{ route('posts.user', $post->user) }}" class="text-blue-600 font-medium hover:underline">
                {{ $post->user->username }}
            </a>
        </div>

        {{-- Body --}}
        <div class="text-gray-700 text-sm flex-grow">
            @if ($full)
                <p>{{ $post->body }}</p>
            @else
                <p>
                    {{ Str::words($post->body, 20) }}
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline ml-1">
                        Read More &rarr;
                    </a>
                </p>
            @endif
        </div>

        {{-- Slot Area (Edit/Delete) --}}
        <div class="mt-4 flex justify-end gap-2">
            {{ $slot }}
        </div>

    </div>
</div>
