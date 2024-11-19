<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Dekan</title>
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
        <main>
        <!-- Main Content -->
        <main class="p-22 md:ml-64 h-auto pt-20" >
        <!-- Konten 1-->
        <div class="bg-white border-gray-200 dark:border-gray-600 h-48 mb-4 mt-2 mr-4 shadow">
            <div class="relative bg-gray-800 border-gray-800 dark:border-gray-600 h-24 shadow">
                <h1 class="absolute text-xl font-bold text-yellow-400 dark:text-white" 
                    style="top: 60%; left: 40%; transform: translate(-50%, -50%);">
                    JACK BLUES BIEBER, S. Kom., M. Kom.
                </h1>
                <h1 class="absolute text-l text-black dark:text-white" 
                    style="top: 135%; left: 42%; transform: translate(-50%, -50%);">
                    NIP : 199112092024061001        |       jackbb@lecturer.sigma.ac.id
                </h1>
                <img 
                    class="absolute -bottom-20 left-10 w-40 h-40 rounded-full border"  
                    src="{{ asset('img/user.png') }}" 
                    alt="photo profile"
                />
            </div>
        </div>
        <div class="relative max-w-screen-lg mx-auto p-4 bg-white shadow mr-4">
            <!-- Tabel dengan Wrapper -->
            <h3 class="text-lg font-semibold mb-4">Informasi Persetujuan Usulan Jadwal Kuliah</h3>
            <div class="overflow-x-auto border border-gray-200">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-200 text-black">
                            <th class="py-3 px-3 text-left font-medium">NO</th>
                            <th class="py-3 px-3 text-left font-medium">MATA KULIAH</th>
                            <th class="py-3 px-3 text-left font-medium">WAKTU</th>
                            <th class="py-3 px-3 text-left font-medium">DOSEN</th>
                            <th class="py-3 px-3 text-left font-medium">SEMESTER</th>
                            <th class="py-3 px-3 text-left font-medium">RUANGAN</th>
                            <th class="py-3 px-3 text-left font-medium">STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="text-black text-sm">
                        <!-- Contoh Row -->
                        <tr class="border-b">
                            <td class="py-3 px-3 whitespace-nowrap">1</td>
                            <td class="py-3 px-3 whitespace-nowrap">Pengembangan Berbasis Platform</td>
                            <td class="py-3 px-3 whitespace-nowrap">07.00 - 10.20</td>
                            <td class="py-3 px-3 whitespace-nowrap">Sandy Kurniawan, S. Kom., M. Kom.</td>
                            <td class="py-3 px-3 whitespace-nowrap">5</td>
                            <td class="py-3 px-3 whitespace-nowrap">E101</td>
                            <td class="py-3 px-3 whitespace-nowrap">
                                <span class="bg-green-200 text-green-600 px-3 py-1 rounded-full text-sm">Setuju</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="relative max-w-screen-lg mx-auto p-4 bg-white shadow mr-4 mt-4">
            <!-- Tabel dengan Wrapper -->
            <h3 class="text-lg font-semibold mb-4">Informasi Persetujuan Usulan Ruang Kuliah</h3>
            <div class="overflow-x-auto border border-gray-200">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-200 text-black">
                            <th class="py-3 px-3 text-left font-medium">NO</th>
                            <th class="py-3 px-3 text-left font-medium">KELAS</th>
                            <th class="py-3 px-3 text-left font-medium">WAKTU</th>
                            <th class="py-3 px-3 text-left font-medium">KAPASITAS</th>
                            <th class="py-3 px-3 text-left font-medium">GEDUNG</th>
                            <th class="py-3 px-3 text-left font-medium">KEPERLUAN</th>
                            <th class="py-3 px-3 text-left font-medium">STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="text-black text-sm">
                        <!-- Contoh Row -->
                        <tr class="border-b">
                            <td class="py-3 px-3 whitespace-nowrap">1</td>
                            <td class="py-3 px-3 whitespace-nowrap">Pengembangan Berbasis Platform</td>
                            <td class="py-3 px-3 whitespace-nowrap">07.00 - 10.20</td>
                            <td class="py-3 px-3 whitespace-nowrap">Sandy Kurniawan, S. Kom., M. Kom.</td>
                            <td class="py-3 px-3 whitespace-nowrap">5</td>
                            <td class="py-3 px-3 whitespace-nowrap">E101</td>
                            <td class="py-3 px-3 whitespace-nowrap">
                                <span class="bg-red-200 text-red-600 px-3 py-1 rounded-full text-sm">Tolak</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>        
    </main>
        <x-footerdosen></x-footerdosen>
    </div>
    <!-- JavaScript untuk Dropdown -->
    <script>
            document.addEventListener("DOMContentLoaded", () => {
                const menuButton = document.getElementById("user-menu-button");
                const dropdownMenu = document.getElementById("dropdown");
                // Toggle dropdown saat tombol diklik
                menuButton.addEventListener("click", (event) => {
                    event.stopPropagation(); // Mencegah penutupan karena klik di luar
                    dropdownMenu.classList.toggle("hidden");
                });
                // Tutup dropdown jika klik di luar
                document.addEventListener("click", () => {
                    dropdownMenu.classList.add("hidden");
                });
            });
        </script>
</body>
</html>