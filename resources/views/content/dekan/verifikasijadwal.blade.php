<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Jadwal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                                <a href="#" class="filter-option block px-4 py-2 hover:bg-gray-100" data-filter="semua">Semua</a>
                            </li>
                            <li>
                                <a href="#" class="filter-option block px-4 py-2 hover:bg-gray-100" data-filter="disetujui">Semua Disetujui</a>
                            </li>
                            <li>
                                <a href="#" class="filter-option block px-4 py-2 hover:bg-gray-100" data-filter="ditolak">Semua Ditolak</a>
                            </li>
                            <li>
                                <a href="#" class="filter-option block px-4 py-2 hover:bg-gray-100" data-filter="proses">Sedang Proses</a>
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
                    <div id="actionsDropdown" class="absolute hidden left-0 mt-1 w-30 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                        <ul class="py-1 text-sm text-gray-700" role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                            <li>
                                <a href="#" id="approveButton" class="block px-4 py-2 hover:bg-gray-100">Menyetujui</a>
                            </li>
                            <li>
                                <a href="#" id="rejectButton" class="block px-4 py-2 hover:bg-gray-100">Menolak</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto mt-2">
            <table id="data-tabel" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="text-sm text-black uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4 w-10 text-center">
                        <input id="mainCheckbox" type="checkbox" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded">
                        <label for="mainCheckbox" class="sr-only">Select all</label>
                    </th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">MATA KULIAH</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">WAKTU</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">DOSEN</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">SEMESTER</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">RUANGAN</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">GEDUNG</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">TAHUN AKADEMIK</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">AKSI</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">STATUS</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-transparent">
                    @foreach ($jadwal as $item)
                        <tr class="bg-white text-black dark:bg-gray-800 status-row" data-status="{{ $item->status ?? 'menunggu' }}"
                            data-search="{{ $item->matakuliah->nama_mk ?? '' }} {{ $item->matakuliah->dosen->nama ?? '' }} {{ $item->matakuliah->semester ?? '' }} {{ $item->ruang->nama ?? '' }} {{ $item->ruang->gedung ?? '' }} {{ $item->id_TA ?? '' }}">
                            <!-- Checkbox -->
                            <td class="p-4 text-center">
                                <input type="checkbox" class="rowCheckbox w-3 h-3 text-primary-600 bg-gray-100 rounded">
                            </td>
                            <!-- Nama Mata Kuliah -->
                            <td class="p-4 whitespace-nowrap">{{ $item->matakuliah->nama_mk ?? 'N/A' }}</td>  
                            <!-- Waktu -->
                            <td class="p-4 whitespace-nowrap">{{ $item->waktu->jam_mulai }} - {{ $item->waktu->jam_selesai }}</td>  
                            <!-- Dosen (assuming it's stored in the matakuliah or elsewhere) -->
                            <td class="p-4 whitespace-nowrap">{{ $item->matakuliah->dosen->nama ?? 'N/A' }}</td>  <!-- Assuming dosen relationship is present in MataKuliah -->
                            <!-- Semester -->
                            <td class="p-4 whitespace-nowrap text-center">{{ $item->matakuliah->semester ?? 'N/A' }}</td>  <!-- Semester from MataKuliah -->
                            <!-- Ruangan -->
                            <td class="p-4 whitespace-nowrap text-center">{{ $item->ruang->nama ?? 'N/A' }}</td>  
                            <td class="p-4 whitespace-nowrap text-center">{{ $item->ruang->gedung ?? 'N/A' }}</td>  <!-- Gedung -->
                            <td class="p-4 whitespace-nowrap text-center">{{ $item->id_TA }}</td>  <!-- Tahun Akademik -->
                            <td class="p-4 flex gap-2 whitespace-nowrap">
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
                                <span class="statusCell bg-yellow-200 text-yellow-600 rounded-full px-4 py-1 text-sm inline-flex justify-center items-center w-full">
                                    {{ $item->status ?? 'Menunggu' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400 ml-5 mb-5">
                Showing 
                <span class="font-semibold text-gray-900 dark:text-white">
                    {{ $jadwal->firstItem() }}
                </span> 
                to
                <span class="font-semibold text-gray-900 dark:text-white">
                    {{ $jadwal->lastItem() }}
                </span>
                of 
                <span class="font-semibold text-gray-900 dark:text-white">
                    {{ $jadwal->total() }}
                </span>
            </span>
            <ul class="inline-flex items-center -space-x-px text-sm h-8 mr-5 mb-5">
                <!-- Tombol Previous -->
                @if($jadwal->onFirstPage())
                    <li>
                        <span class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $jadwal->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Previous
                        </a>
                    </li>
                @endif

                <!-- Nomor Halaman -->
                @for($i = 1; $i <= $jadwal->lastPage(); $i++)
                    @if($i == $jadwal->currentPage())
                        <li>
                            <span class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">
                                {{ $i }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $jadwal->url($i) }}" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                {{ $i }}
                            </a>
                        </li>
                    @endif
                @endfor

                <!-- Tombol Next -->
                @if($jadwal->hasMorePages())
                    <li>
                        <a href="{{ $jadwal->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Next
                        </a>
                    </li>
                @else
                    <li>
                        <span class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-r-lg cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            Next
                        </span>
                    </li>
                @endif
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

    document.addEventListener('DOMContentLoaded', function () {
    const dropdownButton = document.getElementById('filtersDropdownButton');
    const dropdown = document.getElementById('filtersDropdown');
    const filterOptions = document.querySelectorAll('.filter-option');
    const statusRows = document.querySelectorAll('.status-row'); // Semua baris tabel

    // Menampilkan dropdown saat tombol "Filters" diklik
    dropdownButton.addEventListener('click', function (event) {
        event.stopPropagation(); // Mencegah event klik tersebar
        dropdown.classList.toggle('hidden');
    });

    // Menutup dropdown jika klik di luar dropdown
    document.addEventListener('click', function (event) {
        if (!dropdown.contains(event.target) && !dropdownButton.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // Event listener untuk setiap opsi filter
    filterOptions.forEach(option => {
        option.addEventListener('click', function () {
            const filter = this.getAttribute('data-filter');
            applyFilter(filter);
            dropdown.classList.add('hidden'); // Menyembunyikan dropdown setelah pilihan dipilih
        });
    });

    // Fungsi untuk menerapkan filter
    function applyFilter(filter) {
        statusRows.forEach(row => {
            const status = row.getAttribute('data-status');

            // Tampilkan atau sembunyikan baris berdasarkan status yang dipilih
            if (filter === 'semua') {
                row.style.display = ''; // Menampilkan semua baris
            } else if (filter === 'disetujui' && status === 'setuju') {
                row.style.display = ''; // Tampilkan hanya status "Setuju"
            } else if (filter === 'ditolak' && status === 'ditolak') {
                row.style.display = ''; // Tampilkan hanya status "Menolak"
            } else if (filter === 'proses' && status === 'menunggu') {
                row.style.display = ''; // Tampilkan hanya status "Menunggu"
            } else {
                row.style.display = 'none'; // Sembunyikan baris lainnya
            }
        });
    }
});

        document.addEventListener('DOMContentLoaded', function () {
    const mainCheckbox = document.getElementById('mainCheckbox');
    const rowCheckboxes = document.querySelectorAll('.rowCheckbox');
    const dropdownButton = document.getElementById('actionsDropdownButton');
    const dropdown = document.getElementById('actionsDropdown');
    const approveButton = document.getElementById('approveButton');
    const rejectButton = document.getElementById('rejectButton');
    const statusCells = document.querySelectorAll('.statusCell'); // Koleksi status sel

    // Menyembunyikan dropdown jika mengklik di luar
    document.addEventListener('click', function (event) {
        if (!dropdown.contains(event.target) && !dropdownButton.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // Menampilkan dropdown saat tombol "Actions" diklik
    dropdownButton.addEventListener('click', function (event) {
        event.stopPropagation(); // Mencegah event klik tersebar
        dropdown.classList.toggle('hidden');
    });

    // Checkbox utama mengontrol checkbox baris
    mainCheckbox.addEventListener('change', function () {
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = mainCheckbox.checked;
        });
    });

    // Fungsi untuk mengubah status menjadi "Setuju" jika ada checkbox yang dicentang
    approveButton.addEventListener('click', function () {
        const anyChecked = Array.from(rowCheckboxes).some(cb => cb.checked); // Cek apakah ada checkbox yang dicentang

        if (anyChecked) {
            rowCheckboxes.forEach((checkbox, index) => {
                if (checkbox.checked) {
                    // Ubah status menjadi "Setuju" untuk yang dicentang
                    const statusCell = statusCells[index]; // Ambil status cell yang sesuai
                    statusCell.textContent = 'Setuju'; // Ubah teks status
                    statusCell.classList.remove('bg-yellow-200', 'text-yellow-600'); // Hapus kelas lama
                    statusCell.classList.add('bg-green-200', 'text-green-600'); // Tambahkan kelas Setuju
                }
            });
            alert('Semua jadwal yang dicentang telah disetujui!');
        } else {
            alert('Silakan pilih jadwal untuk disetujui!');
        }

        dropdown.classList.add('hidden'); // Menyembunyikan dropdown setelah aksi
    });

    // Fungsi untuk mengubah status menjadi "Menolak" jika tombol Tolak diklik
    rejectButton.addEventListener('click', function () {
        const anyChecked = Array.from(rowCheckboxes).some(cb => cb.checked); // Cek apakah ada checkbox yang dicentang

        if (anyChecked) {
            rowCheckboxes.forEach((checkbox, index) => {
                if (checkbox.checked) {
                    // Ubah status menjadi "Menolak" untuk yang dicentang
                    const statusCell = statusCells[index]; // Ambil status cell yang sesuai
                    statusCell.textContent = 'Menolak'; // Ubah teks status
                    statusCell.classList.remove('bg-yellow-200', 'text-yellow-600'); // Hapus kelas lama
                    statusCell.classList.add('bg-red-200', 'text-red-600'); // Tambahkan kelas Menolak
                }
            });
            alert('Semua jadwal yang dicentang telah ditolak!');
        } else {
            alert('Silakan pilih jadwal untuk ditolak!');
        }

        dropdown.classList.add('hidden'); // Menyembunyikan dropdown setelah aksi
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('simple-search');
    const rows = document.querySelectorAll('#dataTable tbody tr'); // Semua baris tabel

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();  // Ambil input pencarian dan ubah menjadi lowercase

        rows.forEach(row => {
            const searchData = row.getAttribute('data-search').toLowerCase();  // Ambil data pencarian yang ada di setiap baris

            // Jika search term ada dalam data-search, tampilkan baris, jika tidak, sembunyikan
            if (searchData.includes(searchTerm)) {
                row.style.display = '';  // Menampilkan baris
            } else {
                row.style.display = 'none';  // Menyembunyikan baris
            }
        });
    });
});

    </script>

</body>
</html>