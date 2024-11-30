<x-app-layout>
    <section class="bg-white dark:bg-gray-900 p-4 sm:p-5">
        <div class="p-4 sm:p-24">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Daftar Buku</h1>

            <div class="mb-4">
                <form action="{{ route('onlys.index') }}" method="GET" class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search" name="search"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="Cari judul buku..." value="{{ request('search') }}">
                    </div>
                    <button type="submit"
                            class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($onlys as $only)
                    <div
                        class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                        <div class="p-4 flex flex-col flex-grow">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $only->judul }}</h5>
                            <div class="mb-2">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $only->kategori }}</span>
                            </div>
                            <div class="text-sm text-gray-700 dark:text-gray-400 mb-2">
                                <p>Penulis: {{ $only->penulis }}</p>
                                <p>Stok: <span
                                        class="font-semibold {{ $only->stok > 0 ? 'text-green-600' : 'text-red-600' }}">{{ $only->stok }}</span>
                                </p>
                                <p>Tahun Terbit: {{ date('d-M-Y', strtotime($only->terbit)) }}</p>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-3 mb-4">{{ Str::limit($only->deskripsi, 20) }}</p>
                            <div class="mt-auto">
                                <form action="{{ route('onlys.borrow', $only->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="block w-full text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 {{ $only->stok <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                        {{ $only->stok <= 0 ? 'disabled' : '' }}>
                                        {{ $only->stok > 0 ? 'Pinjam' : 'Habis' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
