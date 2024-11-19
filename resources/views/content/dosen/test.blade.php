<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perwalian</title>
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
        <div class="relative rounded-lg bg-white h-48 mb-4 p-4">
            <!-- Dropdown Pilih Angkatan -->
            <form method="GET" action="{{ route('dosen.perwalian.index') }}" class="mb-6">
            <select name="angkatan" onchange="this.form.submit()" class="p-2 border border-gray-300 rounded">
                <option value="" {{ $angkatan == null ? 'selected' : '' }}>Semua Angkatan</option>
                <option value="2024" {{ $angkatan == '2024' ? 'selected' : '' }}>2024</option>
                <option value="2023" {{ $angkatan == '2023' ? 'selected' : '' }}>2023</option>
                <option value="2022" {{ $angkatan == '2022' ? 'selected' : '' }}>2022</option>
                <option value="2021" {{ $angkatan == '2021' ? 'selected' : '' }}>2021</option>
            </select>
        </form>
            <!-- Tombol Filter Data -->
            <button type="button" class="absolute right-56 top-8 px-3 py-2 text-sm font-medium text-center inline-flex items-center text-black bg-gray-400 rounded-lg hover:bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-3 h-3 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                    <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                </svg>
                Filter Data
            </button>

            <!-- Tombol Reset Data -->
            <button type="button" class="absolute right-16 top-8 px-3 py-2 text-sm font-medium text-center inline-flex items-center text-black bg-gray-400 rounded-lg hover:bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-3 h-3 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                    <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                </svg>
                Reset Data
            </button>

            <!-- Container Flex untuk memusatkan tombol -->
            <div class="flex justify space-x-8 mt-24 ml-4">
                <!-- Tombol Setujui IRS -->
                <button type="button" class="px-12 py-2 text-sm font-medium text-center inline-flex items-center text-black bg-green-600 rounded-lg hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-3 h-3 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    Setujui IRS
                </button>

                <!-- Tombol Batalkan Persetujuan IRS -->
                <button type="button" class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-black bg-red-700 rounded-lg hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-3 h-3 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    Batalkan Persetujuan IRS
                </button>

                <!-- Tombol Beri Izin Perubahan IRS -->
                <button type="button" class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-black bg-yellow-400 rounded-lg hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-3 h-3 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
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
                            Filter
                            <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua Sudah Disetujui</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua Belum Disetujui</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="relative flex items-center mr-10 mt-8">
                        <div class="absolute left-3 inset-y-0 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Mahasiswa">
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
                    <tr>
                    <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2">{{ $mhs->nama_mhs }}</td>
                        <td class="border px-4 py-2">{{ $mhs->nim }}</td>
                        <td class="border px-4 py-2">{{ $mhs->prodi }}</td>
                        <td class="border px-4 py-2">{{ $mhs->angkatan }}</td>
                        <td class="border px-4 py-2">{{ $mhs->jalur_masuk }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center border px-4 py-2">Tidak ada data mahasiswa.</td>
                    </tr>
                @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 ml-5 mb-5">Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">100</span></span>
                    <ul class="inline-flex items-center -space-x-px text-sm h-8 mr-5 mb-5">
                        <li><a href="#" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a></li>
                        <li><a href="#" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a></li>
                        <li><a href="#" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a></li>
                        <li><a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a></li>
                        <li><a href="#" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a></li>
                        <li><a href="#" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a></li>
                        <li><a href="#" class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </main>
    
    <!--Footer-->    
    <x-footerdosen></x-footerdosen>

  </div>
  <script>
    document.getElementById('filterButton').addEventListener('click', function(e) {
        e.preventDefault();
        const angkatan = document.getElementById('filterAngkatan').value;

        fetch('{{ route('dosen.perwalian.index') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ angkatan })
        })
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('mahasiswaTable');
            tableBody.innerHTML = '';
            data.forEach(mahasiswa => {
                const row = `
                    <tr>
                        <td>${mahasiswa.nama}</td>
                        <td>${mahasiswa.nim}</td>
                        <td>${mahasiswa.prodi}</td>
                        <td>${mahasiswa.angkatan}</td>
                        <td>${mahasiswa.ip_lalu}</td>
                        <td>${mahasiswa.sks_diambil}</td>
                        <td>${mahasiswa.status}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        });
    });
</script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.19/dist/flowbite.min.js"></script>

</body>
</html>