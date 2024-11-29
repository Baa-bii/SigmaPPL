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
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 mt-4">Detail Mahasiswa</h1>

        <!-- Konten 1 -->
        <div class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-64 mb-8">
            <div class="relative bg-gray-800 rounded-lg border-gray-300 dark:border-gray-600 h-28 flex items-center">
                 <!-- Foto Profil -->
                <div class="absolute -bottom-16 left-12">
                    <img 
                        class="w-36 h-36 rounded-full" 
                        src="{{ asset('img/USERFIX.jpg') }}" 
                        alt="photo profile"
                    />
                </div>
                <!-- Nama Dosen -->
                <h1 class="text-xl font-semibold text-yellow-400 dark:text-white text-center mt-8 pl-64">
                    {{ $mahasiswa->nama_mhs ?? 'Nama tidak ditemukan' }}
                </h1>
            </div>
            <!-- Konten Dua Kolom -->
            <div class="flex flex-row justify-between mt-4">
                <!-- Kolom Kiri -->
                <div class="w-1/2 text-left pl-64">
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>NIM:</strong> {{ $mahasiswa->nim }}
                    </p>
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>Semester:</strong> {{ $mahasiswa->programStudi->nama_prodi ?? 'Tidak Ditemukan' }}
                    </p>
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>Tahun Ajaran:</strong> {{ $mahasiswa->angkatan }}
                    </p>
                </div>

                <!-- Kolom Kanan -->
                <div class="w-1/2 text-left pl-24">
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>IPs/SKSs:</strong> {{ $mahasiswa->IPs ?? 'Not Found' }}
                    </p>
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>IPk/SKSk:</strong> {{ $mahasiswa->IPk ?? 'Not Found' }}
                    </p>
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>Max Beban SKS:</strong> {{ $mahasiswa->SKS ?? 'Not Found' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex justify-center flex-wrap -mb-px text-sm font-medium text-center" id="tabs" role="tablist">
                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg border-blue-500 text-blue-500" id="tab-irs" data-tab-target="#content-irs" type="button" role="tab" aria-controls="irs" aria-selected="true">IRS</button>
                </li>
                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="tab-khs" data-tab-target="#content-khs" type="button" role="tab" aria-controls="khs" aria-selected="false">KHS</button>
                </li>
            </ul>
        </div>

        <div id="tabs-content">
            <!-- Konten 2 IRS -->
            <div id="content-irs" class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-auto mb-8 px-6">
                <div id="tabs-title" class="text-xl font-semibold pt-8 pb-4 text-center">Isian Rencana Semester</div>
                    <!-- Accordion IRS content here -->
                    <div id="accordion-irs">    
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <!-- 1 -->
                            <h2 id="accordion-flush-heading-1">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                                    <div class="flex flex-col items-start">
                                        <span>Semester 1  |  Tahun Ajaran 2022/2023 Ganjil</span>
                                        <span class="text-sm text-gray-500 mt-2">Jumlah SKS 21</span>
                                    </div>
                                    <!-- Ikon defaultnya mengarah ke bawah, menggunakan rotate-0 -->
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>

                            <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                                        <!-- Table -->
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <caption class="p-5 text-center text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                                    Sudah Disetujui Wali
                                                </caption>
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            No
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Kode
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Mata Kuliah
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Kelas
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            SKS
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Ruang
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Status
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Nama Dosen
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            1
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            PAIK
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            Metnum
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            B
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            1
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            PAIK
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            Metnum
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            B
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </p>        
                                </div>
                            </div>

                            <!-- 2 -->
                            <h2 id="accordion-flush-heading-2">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                                    <div class="flex flex-col items-start">
                                        <span>Semester 1  |  Tahun Ajaran 2022/2023 Ganjil</span>
                                        <span class="text-sm text-gray-500 mt-2">Jumlah SKS 21</span>
                                    </div>
                                    <!-- Ikon defaultnya mengarah ke bawah, menggunakan rotate-0 -->
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>

                            <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                                        <!-- Table -->
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <caption class="p-5 text-center text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                                    Sudah Disetujui Wali
                                                </caption>
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            No
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Kode
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Mata Kuliah
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Kelas
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            SKS
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Ruang
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Status
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Nama Dosen
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            1
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            PAIK
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            Metnum
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            B
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            1
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            PAIK
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            Metnum
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            B
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </p>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konten 2 KHS -->
            <div id="content-khs" class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-auto mb-8 px-6 hidden">
                <div id="tabs-title" class="text-xl font-semibold pt-8 pb-4 text-center">Kartu Hasil Studi</div>
                    <!-- Accordion KHS content here -->
                    <div id="accordion-khs">    
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                        
                            <!-- 10 -->
                            <h2 id="accordion-flush-heading-10">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-10" aria-expanded="false" aria-controls="accordion-flush-body-10">
                                    <div class="flex flex-col items-start">
                                        <span>Semester 2  |  Tahun Ajaran 2022/2023 Ganjil</span>
                                        <span class="text-sm text-gray-500 mt-2">Jumlah SKS 21</span>
                                    </div>
                                    <!-- Ikon defaultnya mengarah ke bawah, menggunakan rotate-0 -->
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>

                            <div id="accordion-flush-body-10" class="hidden" aria-labelledby="accordion-flush-heading-10">
                                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                                        <!-- Table -->
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <caption class="p-5 text-center text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                                    Sudah Disetujui Wali
                                                </caption>
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            No
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Kode
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Mata Kuliah
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Kelas
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            SKS
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Ruang
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Status
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Nama Dosen
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            1
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            PAIK
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            Metnum
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            B
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            1
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            PAIK
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            Metnum
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            B
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </main>
    
    <!--Footer-->    
    <x-footerdosen></x-footerdosen>

  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Set default active tab (IRS)
        document.getElementById('content-irs').classList.remove('hidden');
        document.getElementById('content-khs').classList.add('hidden');
        document.getElementById('tab-irs').setAttribute('aria-selected', 'true');
        document.getElementById('tab-khs').setAttribute('aria-selected', 'false');
        document.getElementById('tab-irs').classList.add('border-blue-500', 'text-blue-500');
        document.getElementById('tab-khs').classList.remove('border-blue-500', 'text-blue-500');
        
        // Tab switch functionality
        document.getElementById('tab-irs').addEventListener('click', function() {
            document.getElementById('content-irs').classList.remove('hidden');
            document.getElementById('content-khs').classList.add('hidden');
            document.getElementById('tab-irs').setAttribute('aria-selected', 'true');
            document.getElementById('tab-khs').setAttribute('aria-selected', 'false');
            
            // Ensure the accordion content is also visible
            const accordionBodies = document.querySelectorAll('.accordion-body');
            accordionBodies.forEach(body => body.classList.remove('hidden'));

            document.getElementById('tab-irs').classList.add('border-blue-500', 'text-blue-500');
            document.getElementById('tab-khs').classList.remove('border-blue-500', 'text-blue-500');
        });

        document.getElementById('tab-khs').addEventListener('click', function() {
            document.getElementById('content-khs').classList.remove('hidden');
            document.getElementById('content-irs').classList.add('hidden');
            document.getElementById('tab-khs').setAttribute('aria-selected', 'true');
            document.getElementById('tab-irs').setAttribute('aria-selected', 'false');
            
            // Ensure the accordion content is hidden when switching tabs
            const accordionBodies = document.querySelectorAll('.accordion-body');
            accordionBodies.forEach(body => body.classList.add('hidden'));

            document.getElementById('tab-khs').classList.add('border-blue-500', 'text-blue-500');
            document.getElementById('tab-irs').classList.remove('border-blue-500', 'text-blue-500');
        });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Pastikan semua konten accordion tersembunyi secara default
        const accordionBodies = document.querySelectorAll('[id^="accordion-flush-body"]');
        accordionBodies.forEach(body => body.classList.add('hidden')); // Menyembunyikan semua konten accordion

        // Pastikan ikon-ikon mengarah ke bawah setelah refresh
        const accordionIcons = document.querySelectorAll('[data-accordion-icon]');
        accordionIcons.forEach(icon => {
            icon.classList.remove('rotate-0');  // Reset rotasi ke bawah
            icon.classList.add('rotate-180');       // Rotasi ke bawah secara default
        });

        // Menangani klik pada tombol accordion
        const accordionButtons = document.querySelectorAll('[data-accordion-target]');
        accordionButtons.forEach(button => {
            button.addEventListener('click', function () {
                const targetId = button.getAttribute('data-accordion-target');
                const targetElement = document.querySelector(targetId);

                // Toggle visibilitas konten
                targetElement.classList.toggle('hidden');

                // Mengubah rotasi ikon
                const icon = button.querySelector('[data-accordion-icon]');

                // Jika accordion dibuka, rotasi ke atas (0deg)
                if (targetElement.classList.contains('hidden')) {
                    icon.classList.remove('rotate-0');
                    icon.classList.add('rotate-180');
                } else {
                    icon.classList.remove('rotate-180');
                    icon.classList.add('rotate-0');
                }
            });
        });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.19/dist/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>
</html>