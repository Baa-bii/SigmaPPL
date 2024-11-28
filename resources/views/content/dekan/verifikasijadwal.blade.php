<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Jadwal</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body> 
<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <x-header></x-header>
    <x-sidebar></x-sidebar>
    <main class="p-16 md:ml-64 h-auto pt-20 min-h-screen">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 mt-4">Usulan Jadwal Kuliah</h1>
        <!-- Kontainer Utama -->
        <div class="flex items-center justify-between gap-4 px-4">
            <!-- Simbol Previous dan Search Bar -->
            <div class="flex items-center flex-grow gap-3">
                <!-- Tombol Previous -->
                <a href="{{ route('dekan.jadwal.index') }}" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>

                <!-- Search Bar -->
                <form class="flex-grow flex items-center">
                    <label for="simple-search" class="sr-only">Cari Jadwal</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
                            </svg>
                        </div>
                        <input type="text" id="simple-search" placeholder="Cari Jadwal" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                </form>
            </div>

            <!-- Filter dan Actions -->
            <div class="flex items-center gap-4">
                <!-- Dropdown Filter -->
                <div class="relative inline-block text-left">
                    <button id="filtersDropdownButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        Filters
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="filtersDropdown" class="absolute hidden left-0 mt-1 w-48 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                        <ul class="py-1 text-sm text-gray-700" role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Semua</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Semua Disetujui</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Semua Ditolak</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sedang Proses</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Dropdown Actions -->
                <div class="relative inline-block text-left">
                    <button id="actionsDropdownButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        Actions
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="actionsDropdown" class="absolute hidden left-0 mt-1 w-24 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                        <ul class="py-1 text-sm text-gray-700" role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Setuju</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Tolak</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto mt-2">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="text-sm text-black uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4 w-10">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </th>
                        <th scope="col" class="p-4">MATA KULIAH</th>
                        <th scope="col" class="p-4">WAKTU</th>
                        <th scope="col" class="p-4">DOSEN</th>
                        <th scope="col" class="p-4">SEMESTER</th>
                        <th scope="col" class="p-4">RUANGAN</th>
                        <th scope="col" class="p-4">AKSI</th>
                        <th scope="col" class="p-4">STATUS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-transparent">
                    <tr class="bg-white dark:bg-gray-800">
                        <!-- Checkbox -->
                        <td class="p-4">
                            <input type="checkbox" class="rowCheckbox w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </td>
                        <td class="p-4 whitespace-nowrap">Matematika Dasar</td>
                        <td class="p-4 whitespace-nowrap">Senin, 08:00 - 10:00</td>
                        <td class="p-4 whitespace-nowrap">Dr. Andi Wijaya</td>
                        <td class="p-4 whitespace-nowrap">1</td>
                        <td class="p-4 whitespace-nowrap">Ruang 101</td>
                        <td class="p-4 flex gap-2">
                            <button type="button" class="setuju-button flex items-center whitespace-nowrap text-sm font-medium text-center rounded-lg border border-green-500 text-green-500 px-3 py-1 hover:bg-green-500 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="false">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                                Setuju
                            </button>
                            <button type="button" class="tolak-button flex items-center whitespace-nowrap border border-red-500 text-red-500 px-3 py-1 text-sm rounded-lg hover:bg-red-500 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                Tolak
                            </button>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <span id="status-column" class="bg-yellow-200 text-yellow-600 rounded-full px-4 py-1 text-sm inline-block align-middle">
                                Menunggu
                            </span>
                        </td>
                    </tr>
                    <!-- Tambahkan baris data lainnya -->
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400 ml-5 mb-5">
                Showing 
                <span class="font-semibold text-gray-900 dark:text-white">
                    {{ $jadwal->firstItem() }}-{{ $jadwal->lastItem() }}
                </span> 
                of 
                <span class="font-semibold text-gray-900 dark:text-white">
                    {{ $jadwal->total() }}
                </span>
            </span>
            <ul class="inline-flex items-center -space-x-px text-sm h-8 mr-5 mb-5">
            <li>
                        <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
        </div>
    </main>
</div>

    </section>
    <!-- End block -->
        </main>
        <x-footerdosen></x-footerdosen>
    </div>

    <script>
    // Fungsi untuk mengubah status elemen
    function ubahStatus(status, warnaBaru, warnaLama) {
        const statusColumn = document.getElementById('status-column');

        if (statusColumn) {
            // Ubah teks status
            statusColumn.textContent = status;

            // Hapus semua class warna status sebelumnya
            statusColumn.classList.remove(...warnaLama);

            // Tambahkan class warna baru
            statusColumn.classList.add(...warnaBaru);
        } else {
            console.error('Elemen status-column tidak ditemukan!');
        }
    }

    // Event listener untuk tombol "Setuju"
    document.querySelectorAll('.setuju-button').forEach(button => {
        button.addEventListener('click', function () {
            ubahStatus(
                'Setuju',
                ['bg-green-200', 'text-green-600'],
                ['bg-yellow-200', 'text-yellow-600', 'bg-red-200', 'text-red-600']
            );
        });
    });

    // Event listener untuk tombol "Tolak"
    document.querySelectorAll('.tolak-button').forEach(button => {
        button.addEventListener('click', function () {
            ubahStatus(
                'Tolak',
                ['bg-red-200', 'text-red-600'],
                ['bg-yellow-200', 'text-yellow-600', 'bg-green-200', 'text-green-600']
            );
        });
    });

        const dropdownButton = document.getElementById('filtersDropdownButton');
        const dropdownMenu = document.getElementById('filtersDropdown');

        // Tampilkan atau sembunyikan dropdown saat tombol diklik
        dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
        });

        // Tutup dropdown saat mengklik di luar elemen
        document.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        // Toggle dropdown visibility
        document.getElementById('actionsDropdownButton').addEventListener('click', function (event) {
        event.stopPropagation(); // Mencegah event click tersebar ke dokumen
            const dropdown = document.getElementById('actionsDropdown');
                dropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            const dropdown = document.getElementById('actionsDropdown');
            const button = document.getElementById('actionsDropdownButton');
            if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Actions for Setujui Semua
        document.getElementById('approveAllButton').addEventListener('click', function () {
            alert('Semua jadwal telah disetujui!');
            // Tambahkan logika untuk menyetujui semua di sini
        });

        // Actions for Tolak Semua
        document.getElementById('rejectAllButton').addEventListener('click', function () {
            alert('Semua jadwal telah ditolak!');
            // Tambahkan logika untuk menolak semua di sini
        });

        document.addEventListener('DOMContentLoaded', function () {
            const mainCheckbox = document.getElementById('mainCheckbox');
            mainCheckbox.addEventListener('change', function () {
                const rowCheckboxes = document.querySelectorAll('.rowCheckbox');
                rowCheckboxes.forEach(checkbox => {
                    checkbox.checked = mainCheckbox.checked;
                });
            });
        });

    </script>


</body>
</html>