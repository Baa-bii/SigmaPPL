<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal</title>
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
        <main class="p-22 md:ml-64 h-auto pt-20">      
        <div class="container mx-auto my-3">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Statistik Belum Disetujui -->
                <div class="bg-yellow-400 text-white rounded-lg shadow-md p-6 flex flex-col items-center">
                    <h3 class="text-4xl font-bold mb-1">120</h3>
                    <p class="text-sm font-semibold mb-2">Belum Disetujui</p>
                    <a class="bg-gray-300 text-gray-50 px-3 py-1 rounded-full mt-2 text-white text-sm font-bold">Baru saja</a>
                </div>
                <!-- Statistik Sudah Disetujui -->
                <div class="bg-green-500 text-white rounded-lg shadow-md p-6 flex flex-col items-center">
                    <h3 class="text-4xl font-bold mb-1">300</h3>
                    <p class="text-sm font-semibold mb-2">Sudah Disetujui</p>
                    <a class="bg-gray-300 text-gray-50 px-3 py-1 rounded-full mt-2 text-white text-sm font-bold">Baru saja</a>
                </div>
                <!-- Statistik Ditolak -->
                <div class="bg-red-600 text-white rounded-lg shadow-md p-6 mr-4 flex flex-col items-center">
                    <h3 class="text-4xl font-bold mb-1">60</h3>
                    <p class="text-sm font-semibold mb-2">Ditolak</p>
                    <a class="bg-gray-300 text-gray-50 px-3 py-1 rounded-full mt-2 text-white text-sm font-bold">Baru saja</a>
                </div>
            </div>
        </div>
        <!-- Form Section -->
        <div class="bg-white shadow p-6 mr-4">
            <h3 class="text-lg font-semibold mb-4">Persetujuan Usulan Jadwal Kuliah</h3>
            <div class="space-y-4">
                <div>
                    <label for="program-studi" class="block font-semibold mb-1">Program Studi</label>
                    <label for="program-studi" class="block font-semibold mb-1 text-sm">Pilih Prodi</label>
                    <select id="program-studi" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Pilih Prodi</option>
                        <option value="biologi">Biologi</option>
                        <option value="kimia">Kimia</option>
                        <option value="fisika">Fisika</option>
                        <option value="matematika">Matematika</option>
                        <option value="statistika">Statistika</option>
                        <option value="informatika">Informatika</option>
                        <option value="bioteknologi">Bioteknologi</option>
                    </select>
                </div>
                <div>
                    <label for="semester" class="block font-semibold mb-1">Semester</label>
                    <select id="semester" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Pilih Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                    </select>
                </div>
                <!-- Button Tampilkan -->
                <button type="button" onclick="window.location.href='http://127.0.0.1:8000/verifikasi-jadwal'" class="w-full bg-yellow-400 text-gray-800 block font-semibold py-2 rounded-md hover:bg-yellow-300">
                    Tampilkan
                </button>
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