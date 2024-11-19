<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akademik</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Libre Franklin', sans-serif;
        }
        .sticky-button-container {
            position: sticky;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header Sigma -->
    <x-headerMHS></x-headerMHS>
    <div class="container w-full mx-auto p-6  max-w-7xl">
        <!-- Breadcrumb -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-lg font-semibold text-black">Akademik</h1>
            <nav class="flex items-center text-sm text-gray-600">
                <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                    <i class="fas fa-home mr-1"></i> Home
                </a>
                <span class="mx-2">/</span>
                <span>Akademik</span>
            </nav>
        </div>
    </div>
    

    <!-- Container Utama -->
    <div class="container w-full mx-auto p-6 max-w-7xl">
        <!-- Breadcrumb -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-lg font-semibold text-black">Akademik</h1>
            <nav class="flex items-center text-sm text-gray-600">
                <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                    <i class="fas fa-home mr-1"></i> Home
                </a>
                <span class="mx-2">/</span>
                <span>Akademik</span>
            </nav>
        </div>
        <!-- Navigation Menu -->
        <div class="flex justify-center items-center border-b-2 border-black mb-6">
            <a href="#" onclick="showTabContent(event, 'buat-irs')" class="nav-item text-blue-900 font-bold py-3 px-6 hover:text-black">BUAT IRS</a>
            <a href="#" onclick="showTabContent(event, 'irs')" class="nav-item text-blue-900 font-bold py-3 px-6 hover:text-black">IRS</a>
            
        </div>

        <!-- BUAT IRS -->
        <div class="tab-content flex flex-col lg:flex-row gap-6" id="buat-irs">
            <!-- Sidebar Informasi Mahasiswa -->
            <div class="bg-white p-6 w-full lg:w-1/3 border border-gray-300">
                <!-- Bagian Nama dan NIM -->
                <div class="border border-gray-300 p-4 mb-6">
                    <div class="mb-4">
                        <h3 class="font-semibold mb-2 text-xs">Nama: <span class="font-normal">RIZELLE MARIE REGAL</span></h3>
                        <h3 class="font-semibold mb-2 text-xs">NIM: <span class="font-normal">2406021240190</span></h3>
                        <h3 class="font-semibold mb-2 text-xs">Semester: <span class="font-normal">5</span></h3>
                    </div>
                    <!-- Garis pemisah -->
                    <hr class="border-t-2 border-gray-300 mb-4">
                    <!-- Bagian Informasi Akademik -->
                    <div class>
                        <p class="text-gray-600 mb-1 text-xs">Th. Ajaran: <span class="font-normal">2024/2025 GANJIL</span></p>
                        <p class="text-gray-600 mb-1 text-xs">IPK (kumulatif): <span class="font-normal">4.0</span></p>
                        <p class="text-gray-600 mb-1 text-xs">IPS (semester lalu): <span class="font-normal">4.0</span></p>
                        <p class="text-gray-600 mb-1 text-xs">Max. Beban SKS: <span class="font-normal">24 SKS</span></p>
                    </div>
                </div>

                <div class="daftar-mk">
                    <!-- Dropdown Tambah Mata Kuliah -->
                    <div class="mt-6">
                        <h3 class="font-semibold mb-2 text-sm">+ Tambah Mata Kuliah</h3>
                        <select name="mata-kuliah" id="mata-kuliah" class="w-full p-2 border rounded bg-gray-50">
                            <option value=""></option>
                            <option value="1">Pengembangan Berbasis Platform</option>
                            <option value="2">Kewirausahaan</option>
                            <option value="3">Komputasi Tersebar dan Paralel</option>
                            <option value="4">Proyek Perangkat Lunak</option>
                            <option value="5">Sistem Informasi</option>
                            <option value="6">Pembelajaran Mesin</option>
                            <option value="7">Keamanan Jaringan dan Jaminan Informasi</option>
                        </select>
                    </div>
                </div>
                <!-- Mata Kuliah Ditampilkan -->
                <div class="mt-6">
                    <h3 class="font-semibold text-sm mb-2">Mata Kuliah Ditampilkan</h3>
                    <div class="p-4 bg-gray-50 rounded-lg shadow">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-green-500"></i>
                            <div>
                                <h4 class="font-semibold text-sm">Pengembangan Berbasis Platform</h4>
                                <p class="text-xs">WAJIB (KM2020)</p>
                                <p class="text-xs">SMT 5</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Jadwal Mata Kuliah -->
            <div class="w-full lg:w-2/3 scroll-smooth">
                <div class="sticky-button-container flex items-center justify-end p-0 mb-0">
                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">SKS</button>
                </div>

                <div class="overflow-x-auto -mt-11">
                    <table class="w-full border-collapse border border-gray-300 bg-white">
                        <thead>
                            <tr>
                            <th class="border border-gray-300 p-2">WAKTU<br><span class="italic text-sm font-medium">TIME</span></th>
                                <th class="border border-gray-300 p-2">SENIN<br><span class="italic text-sm font-medium">MONDAY</span></th>
                                <th class="border border-gray-300 p-2">SELASA<br><span class="italic text-sm font-medium">TUESDAY</span></th>
                                <th class="border border-gray-300 p-2">RABU<br><span class="italic text-sm font-medium">WEDNESDAY</span></th>
                                <th class="border border-gray-300 p-2">KAMIS<br><span class="italic text-sm font-medium">THURSDAY</span></th>
                                <th class="border border-gray-300 p-2">JUMAT<br><span class="italic text-sm font-medium">FRIDAY</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">06:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">07:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">09:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">11:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">13:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">15:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">16:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">17:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">18:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">19:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">20:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">21:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">22:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-2">Simpan</button>
                   
                </div>
            </div>
        </div>
        <!-- Tab Contents Lainnya -->
        <div class="tab-content hidden w-full" id="irs">
            <h2 class="text-center text-xl font-semibold">IRS</h2>
            <p class="text-center mt-2">Di sini kamu bisa membuat IRS baru untuk semester ini.</p>
        </div>

        <div class="tab-content hidden w-full" id="khs">
            <h2 class="text-center text-xl font-semibold">KHS</h2>
            <p class="text-center mt-2">Kartu Hasil Studi (KHS) semester ini akan muncul di sini.</p>
        </div>

        <div class="tab-content hidden w-full" id="transkrip">
            <h2 class="text-center text-xl font-semibold">Transkrip</h2>
            <p class="text-center mt-2">Transkrip nilai lengkap kamu akan muncul di sini.</p>
        </div>
    </div>
    


    

    <script>
        function showTabContent(event, targetId) {
            event.preventDefault();
            
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            
            // Remove active class from all nav items
            document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('text-black', 'font-extrabold'));
            
            // Show the targeted tab content
            document.getElementById(targetId).classList.remove('hidden');
            
            // Set the clicked nav item as active
            event.currentTarget.classList.add('text-black', 'font-extrabold');
        }
    </script>
</body>
</html>
