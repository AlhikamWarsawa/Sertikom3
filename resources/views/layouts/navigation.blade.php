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
                        <x-nav-link :href="route('onlys.index')" :active="request()->routeIs('onlys.index')">
                            {{ __('Daftar Buku') }}
                        </x-nav-link>
                        <x-nav-link :href="route('history')" :active="request()->routeIs('history')">
                            {{ __('Riwayat Peminjaman') }}
                        </x-nav-link>
                        <x-nav-link :href="route('onlys.notifications')" :active="request()->routeIs('onlys.notifications')">
                            {{ __('Notifikasi Pengembalian') }}
                        </x-nav-link>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                 this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
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
                    <x-sidebar-dropdown-link :href="route('loans.pinjam')" :active="request()->routeIs('loans.pinjam')">
                        Tambah Peminjaman
                    </x-sidebar-dropdown-link>
                    <x-sidebar-dropdown-link :href="route('loans.kembali')" :active="request()->routeIs('loans.kembali')">
                        Daftar Pengembalian
                    </x-sidebar-dropdown-link>
                </x-sidebar-dropdown>
            </ul>
            </ul>
            <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                <li class="flex-1">
                    <a href="{{ route('profile.edit') }}" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Profile') }}
                    </a>
                </li>
                <li class="flex-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>
@endif
