<!-- resources/views/admin/auth/login.blade.php -->
 <x-layout>
    
  <div class="max-w-md mx-auto mt-20">
        <h2 class="text-2xl font-bold mb-6">Admin Login</h2>

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" class="w-full border p-2" required>
            </div>

            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" class="w-full border p-2" required>
            </div>

            <div class="mb-4">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
            </div>

            <button type="submit" class="bg-black text-white px-4 py-2">Login</button>
        </form>
    </div>

</x-layout> 