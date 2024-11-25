<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Libre Franklin', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <x-header></x-header>
    <x-sidebar></x-sidebar>
    
    <!-- Container Utama -->
    <main class="md:ml-64 h-auto pt-10">
        
        <div class="container max-w-7xl mx-auto p-6">
            <h1 class="mt-10 text-lg font-semibold text-gray-900 dark:text-white mb-4">Registrasi</h1>
            <!-- Pilih Status Akademik -->
            <div class="bg-white p-6 shadow-md">
                <h3 class="text-xl font-semibold mb-4">Pilih Status Akademik</h3>
                <div class="flex flex-col md:flex-row gap-6 mb-4">
                    <div class="bg-gray-100 p-6 flex-1">
                        <h3 class="text-lg font-bold mb-2">Aktif</h3>
                        <p class="mb-4">Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).</p>
                        <button class="bg-yellow-300 text-black px-4 py-2 rounded-md text-sm hover:bg-yellow-600 transition">Pilih</button>
                    </div>
                    <div class="bg-gray-100 p-6 flex-1">
                        <h3 class="text-lg font-bold mb-2">Cuti</h3>
                        <p class="mb-4">Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa Undip.</p>
                        <button class="bg-yellow-300 text-black px-4 py-2 rounded-md text-sm hover:bg-yellow-600 transition">Pilih</button>
                    </div>
                </div>
                <hr class="border-gray-300 mb-4">
                <div class="flex items-center">
                    <h3 class="text-lg font-semibold mr-4">Status Akademik:</h3>
                    <button class="bg-red-600 text-white px-4 py-2 rounded-md text-sm">Belum Tersedia</button>
                </div>
            </div>
        </div>
    </main>
    <x-footerdosen></x-footerdosen>
</body>
</html>

