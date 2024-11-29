<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Perpustakaan Sertikom3 - Welcome</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
<div class="relative min-h-screen flex flex-col items-center justify-center">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                Welcome to <span class="text-yellow-400">Perpustakaan</span>
            </h1>
            <p class="mt-3 max-w-md mx-auto text-base text-gray-300 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                Gerbang Anda menuju pengetahuan dan kemungkinan tak terbatas. </p>
            <div class="mt-10 flex justify-center">
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-white hover:bg-indigo-50 transition duration-150 ease-in-out">
                                Enter
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition duration-150 ease-in-out">
                                Log in
                            </a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-20">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <h3 class="ml-2 text-lg leading-6 font-medium text-gray-900 dark:text-white">Koleksi
                                Luas</h3>
                        </div>
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            Jelajahi perpustakaan kami yang luas dengan ribuan buku dari berbagai genre.
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                            <h3 class="ml-2 text-lg leading-6 font-medium text-gray-900 dark:text-white">Pinjaman
                                Mudah</h3>
                        </div>
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            Pinjam buku dengan mudah menggunakan sistem digital kami yang efisien.
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <h3 class="ml-2 text-lg leading-6 font-medium text-gray-900 dark:text-white">Ruang Belajar
                                yang Tenang</h3>
                        </div>
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            Nikmati ruang baca dan area belajar yang damai untuk pembelajaran yang terfokus.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-20 text-center">
        <p class="text-sm text-gray-400">
            &copy; {{ date('Y') }} Perpustakaan. All rights reserved.
        </p>
    </footer>
</div>
</body>
</html>
