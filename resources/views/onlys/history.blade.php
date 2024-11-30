<x-app-layout>
    <section class="bg-white dark:bg-gray-900 p-4 sm:p-5">
        <div class="p-4 sm:p-24">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Riwayat Peminjaman</h1>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Judul Buku</th>
                        <th scope="col" class="px-6 py-3">Tanggal Pinjam</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($histories as $history)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $history->judul }}</td>
                            <td class="px-6 py-4">{{ $history->tanggal_pinjam }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
