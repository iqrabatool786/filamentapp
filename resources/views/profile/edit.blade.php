<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>
<body class="bg-[#F8F5F2] flex items-center justify-center min-h-screen">
    <div class="w-full max-w-2xl p-8 bg-white rounded-xl shadow-lg space-y-8">
        <a href="/admin" class="text-amber-600 hover:underline mb-4 block text-center font-medium">
            Go to Admin Dashboard
        </a>
        <h1 class="text-3xl font-bold text-center text-gray-800">User Profile</h1>

        @if (session('status') === 'profile-updated')
            <p class="text-green-500 text-center text-sm font-medium">Profile updated successfully.</p>
        @elseif (session('status') === 'password-updated')
            <p class="text-green-500 text-center text-sm font-medium">Password updated successfully.</p>
        @endif

        <!-- Update Profile Information Form -->
        <div class="p-6 bg-gray-50 rounded-lg border border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Update Profile Information</h2>
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                @csrf
                @method('patch')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                </div>
                <button type="submit"
                    class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                    Save
                </button>
            </form>
        </div>

        <!-- Update Password Form -->
        <div class="p-6 bg-gray-50 rounded-lg border border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Update Password</h2>
            <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-4">
                @csrf
                @method('patch')
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input id="current_password" type="password" name="current_password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                </div>
                <button type="submit"
                    class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                    Save
                </button>
            </form>
        </div>
    </div>
</body>
</html>
