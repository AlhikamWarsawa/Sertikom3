@if (Auth::user()->role == 'anggota')
    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"/>
                        </a>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.index')">
                            {{ __('Daftar Buku') }}
                        </x-nav-link>
                        <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.index')">
                            {{ __('Riwayat Peminjaman') }}
                        </x-nav-link>
                        <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.index')">
                            {{ __('Notifikasi Pengembalian') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endif

@if (Auth::user()->role == 'admin')
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ route('dashboard') }}" class="flex items-center pl-2.5 mb-5">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"/>
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white ml-3">Admin Panel</span>
            </a>
            <ul class="space-y-2">
                <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <x-slot name="icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </x-slot>
                    Beranda
                </x-sidebar-link>

                <x-sidebar-dropdown label="Lemari" icon="folder">
                    <x-sidebar-dropdown-link :href="route('books.create')" :active="request()->routeIs('books.create')">
                        Tambah Buku
                    </x-sidebar-dropdown-link>
                    <x-sidebar-dropdown-link :href="route('books.index')" :active="request()->routeIs('books.index')">
                        Lemari Buku
                    </x-sidebar-dropdown-link>
                </x-sidebar-dropdown>

                <x-sidebar-dropdown label="Users" icon="users">
                    <x-sidebar-dropdown-link :href="route('members.create')" :active="request()->routeIs('members.create')">
                        Tambah Anggota
                    </x-sidebar-dropdown-link>
                    <x-sidebar-dropdown-link :href="route('members.index')" :active="request()->routeIs('members.index')">
                        Lemari Anggota
                    </x-sidebar-dropdown-link>
                </x-sidebar-dropdown>

                <x-sidebar-dropdown label="Peminjaman" icon="book-open">
                    <x-sidebar-dropdown-link :href="route('loans.index')" :active="request()->routeIs('loans.index')">
                        Daftar Buku
                    </x-sidebar-dropdown-link>
{{--                    <x-sidebar-dropdown-link :href="route('loans.pinjam')" :active="request()->routeIs('loans.pinjam')">--}}
{{--                        Tambah Peminjaman--}}
{{--                    </x-sidebar-dropdown-link>--}}
{{--                    <x-sidebar-dropdown-link :href="route('loans.kembali')" :active="request()->routeIs('loans.kembali')">--}}
{{--                        Daftar Pengembalian--}}
{{--                    </x-sidebar-dropdown-link>--}}
                </x-sidebar-dropdown>
            </ul>
            </ul>
            <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-3">Keluar</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </aside>
@endif
