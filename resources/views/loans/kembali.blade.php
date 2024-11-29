<x-app-layout>
    <section class="bg-white dark:bg-gray-900 lg:pl-64">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-2xl font-semibold text-gray-900 dark:text-white">Pengembalian Buku</h2>

            @foreach ($loansToReturn as $loan)
                <form action="{{ route('loans.returnBook', ['id' => $loan->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="members_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anggota</label>
                            <input type="text" name="members_name" id="members_name" value="{{ $loan->members_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="books_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                            <input type="text" name="books_name" id="books_name" value="{{ $loan->books_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        </div>

                        <div>
                            <label for="tanggal_pinjam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ $loan->tanggal_pinjam }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>

                        <div>
                            <label for="tanggal_kembali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ $loan->tanggal_kembali }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <p id="date-error" class="mt-2 text-sm text-red-600 dark:text-red-500" style="display: none;">Tanggal kembali tidak boleh sebelum tanggal pinjam.</p>
                        </div>
                    </div>

                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Kembalikan Buku
                    </button>
                </form>
            @endforeach
        </div>
    </section>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalPinjam = document.getElementById('tanggal_pinjam');
        const tanggalKembali = document.getElementById('tanggal_kembali');
        const dateError = document.getElementById('date-error');

        function validateDates() {
            if (tanggalPinjam.value && tanggalKembali.value) {
                if (new Date(tanggalKembali.value) < new Date(tanggalPinjam.value)) {
                    dateError.style.display = 'block';
                    tanggalKembali.setCustomValidity('Tanggal kembali tidak boleh sebelum tanggal pinjam.');
                } else {
                    dateError.style.display = 'none';
                    tanggalKembali.setCustomValidity('');
                }
            }
        }

        tanggalPinjam.addEventListener('change', validateDates);
        tanggalKembali.addEventListener('change', validateDates);

        tanggalPinjam.addEventListener('change', function() {
            tanggalKembali.min = tanggalPinjam.value;
        });
    });
</script>
