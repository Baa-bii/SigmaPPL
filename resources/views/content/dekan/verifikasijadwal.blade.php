<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verifikasi Jadwal Kuliah</title>
    <link rel="icon" href="{{ asset('img/fix.png') }}" type="image/png">
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
        
        @if (session('success'))
            <div id="success-message" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="failed-message" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100">
                {{ session('error') }}
            </div>
        @endif

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
                <form action="{{ route('dekan.jadwal.search') }}" method="GET" class="flex-grow flex items-center">
                    <label for="search" class="sr-only">Cari Jadwal</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request()->input('search') }}" id="search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Mata Kuliah">
                    </div>
                </form>
            </div>

            <!-- Filter dan Actions -->
            <div class="flex items-center gap-4">
                <!-- Dropdown untuk Menentukan Jumlah Kolom per Halaman -->
                <!-- Dropdown untuk Jumlah Data Per Halaman -->
                <form action="{{ route('dekan.verifikasiruang') }}" method="GET" class="inline-flex items-center ml-8">
                    <label for="per_page" class="mr-2 text-gray-600 dark:text-gray-400">Tampilkan</label>
                    <select name="per_page" id="per_page" onchange="this.form.submit()" class="border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-black focus:border-black block px-3 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </form>
                <!-- Dropdown Filter -->
                <div class="relative inline-block text-left">
                    <button id="filtersDropdownButton" data-dropdown-toggle="dropdownFilters" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        Filters
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownFilters" class="z-10 hidden border border-gray-300 bg-white divide-y divide-gray-100 rounded-lg shadow w-50 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-xs text-gray-700 dark:text-gray-200 whitespace-nowrap" aria-labelledby="dropdownFiltersButton">
                            <li><a href="{{ route('dekan.jadwal.filter', ['filter' => 'disetujui']) }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-black dark:hover:bg-gray-600 dark:hover:text-white {{ request('filter') == 'disetujui' ? 'bg-gray-300' : '' }}">Semua Sudah Disetujui</a></li>
                            <li><a href="{{ route('dekan.jadwal.filter', ['filter' => 'ditolak']) }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-black dark:hover:bg-gray-600 dark:hover:text-white {{ request('filter') == 'ditolak' ? 'bg-gray-300' : '' }}">Semua Sudah Ditolak</a></li>
                            <li><a href="{{ route('dekan.jadwal.filter', ['filter' => 'diajukan']) }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-black dark:hover:bg-gray-600 dark:hover:text-white {{ request('filter') == 'diajukan' ? 'bg-gray-300' : '' }}">Semua Belum Diisi</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Dropdown Actions -->
                <div class="relative inline-block text-left">
                    <button id="actionsDropdownButton" data-dropdown-toggle="dropdownActions" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        Actions
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdownActions" class="absolute hidden left-0 mt-1 w-35 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                        <ul class="py-1 text-xs text-gray-700" role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                            <li><a href="#" id="approveButton" class="block px-4 py-2 hover:bg-gray-100">Setuju</a></li>
                            <li><a href="#" id="rejectButton" class="block px-4 py-2 hover:bg-gray-100">Tolak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto mt-2">
            <!-- Tabel Jadwal -->
            <table id="table-container" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
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
                    </tr>
                </thead>
                <tbody id="data-tabel-jadwal" class="divide-y divide-transparent">
                @foreach ($jadwal as $item)
                    <tr class="bg-white text-black dark:bg-gray-800 status-row" 
                        data-status="{{ $item->status ?? 'menunggu' }}"
                        data-search="{{ $item->matakuliah->nama_mk ?? '' }} 
                                     {{ $item->dosenmatkul->dosen->nama_dosen ?? '' }} 
                                     {{ $item->matakuliah->semester ?? '' }} 
                                     {{ $item->ruang->nama ?? 'Tidak Ada Ruangan' }} 
                                     {{ $item->ruang->gedung ?? '' }} 
                                     {{ $item->id_TA ?? '' }}">
                        <th scope="col" class="p-4 w-10 text-center">
                            <input type="checkbox" class="rowCheckbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded" data-id="{{ $item->id_jadwal }}">
                        </th>
                        <!-- Nama Mata Kuliah -->
                        <td class="p-4 text-xs whitespace-nowrap">{{ $item->matakuliah->nama_mk ?? 'N/A' }}</td>

                        <!-- Waktu -->
                        <td class="p-4 text-xs whitespace-nowrap">{{ $item->waktu->jam_mulai ?? 'N/A' }} - {{ $item->waktu->jam_selesai ?? 'N/A' }}</td>

                        <!-- Dosen -->
                        <td class="p-4 text-xs whitespace-nowrap">{{ $item->matakuliah->dosenmatkul->first()->dosen->nama_dosen ?? 'N/A' }}</td>

                        <!-- Semester -->
                        <td class="p-4 text-xs whitespace-nowrap text-center">{{ $item->semesterAktif->semester ?? 'N/A' }}</td>

                        <!-- Ruangan -->
                        <td class="p-4 text-xs whitespace-nowrap text-center">
                            @if ($item->ruang)
                                {{ $item->ruang->nama }}
                            @else
                                Tidak Ada Ruangan
                            @endif
                        </td>

                        <!-- Gedung -->
                        <td class="p-4 text-xs whitespace-nowrap text-center">{{ $item->ruang->gedung ?? 'Tidak Ada Gedung' }}</td>

                        <!-- Tahun Akademik -->
                        <td class="p-4 text-xs whitespace-nowrap text-center">{{ $item->semesterAktif->tahun_akademik ?? 'N/A' }}</td>

                        <!-- Form Setujui/Tolak -->
                        <td class="p-4 flex gap-2 items-center flex-wrap md:flex-nowrap">
                            <!-- Tombol Setujui -->
                                <form action="{{ route('dekan.verifikasi.update', $item->id_jadwal) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="status" value="disetujui" class="setuju-button flex items-center whitespace-nowrap text-xs text-center rounded-lg border border-green-500 text-green-500 px-3 py-1 hover:bg-green-500 hover:text-white transition
                                    {{ $item->status === 'disetujui' || $item->status === 'ditolak' ? 'opacity-50 cursor-not-allowed' : 'text-green-500 border-green-500 hover:bg-green-500 hover:text-white' }}" {{ $item->status === 'disetujui' || $item->status === 'ditolak' ? 'disabled' : '' }}>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="false">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                        </svg>
                                        Setuju
                                    </button>
                                </form>

                            <!-- Tombol Tolak -->
                            <form action="{{ route('dekan.verifikasi.update', $item->id_jadwal) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" name="status" value="ditolak" class="tolak-button flex items-center border border-red-500 text-red-500 px-3 py-1 text-xs rounded-lg hover:bg-red-500 hover:text-white transition
                                {{ $item->status === 'disetujui' || $item->status === 'ditolak' ? 'opacity-50 cursor-not-allowed' : 'text-green-500 border-green-500 hover:bg-green-500 hover:text-white' }}" {{ $item->status === 'disetujui' || $item->status === 'ditolak' ? 'disabled' : '' }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Tolak
                                </button>
                            </form>
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

