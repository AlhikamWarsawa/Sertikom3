<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold mb-4">Notifikasi Pengembalian</h2>

                    @forelse($notifications as $notification)
                        <div
                            class="mb-4 p-4 border rounded-lg {{ $notification->days_left <= 2 ? 'bg-red-100' : 'bg-yellow-100' }}">
                            <p class="font-semibold">{{ $notification->books_name }}</p>
                            <p>Tanggal Pengembalian: {{ $notification->tanggal_kembali }}</p>
                            <p>
                                @if($notification->days_left > 0)
                                    Sisa {{ $notification->days_left }} hari lagi
                                @else
                                    Terlambat {{ abs($notification->days_left) }} hari
                                @endif
                            </p>
                        </div>
                    @empty
                        <p>Tidak ada notifikasi pengembalian saat ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
