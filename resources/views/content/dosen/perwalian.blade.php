<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perwalian</title>
    <link rel="icon" href="{{ asset('img/fix.png') }}" type="image/png">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    
  <div class="antialiased bg-gray-50 dark:bg-gray-900">
    <!--Navbar-->    
    <x-header></x-header>

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->

    <main class="p-16 md:ml-64 h-auto pt-20">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 mt-4">Perwalian</h1>

        <!-- Konten 1 -->
        <div class="relative rounded-lg shadow-md bg-white h-48 mb-4 p-4">
            <!-- Dropdown Pilih Angkatan -->
            <form class="absolute left-8 top-8 w-[320px]">
                <form method="GET" action="{{ route('dosen.perwalian.index') }}" class="mb-6">
                    @csrf    
                    <select name="angkatan" onchange="this.form.submit()" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" {{ $angkatan == null ? 'selected' : '' }}>Semua Angkatan</option>
                        @foreach($angkatanList as $angkatanOption)
                            <option value="{{ $angkatanOption }}" {{ $angkatan == $angkatanOption ? 'selected' : '' }}>
                                {{ $angkatanOption }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </form>

            <!-- Container Flex untuk memusatkan tombol -->
            <div class="flex justify space-x-8 mt-24 ml-4">
                <!-- Tombol Setujui IRS -->
                <button id="approveIRS" type="button" class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-black border border-gray-800 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-3 h-3 text-black mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    Setujui IRS
                </button>

                <!-- Tombol Batalkan Persetujuan IRS -->
                <button id="rejectIRS" type="button" class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-black border border-gray-800 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-3 h-3 text-black mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    Batalkan Persetujuan IRS
                </button>

                <!-- Tombol Beri Izin Perubahan IRS -->
                <button id="givePermission" type="button" class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-black border border-gray-800 rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-3 h-3 text-black mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    Beri Izin Perubahan IRS
                </button>
            </div>
        </div>

        <!-- Konten 2 -->
        <div class="rounded-lg bg-white h-auto mb-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex items-center justify-between flex-wrap md:flex-row pb-8 bg-white dark:bg-gray-900">
                    <!-- Action Button -->
                    <div class="relative ml-8 mt-8">
                        <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            {{ 
                                match (request('filter')) {
                                    'sudah_disetujui' => 'Semua Sudah Disetujui',
                                    'belum_disetujui' => 'Semua Belum Disetujui',
                                    'sudah_isi_irs' => 'Semua Sudah Isi IRS',
                                    'belum_isi_irs' => 'Semua Belum Isi IRS',
                                    'aktif' => 'Semua Aktif',
                                    'cuti' => 'Semua Cuti',
                                    'belum_registrasi' => 'Semua Belum Registrasi',
                                    default => 'Filter', // Default teks jika tidak ada filter
                                }
                            }}
                            <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        
                        <!-- Dropdown menu -->
                        <div id="dropdownAction" class="z-10 hidden border border-gray-300 bg-white divide-y divide-gray-100 rounded-lg shadow w-50 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 whitespace-nowrap" aria-labelledby="dropdownActionButton">
                            <li><a href="?filter=sudah_disetujui&angkatan={{ request('angkatan') }}" class="block px-4 py-2 hover:bg-gray-300 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white {{ request('filter') == 'sudah_disetujui' ? 'bg-gray-300' : '' }}">Semua Sudah Disetujui</a></li>
                                <li><a href="?filter=belum_disetujui&angkatan={{ request('angkatan') }}" class="block px-4 py-2 hover:bg-gray-300 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white {{ request('filter') == 'belum_disetujui' ? 'bg-gray-300' : '' }}">Semua Belum Disetujui</a></li>
                                <li><a href="?filter=sudah_isi_irs&angkatan={{ request('angkatan') }}" class="block px-4 py-2 hover:bg-gray-300 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white {{ request('filter') == 'sudah_isi_irs' ? 'bg-gray-300' : '' }}">Semua Sudah Isi IRS</a></li>
                                <li><a href="?filter=belum_isi_irs&angkatan={{ request('angkatan') }}" class="block px-4 py-2 hover:bg-gray-300 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white {{ request('filter') == 'belum_isi_irs' ? 'bg-gray-300' : '' }}">Semua Belum Isi IRS</a></li>
                                <li><a href="?filter=aktif&angkatan={{ request('angkatan') }}" class="block px-4 py-2 hover:bg-gray-300 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white {{ request('filter') == 'aktif' ? 'bg-gray-300' : '' }}">Semua Aktif</a></li>
                                <li><a href="?filter=cuti&angkatan={{ request('angkatan') }}" class="block px-4 py-2 hover:bg-gray-300 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white {{ request('filter') == 'cuti' ? 'bg-gray-300' : '' }}">Semua Cuti</a></li>
                                <li><a href="?filter=belum_registrasi&angkatan={{ request('angkatan') }}" class="block px-4 py-2 hover:bg-gray-300 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white {{ request('filter') == 'belum_registrasi' ? 'bg-gray-300' : '' }}">Semua Belum Registrasi</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Dropdown untuk Menentukan Jumlah Kolom per Halaman -->
                    <form action="{{ route('dosen.perwalian.index') }}" method="GET" class="inline-flex items-center mt-8 ml-8">
                        <label for="per_page" class="mr-2 text-gray-600 dark:text-gray-400">Tampilkan</label>
                        <select name="per_page" id="per_page" onchange="this.form.submit()" class="border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-black focus:border-black block px-3 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        <input type="hidden" name="angkatan" value="{{ request('angkatan') }}">
                        <input type="hidden" name="filter" value="{{ request('filter') }}">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    </form>

                    <!-- Search Bar -->
                    <div class="relative flex items-center mr-10 mt-8">
                        <div class="absolute left-3 inset-y-0 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <form action="{{ route('dosen.perwalian.index') }}" method="GET">
                            <input type="text" name="search" value="{{ request()->input('search') }}" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Mahasiswa">
                            <input type="hidden" name="angkatan" value="{{ request('angkatan') }}">
                            <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                            <input type="hidden" name="filter" value="{{ request('filter') }}">
                        </form>

                        <!-- Tombol Reset -->
                        <form action="{{ route('dosen.perwalian.index') }}" method="GET" class="ml-2">
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-center inline-flex items-center text-gray-500 border border-gray-300 rounded-lg hover:bg-yellow-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">
                                Reset
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Table -->
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">NIM</th>
                            <th scope="col" class="px-6 py-3">Prodi</th>
                            <th scope="col" class="px-6 py-3">Angkatan</th>
                            <th scope="col" class="px-6 py-3">Jalur Masuk</th>
                            <th scope="col" class="px-6 py-3">IP Lalu</th>
                            <th scope="col" class="px-6 py-3">SKS Diambil</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswa as $mhs)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            class="checkbox-item w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                            value="{{ $mhs->irs_id }}" 
                                            data-status="{{ $mhs->status }}">
                                        <label for="checkbox-table-search-{{ $mhs->irs_id }}" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="pl-3 ">
                                        <a href="{{ route('dosen.perwalian.show', $mhs->nim) }}" class="text-blue-600 font:light hover:underline">
                                            {{ $mhs->nama_mhs }}
                                        </a>
                                    </div>
                                </th>
                                <td class="px-6 py-4">{{ $mhs->nim }}</td>
                                <td class="px-6 py-4">{{ $mhs->programStudi->nama_prodi ?? 'Tidak Ditemukan' }}</td>
                                <td class="px-6 py-4">{{ $mhs->angkatan }}</td>
                                <td class="px-6 py-4">{{ $mhs->jalur_masuk }}</td>
                                <td class="px-6 py-4">{{ number_format($mhs->ip_lalu, 2) }}</td>
                                <td class="px-6 py-4">{{ $mhs->sks_diambil ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $mhs->status ?? 'Belum Registrasi' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center border px-4 py-2">Tidak ada data mahasiswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 ml-5 mb-5">
                        Menampilkan 
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $mahasiswa->firstItem() }}-{{ $mahasiswa->lastItem() }}
                        </span> 
                        dari 
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $mahasiswa->total() }}
                        </span>
                    </span>
                    <ul class="inline-flex items-center -space-x-px text-sm h-8 mr-5 mb-5">
                        <!-- Tombol Previous -->
                        @if($mahasiswa->onFirstPage())
                            <li>
                                <span class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                    Previous
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $mahasiswa->previousPageUrl() }}&per_page={{ $perPage }}&angkatan={{ $angkatan }}&filter={{ $filter }}&search={{ $search }}" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    Previous
                                </a>
                            </li>
                        @endif

                        <!-- Nomor Halaman -->
                        @for($i = 1; $i <= $mahasiswa->lastPage(); $i++)
                            @if($i == $mahasiswa->currentPage())
                                <li>
                                    <span class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">
                                        {{ $i }}
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $mahasiswa->url($i) }}&per_page={{ $perPage }}&angkatan={{ $angkatan }}&filter={{ $filter }}&search={{ $search }}" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        {{ $i }}
                                    </a>
                                </li>
                            @endif
                        @endfor

                        <!-- Tombol Next -->
                        @if($mahasiswa->hasMorePages())
                            <li>
                                <a href="{{ $mahasiswa->nextPageUrl() }}&per_page={{ $perPage }}&angkatan={{ $angkatan }}&filter={{ $filter }}&search={{ $search }}" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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

    </main>
    
    <!--Footer-->    
    <x-footerdosen></x-footerdosen>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
    const selectAllCheckbox = document.getElementById('checkbox-all-search');
    const checkboxes = document.querySelectorAll('.checkbox-item');
    const approveButton = document.getElementById('approveIRS');
    const rejectButton = document.getElementById('rejectIRS');
    const permissionButton = document.getElementById('givePermission');

    // Fungsi untuk menangani seleksi semua checkbox
    selectAllCheckbox.addEventListener('change', () => {
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    // Fungsi untuk Setujui IRS
    approveButton.addEventListener('click', () => {
        handleAction('Belum Disetujui', 'Sudah Disetujui');
    });

    // Fungsi untuk Batalkan Persetujuan IRS
    rejectButton.addEventListener('click', () => {
        handleAction('Sudah Disetujui', 'Belum Disetujui');
    });

    // Fungsi untuk Beri Izin Perubahan IRS
    permissionButton.addEventListener('click', () => {
        handleAction('Sudah Disetujui', 'Belum Disetujui');
    });

    // Fungsi untuk validasi dan pengiriman data
    function handleAction(requiredStatus, newStatus) {
        const selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
        if (selectedCheckboxes.length === 0) {
            alert('Pilih minimal satu mahasiswa.');
            return;
        }

        const invalid = selectedCheckboxes.some(checkbox => checkbox.dataset.status !== requiredStatus);
        if (invalid) {
            alert(`Aksi ini hanya berlaku untuk status "${requiredStatus}".`);
            return;
        }

        const ids = selectedCheckboxes.map(checkbox => checkbox.value);
        updateIRSStatus(ids, newStatus);
    }

    // Fungsi untuk mengirimkan data ke server
    function updateIRSStatus(ids, status) {
        fetch('/dosen/updateirsstatus', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ ids, status }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert('Terjadi kesalahan. Coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan.');
            });
        }
    });
  </script>

  <!-- JS Script for filter handling -->
  <script>
    document.querySelectorAll('[data-filter]').forEach(function (filterOption) {
        filterOption.addEventListener('click', function () {
            const filterValue = this.getAttribute('data-filter');
            const perPage = document.getElementById('per_page').value || 10; // Ambil nilai per_page dari dropdown
            const searchParams = new URLSearchParams(window.location.search);
            
            // Update query parameters
            searchParams.set('filter', filterValue);
            searchParams.set('per_page', perPage);

            // Redirect dengan query parameters yang diperbarui
            window.location.href = `${window.location.pathname}?${searchParams.toString()}`;
        });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.19/dist/flowbite.min.js"></script>

</body>
</html>