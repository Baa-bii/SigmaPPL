<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>


<body>
  <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <x-header></x-header>
        <main>
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-lg font-semibold text-black">Dashboard</h1>
                <nav class="flex items-center text-sm text-gray-600">
                    <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                    <span class="mx-2">/</span>
                    <span>Dashboard</span>
                </nav>
            </div>
            <!-- Container Utama -->
            <div class="container max-w-7xl mx-auto p-6">
                <!-- Breadcrumb -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-lg font-semibold text-black">Dashboard</h1>
                    <nav class="flex items-center text-sm text-gray-600">
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-home mr-1"></i> Home
                        </a>
                        <span class="mx-2">/</span>
                        <span>Dashboard</span>
                    </nav>
                </div>

                <!-- Main Content -->
                <div class="main-content">
                    <!-- Profile -->
                    <div class="bg-white border border-gray-300 dark:border-gray-600 mb-4 relative">
                        <!-- Profile Photo Positioned in the Middle Left -->
                        <div class="absolute top-1/2 left-4 transform -translate-y-1/2">
                            <img 
                                class="w-36 h-36 "  
                                src="{{ asset('img/USER.png') }}" 
                                alt="photo profile"
                            />
                        </div>

                        <!-- Yellow Section for Name -->
                        <div class="bg-yellow-400 h-20 flex items-center justify-lefy pl-36">
                            <h1 class="text-xl font-semibold text-black dark:text-white">
                                {{ $mhs->nama_mhs }}
                            </h1>
                        </div>

                        <!-- White Section for NIM and Program -->
                        <div class="bg-white h-20 flex items-center justify-left pl-36">
                            <h2 class="text-l text-black dark:text-gray-700">
                                NIM : {{ $mhs->nim }} | Informatika S1
                            </h2>
                        </div>
                    </div>


                    <!-- Status Akademik -->
                    <div class="flex flex-col lg:flex-row gap-6 mb-6">
                        <div class="flex-1 p-6 shadow-md bg-white">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Status Akademik</h3>
                            <p class="text-gray-600 mb-4">Dosen Wali: {{ ($mhs->dosen)->nama_dosen ?? 'Tidak Diketahui' }} <i class="fab fa-whatsapp text-green-500"></i></p>
                            <p class="text-gray-600 mb-4">NIP: {{ $mhs->nip_dosen }}</p>
                            <hr class="border-t border-gray-300 mb-4">

                            <div class="flex justify-between items-center gap-4">
                                <div class="text-center flex-1">
                                    <p class="text-sm">Semester Akademik Sekarang</p>
                                    <p class="text-lg font-bold mt-1">2024/2025 Ganjil</p>
                                </div>
                                <div class="h-12 border-l border-gray-400"></div>
                                <div class="text-center flex-1">
                                    <p class="text-sm">Semester Studi</p>
                                    <p class="text-lg font-bold mt-1">5</p>
                                </div>
                                <div class="h-12 border-l border-gray-400"></div>
                                <div class="text-center flex-1">
                                    <p class="text-sm">Status Akademik</p>
                                    <p class="text-lg font-bold text-red-600 mt-1">Belum Registrasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 lg:flex-none bg-white p-6 shadow-md lg:w-1/3">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Prestasi Akademik</h3>
                            <div class="flex items-center justify-center h-full gap-8">
                                <div class="text-center">
                                    <p class="text-sm">IPK</p>
                                    <p class="text-xl font-bold mt-1">4.0</p>
                                </div>
                                <div class="h-12 border-l border-gray-400"></div>
                                <div class="text-center">
                                    <p class="text-sm">SKS</p>
                                    <p class="text-xl font-bold mt-1">84</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Section (Registrasi and Akademik) -->
                    <div class="menu-section">
                        <div class="border border-black bg-white p-4 mb-6 shadow-md">
                            <a href="/mhs/registrasi"</a>
                            <h3 class="text-lg font-bold mb-4">Registrasi</h3>
                            
                            <div class="flex justify-start">
                                <p class="bg-gray-300 text-white text-s px-2 py-2 text-sm mr-2">Pilih Status Akademik</p>
                                <button class="bg-red-600 text-white text-sm px-2 py-2">Anda Belum Registrasi</button>
                                
                            </div>
                        </div>
                        <div class="border border-black bg-white p-4 shadow-md">
                            <a href="/mhs/akademik"</a>
                            <h3 class="text-lg font-bold mb-4">Akademik</h3>
                            <p class="text-sm">TA 2024/2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-footermhs></x-footermhs>
    </div>
</html>
