<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Member Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">--}}
{{--                <!-- Buku yang Dipinjam -->--}}
{{--                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                    <div class="p-6">--}}
{{--                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Buku yang Dipinjam</h3>--}}
{{--                        <div class="flex items-center justify-between">--}}
{{--                            <span class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">{{ auth()->user()->loans()->whereNull('returned_at')->count() }}</span>--}}
{{--                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>--}}
{{--                        </div>--}}
{{--                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Jumlah Buku yang Sedang Dipinjam</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Riwayat Peminjaman -->--}}
{{--                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                    <div class="p-6">--}}
{{--                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Riwayat Peminjaman</h3>--}}
{{--                        <div class="flex items-center justify-between">--}}
{{--                            <span class="text-3xl font-bold text-green-600 dark:text-green-400">{{ auth()->user()->loans()->count() }}</span>--}}
{{--                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>--}}
{{--                        </div>--}}
{{--                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Total Peminjaman</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Buku yang Tersedia -->--}}
{{--                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                    <div class="p-6">--}}
{{--                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Buku yang Tersedia</h3>--}}
{{--                        <div class="flex items-center justify-between">--}}
{{--                            <span class="text-3xl font-bold text-yellow-600 dark:text-yellow-400">{{ \App\Models\Book::where('stock', '>', 0)->count() }}</span>--}}
{{--                            <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>--}}
{{--                        </div>--}}
{{--                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Jumlah Buku yang Tersedia</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Daftar Buku yang Sedang Dipinjam -->--}}
{{--            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6">--}}
{{--                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Buku yang Sedang Dipinjam</h3>--}}
{{--                    <div class="overflow-x-auto">--}}
{{--                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">--}}
{{--                            <thead class="bg-gray-50 dark:bg-gray-700">--}}
{{--                            <tr>--}}
{{--                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Judul Buku</th>--}}
{{--                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal Pinjam</th>--}}
{{--                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal Kembali</th>--}}
{{--                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">--}}
{{--                            @foreach(auth()->user()->loans()->whereNull('returned_at')->with('book')->get() as $loan)--}}
{{--                                <tr>--}}
{{--                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $loan->book->title }}</td>--}}
{{--                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $loan->tanggal_pinjam->format('d/m/Y') }}</td>--}}
{{--                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $loan->tanggal_kembali->format('d/m/Y') }}</td>--}}
{{--                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">--}}
{{--                                        @if($loan->tanggal_kembali->isPast())--}}
{{--                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Terlambat</span>--}}
{{--                                        @else--}}
{{--                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Dipinjam</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
