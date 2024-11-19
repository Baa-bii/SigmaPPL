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
        <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 mb-8">
            <ul class="flex justify-center space-x-8">
                <li>
                    <a href="#" class="inline-flex items-center p-2 text-gray-500 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">
                        IRS
                    </a>
                </li>
                <li>
                    <a href="#" class="inline-flex items-center p-2 text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500">
                        KHS
                    </a>
                </li>
            </ul>
        </div>

        <!-- Konten 2 -->
        <div class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-auto mb-8 px-6">      
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h2 id="accordion-flush-heading-1">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                    <span>?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Text.</p>
                    <p class="text-gray-500 dark:text-gray-400">Text <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">text</a> text</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-2">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                    <span>?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">?</p>
                    <p class="text-gray-500 dark:text-gray-400">Text <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Text</a> text.</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-3">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                    <span>?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">TEXT.</p>
                    <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                        <li><a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">?</a></li>
                        <li><a href="#" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">?</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>

    </main>
    
    <!--Footer-->    
    <x-footerdosen></x-footerdosen>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.19/dist/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>
</html>