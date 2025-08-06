@props(['post', 'full' => false])

<div class="bg-white rounded-2xl shadow-xl border border-gray-200 flex flex-col h-full overflow-hidden transition hover:shadow-2xl">

    {{-- Cover Photo --}}
    <div class="h-52 w-full bg-gray-100 overflow-hidden">
        <img 
            src="{{ $post->image ? asset('storage/' . $post->image) : asset('storage/posts_images/default.jpg') }}" 
            alt="Cover Image"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300 ease-in-out"
        >
    </div>

    {{-- Catgeory & Tags --}}
    <p><strong>Category:</strong> {{ $post->category->name ?? 'Uncategorized' }}</p>

    <p><strong>Tags:</strong>
        @foreach($post->tags as $tag)
            <span>#{{ $tag->name }}</span>
        @endforeach
    </p>


    {{-- Content --}}
    <div class="p-6 flex flex-col flex-grow space-y-3">

        {{-- Title --}}
        <h2 class="text-2xl font-serif font-semibold text-gray-900 hover:text-black transition leading-snug">
            {{ $post->title }}
        </h2>

        {{-- Author and Date --}}
        <div class="text-sm text-gray-500">
            <span class="italic">
                {{ $post->created_at->format('M d, Y') }}
            </span>
            &mdash;
            <a href="{{ route('posts.user', $post->user) }}" class="text-black font-semibold hover:underline">
                {{ $post->user->username }}
            </a>
        </div>

        {{-- Body Preview --}}
        <div class="text-sm text-gray-700 leading-relaxed flex-grow">
            @if ($full)
                <p>{{ $post->body }}</p>
            @else
                <p>
                    {{ Str::words($post->body, 28) }}
                    <a href="{{ route('posts.show', $post) }}" class="read-more ml-1 text-blue-600 hover:text-blue-800 underline underline-offset-4">Read More →</a>
                </p>
            @endif
        </div>

        {{-- Actions (Edit/Delete/etc.) --}}
        <div class="pt-4 flex justify-end gap-3">
            {{ $slot }}
        </div>
        
    </div>
</div>
