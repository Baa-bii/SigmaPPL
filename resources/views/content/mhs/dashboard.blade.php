<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Mahasiswa</title>
    <link rel="icon" href="{{ asset('img/fix.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>


<body>
  <div class="antialiased bg-gray-50 dark:bg-gray-900 flex flex-col min-h-screen">
        <x-header></x-header>
        <x-sidebar></x-sidebar>
        <main class="md:ml-64 h-auto pt-10 flex-grow">
            <div class="container max-w-7xl mx-auto p-6">
                <h1 class="mt-10 text-lg font-semibold text-gray-900 dark:text-white mb-4">Dashboard</h1>
                <!-- Main Content -->
                <div class="main-content">
                    <!--Profile-->
                    <div class="bg-white border dark:border-gray-600 mb-4 relative rounded-lg">
                        <!-- Profile Photo Positioned in the Middle Left -->
                        <div class="absolute top-1/2 left-4 transform -translate-y-1/2">
                            <img 
                                class="w-36 h-36 "  
                                src="{{ asset('img/USER.png') }}" 
                                alt="photo profile"
                            />
                        </div>

                        <div class="bg-gray-800 rounded-lg border-gray-300 dark:border-gray-600 h-20 flex items-center justify-lefy pl-36">
                            <h1 class="text-xl font-semibold text-yellow-400 dark:text-white">
                                {{ $mhs->nama_mhs }}
                            </h1>
                        </div>

                        <div class="bg-white h-20 flex items-center justify-left pl-36 rounded-lg">
                            <h2 class="text-l text-black dark:text-gray-700">
                                NIM : {{ $mhs->nim }} | Informatika S1
                            </h2>
                        </div>
                    </div>
                    
                    <!-- Status Akademik -->
                    <div class="flex flex-col lg:flex-row gap-6 mb-6">
                        <div class="flex-1 p-6 shadow-md bg-white rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Status Akademik</h3>
                            <p class="text-gray-600 mb-4">Dosen Wali: {{ ($mhs->dosen)->nama_dosen ?? 'Tidak Diketahui' }} <i class="fab fa-whatsapp text-green-500"></i></p>
                            <p class="text-gray-600 mb-4">NIP: {{ $mhs->nip_dosen ?? 'Tidak Diketahui' }}</p>
                            <hr class="border-t border-gray-300 mb-4">

                            <div class="flex justify-between items-center gap-4">
                                <div class="text-center flex-1">
                                    <p class="text-sm">Semester Akademik Sekarang</p>
                                    <p class="text-lg font-bold mt-1">{{ $mhs->semester_aktif->where('is_active', true)->first()->tahun_akademik ?? 'Tidak Diketahui' }}</p>
                                </div>
                                <div class="h-12 border-l border-gray-400"></div>
                                <div class="text-center flex-1">
                                    <p class="text-sm">Semester Studi</p>
                                    <p class="text-lg font-bold mt-1">{{ $mhs->semester_aktif->where('is_active', true)->first()->semester ?? 'Tidak Diketahui' }}</p>
                                </div>
                                <div class="h-12 border-l border-gray-400"></div>
                                <div class="text-center flex-1">
                                    <p class="text-sm">Status Akademik</p>
                                    <p class="text-lg font-bold mt-1 
                                        @if(isset($mhs->semester_aktif) && $mhs->semester_aktif->where('is_active', true)->first()->status === 'Aktif') text-green-600
                                        @elseif(isset($mhs->semester_aktif) && $mhs->semester_aktif->where('is_active', true)->first()->status === 'Cuti') text-blue-600
                                        @else text-red-600 @endif">
                                        {{ $mhs->semester_aktif->where('is_active', true)->first()->status ?? 'Belum Registrasi' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 lg:flex-none bg-white p-6 shadow-md lg:w-1/3 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Prestasi Akademik</h3>
                            <div class="flex items-center justify-center h-full gap-8">
                                <div class="text-center">
                                    <p class="text-sm">IPK</p>
                                    <p class="text-xl font-bold mt-1">{{ $ipk }}</p>
                                </div>
                                <div class="h-12 border-l border-gray-400"></div>
                                <div class="text-center">
                                    <p class="text-sm">SKS</p>
                                    <p class="text-xl font-bold mt-1">{{ $totalSKS }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Section (Registrasi and Akademik) -->
                    <div class="menu-section">
                        <div class=" bg-yellow-300 p-4 mb-6 shadow-lg rounded-md hover:transition transform hover:scale-105">
                            <a href="/mhs/registrasi" </a>
                            <h3 class="text-lg font-bold mb-4">Registrasi</h3>
                            
                            <div class="flex justify-start">
                                <p class="bg-gray-400 text-white px-2 py-2 text-sm mr-2">Pilih Status Akademik</p>
                                <span class="px-2 py-2 text-sm text-white
                                    @if(isset($mhs->semester_aktif) && $mhs->semester_aktif->where('is_active', true)->first()->status === 'Aktif') bg-green-600
                                    @elseif(isset($mhs->semester_aktif) && $mhs->semester_aktif->where('is_active', true)->first()->status === 'Cuti') bg-blue-700
                                    @else bg-red-600 @endif">
                                    Mahasiswa {{ $mhs->semester_aktif->where('is_active', true)->first()->status ?? 'Belum Registrasi' }}
                                </span>
                            </div>

                        </div>
                        <div class=" bg-yellow-300 p-4 shadow-lg rounded-md hover:transition transform hover:scale-105">
                            <a href="/mhs/akademik"</a>
                            <h3 class="text-lg font-bold mb-4">Isian Rencana Studi</h3>
                            <div class="flex justify-start">
                                <p class="text-sm py-2 mr-2">TA {{ $mhs->semester_aktif->where('is_active', true)->first()->tahun_akademik ?? 'Tidak Diketahui' }}</p>
                                <p class="bg-gray-400 text-white px-2 py-2 text-sm mr-2">Buat IRS</p>
                                <p class="bg-gray-400 text-white px-2 py-2 text-sm mr-2"> Lihat IRS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-footerdosen></x-footerdosen>
    </div>
</html>
