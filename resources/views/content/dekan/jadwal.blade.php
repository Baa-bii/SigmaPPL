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
        </main>
        <x-footerdosen></x-footerdosen>
    </div>
</body>
</html>