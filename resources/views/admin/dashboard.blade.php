<x-admin-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        {{-- Main Content --}}
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome, Admin</h1>
            <p class="text-gray-600">This is your admin dashboard. Use the sidebar to manage users, posts, and settings.</p>

            {{-- Summary Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 pt-4">
            <div class="bg-white shadow rounded p-4">
                <h2 class="text-sm font-medium text-gray-500">Total Users</h2>
                <p class="text-2xl font-semibold text-gray-900">{{ $totalUsers }}</p>
            </div>

            <div class="bg-white shadow rounded p-4">
                <h2 class="text-sm font-medium text-gray-500">Verified Users</h2>
                <p class="text-2xl font-semibold text-gray-900">{{ $verifiedUsers }}</p>
            </div>

            <div class="bg-white shadow rounded p-4">
                <h2 class="text-sm font-medium text-gray-500">Total Posts</h2>
                <p class="text-2xl font-semibold text-gray-900">{{ $totalPosts }}</p>
            </div>

            <div class="bg-white shadow rounded p-4">
                <h2 class="text-sm font-medium text-gray-500">Total Categories</h2>
                <p class="text-2xl font-semibold text-gray-900">{{ $totalCategories }}</p>
            </div>
        </div>

        {{-- Analytics --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
        {{-- Left: Registration Chart (spans 2/3) --}}
        <div class="col-span-2 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">User Registrations (Last 7 Days)</h2>
            <canvas id="registrationChart" height="100"></canvas>
        </div>

            {{-- Right: Recent Posts --}}
            <div class="col-span-1 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Recent Posts</h2>
                <ul class="divide-y text-sm text-gray-800">
                @forelse ($recentPosts as $post)
                    <li class="py-2">
                        <p class="font-medium">{{ $post->title }}</p>
                        <p class="text-xs text-gray-500">by {{ $post->user->name ?? 'Unknown' }} • {{ $post->created_at->diffForHumans() }}</p>
                    </li>
                @empty
                    <li>No recent posts found.</li>
                @endforelse
            </ul>
        </div>
    </div>

        </main>
    </div>
</x-admin-layout>

<script>
    const ctx = document.getElementById('registrationChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($registrationsByDay->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('M d'))) !!},
            datasets: [{
                label: 'New Users',
                data: {!! json_encode($registrationsByDay->pluck('count')) !!},
                borderColor: '#4F46E5',
                backgroundColor: 'rgba(79, 70, 229, 0.2)',
                borderWidth: 2,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