document.addEventListener("DOMContentLoaded", function () {
    const mainCheckbox = document.getElementById("mainCheckbox");
    const rowCheckboxes = document.querySelectorAll(".rowCheckbox");
    const approveButton = document.getElementById("approveButton");
    const rejectButton = document.getElementById("rejectButton");

    // Toggle semua checkbox
    mainCheckbox.addEventListener("change", function () {
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = mainCheckbox.checked;
        });
    });

    // Fungsi untuk bulk update
    function handleBulkUpdate(status) {
        const selectedIds = Array.from(rowCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.dataset.id);

        if (selectedIds.length === 0) {
            alert("Pilih setidaknya satu jadwal untuk melakukan aksi.");
            return;
        }

        fetch("{{ route('dekan.jadwal.bulkUpdate') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ ids: selectedIds, status: status })
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload(); // Refresh halaman
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Terjadi kesalahan saat memproses permintaan.");
            });
    }

    // Event untuk tombol approve dan reject
    approveButton.addEventListener("click", function (e) {
        e.preventDefault();
        handleBulkUpdate("disetujui");
    });

    rejectButton.addEventListener("click", function (e) {
        e.preventDefault();
        handleBulkUpdate("ditolak");
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Menghilangkan pesan sukses
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        setTimeout(() => {
            successMessage.style.transition = "opacity 0.5s ease";
            successMessage.style.opacity = "0";
            setTimeout(() => successMessage.remove(), 500); // Menghapus elemen setelah animasi
        }, 5000); // 5 detik
    }

    // Menghilangkan pesan error
    const failedMessage = document.getElementById('failed-message');
    if (failedMessage) {
        setTimeout(() => {
            failedMessage.style.transition = "opacity 0.5s ease";
            failedMessage.style.opacity = "0";
            setTimeout(() => failedMessage.remove(), 500); // Menghapus elemen setelah animasi
        }, 5000); // 5 detik
    }
});

    </script>

</body>
</html>