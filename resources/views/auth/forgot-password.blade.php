<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Perpustakaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        body {
            background-image: url('https://img.freepik.com/premium-photo/vintage-library-ambiance-with-antique-books-shelves-exuding-nostalgic-aesthetic_872147-61482.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="h-screen flex items-center justify-center">
<div class="overlay w-full h-full absolute"></div>

<div class="relative z-10 bg-black bg-opacity-80 px-8 py-12 text-white max-w-md w-full rounded-lg shadow-lg">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold">Forgot Password</h1>
        <p class="text-gray-400">Enter your email address to reset your password</p>
    </div>

    <div class="mb-4 text-sm text-green-500">
        {{ session('status') }}
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium mb-2">Email Address</label>
            <input id="email" type="email" name="email" class="w-full px-4 py-2 bg-gray-800 text-white rounded-lg focus:ring focus:ring-red-500" placeholder="Enter your email" required autofocus>
        </div>

        <div>
            <button type="submit" class="w-full py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 focus:ring focus:ring-red-500">
                Send Reset Link
            </button>
        </div>
    </form>

    <div class="text-center mt-6">
        <p class="text-gray-400 text-sm">
            Remembered your password? <a href="{{ route('login') }}" class="text-red-500 hover:underline">Sign in</a>
        </p>
    </div>
</div>
</body>
</html>
