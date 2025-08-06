<x-admin-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Tags</h1>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- CREATE FORM --}}
        <div class="bg-white p-4 rounded shadow mb-6">
            <h2 class="text-xl font-semibold mb-4">Add New Tag</h2>
            <form action="{{ route('admin.tags.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Tag Name" class="w-full border rounded px-3 py-2" required>
                <button class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Add Tag</button>
            </form>
        </div>

        {{-- TAGS TABLE --}}
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Existing Tags</h2>
            <table class="w-full table-auto">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $tag->name }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline" onclick="return confirm('Delete this tag?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-admin-layout>
