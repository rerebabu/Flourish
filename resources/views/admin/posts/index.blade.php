<x-admin-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">All Posts</h1>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- POSTS TABLE --}}
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Existing Posts</h2>

            <table class="w-full table-auto">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Tags</th>
                        <th class="px-4 py-2">Created</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $post->title }}</td>
                            <td class="px-4 py-2">{{ $post->category->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">
                                @foreach ($post->tags as $tag)
                                    <span class="text-sm bg-gray-200 px-2 py-1 rounded">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-4 py-2">{{ $post->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline" onclick="return confirm('Delete this post?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-4 text-center text-gray-500">No posts found.</td></tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>

        {{-- CREATE FORM --}}
        <div class="bg-white p-4 rounded shadow mb-6 mt-6">
            <h2 class="text-xl font-semibold mb-4">Create New Post</h2>
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="text" name="title" placeholder="Title" class="w-full border rounded px-3 py-2" required>

                <textarea name="body" rows="4" placeholder="Body" class="w-full border rounded px-3 py-2" required></textarea>

                <select name="category_id" class="w-full border rounded px-3 py-2" required>
                    <option value="" disabled selected>Choose Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <div>
                    <label class="block text-sm font-medium mb-1">Tags</label>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($tags as $tag)
                            <label class="flex items-center gap-1">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                <span>{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <input type="file" name="image" class="w-full">

                <button class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Publish</button>
            </form>
        </div>
    </div>
</x-admin-layout>
