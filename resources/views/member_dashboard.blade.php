<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">Selamat datang, {{ Auth::user()->name }}!</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-blue-100 dark:bg-blue-800 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-2">Buku Dipinjam</h3>
                            <p class="text-3xl font-bold">{{ $borrowedBooksCount ?? 0 }}</p>
                        </div>

                        <div class="bg-green-100 dark:bg-green-800 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-2">Buku Tersedia</h3>
                            <p class="text-3xl font-bold">{{ $availableBooksCount ?? 0 }}</p>
                        </div>

                        <div class="bg-yellow-100 dark:bg-yellow-800 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-2">Total Peminjaman</h3>
                            <p class="text-3xl font-bold">{{ $totalBorrowings ?? 0 }}</p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-xl font-semibold mb-4">Buku yang Sedang Dipinjam</h3>
                        <div class="bg-white dark:bg-gray-700 shadow overflow-hidden sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Judul Buku</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal Pinjam</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal Kembali</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                                @forelse ($borrowedBooks ?? [] as $book)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $book->judul }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $book->tanggal_pinjam }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $book->tanggal_kembali }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300 text-center">Tidak ada buku yang sedang dipinjam.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
