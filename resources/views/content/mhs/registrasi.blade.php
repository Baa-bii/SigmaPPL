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
    <x-headerMHS></x-headerMHS>
    <!-- Breadcrumb -->
    <div class="flex justify-between items-center mb-6">
            <h1 class="text-lg font-semibold text-black">Registrasi</h1>
            <nav class="flex items-center text-sm text-gray-600">
                <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                    <i class="fas fa-home mr-1"></i> Home
                </a>
                <span class="mx-2">/</span>
                <span>Registrasi</span>
            </nav>
        </div>
    </div>

    <!-- Container Utama -->
    <div class="container mx-auto max-w-5xl p-6">
        <!-- Breadcrumb -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-lg font-semibold text-black">Registrasi</h1>
            <nav class="flex items-center text-sm text-gray-600">
                <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                    <i class="fas fa-home mr-1"></i> Home
                </a>
                <span class="mx-2">/</span>
                <span>Registrasi</span>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="space-y-6">
            <!-- Status Pembayaran -->
            <div class="bg-white p-6 shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Status Pembayaran</h3>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600 transition">Bayar</button>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="font-normal">No Pembayaran</p>
                        <p class="font-normal">Nama</p>
                        <p class="font-normal">Nominal</p>
                        <p class="font-normal">Status</p>
                    </div>
                    <div>
                        <p>: 24060122140190</p>
                        <p>: RIZELLE MARIE REGAL</p>
                        <p>: Rp 3.000.000</p>
                        <p><span class="bg-green-600 text-white px-2 py-1 rounded-md">Sudah Dibayar</span></p>
                    </div>
                </div>
                <hr class="border-gray-300 mb-4">
                <p class="text-gray-700">Tagihan sudah terbayar.</p>
            </div>

            <!-- Pilih Status Akademik -->
            <div class="bg-white p-6 shadow-md">
                <h3 class="text-xl font-semibold mb-4">Pilih Status Akademik</h3>
                <div class="flex flex-col md:flex-row gap-6 mb-4">
                    <div class="bg-gray-100 p-6 flex-1">
                        <h3 class="text-lg font-bold mb-2">Aktif</h3>
                        <p class="mb-4">Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).</p>
                        <button class="bg-yellow-500 text-black px-4 py-2 rounded-md text-sm hover:bg-yellow-600 transition">Pilih</button>
                    </div>
                    <div class="bg-gray-100 p-6 flex-1">
                        <h3 class="text-lg font-bold mb-2">Cuti</h3>
                        <p class="mb-4">Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa Undip.</p>
                        <button class="bg-yellow-500 text-black px-4 py-2 rounded-md text-sm hover:bg-yellow-600 transition">Pilih</button>
                    </div>
                </div>
                <hr class="border-gray-300 mb-4">
                <div class="flex items-center">
                    <h3 class="text-lg font-semibold mr-4">Status Akademik:</h3>
                    <button class="bg-red-600 text-white px-4 py-2 rounded-md text-sm">Belum Tersedia</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
