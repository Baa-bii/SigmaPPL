<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Dashboard Dosen Wali</title>
</head>
<body>
    
<div class="antialiased bg-gray-50 dark:bg-gray-900">

    <!--Navbar-->    
    <x-header></x-header>

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->

    <main class="p-16 md:ml-64 h-auto pt-20">
      <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 mt-4">Dashboard</h1>
      
      <!-- Konten 1 -->
      <div class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-48 mb-8">
          <div class="relative bg-gray-800 rounded-lg border-gray-300 dark:border-gray-600 h-28 flex items-center">
              <!-- Nama Dosen -->
              <h1 class="text-xl font-semibold text-yellow-400 dark:text-white text-center mt-8 pl-64">
                  {{ $dosen->nama_dosen ?? 'Nama tidak ditemukan' }}
              </h1>
          </div>
          <div class="relative flex items-center">
              <!-- NIP dan Email -->
              <h1 class="text-l text-black dark:text-white text-center mt-4 pl-64">
                  NIP : {{ $dosen->nip_dosen ?? 'NIP tidak ditemukan' }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->email }}
              </h1>
              <!-- Foto Profil -->
              <img 
                  class="absolute -bottom-6 left-12 w-36 h-36 rounded-full" 
                  src="{{ asset('img/USERFIX.jpg') }}" 
                  alt="photo profile"
              />
          </div>
      </div>

      
      <!-- Konten 2 -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 mb-8">
            <!-- First column -->
            <div class="rounded-lg dark:border-gray-600 h-auto">     
                <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <!-- Header with title and three-dot icon -->
                    <div class="flex justify-between items-center mb-1">
                        <h5 class="text-l font-semibold leading-none text-gray-900 dark:text-white text-center flex-grow">Status Akademik Mahasiswa</h5>
                        <button id="widgetDropdownButton1" data-dropdown-toggle="widgetDropdown1" data-dropdown-placement="bottom" type="button" class="inline-flex items-center justify-center text-gray-500 w-8 h-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm">
                            <svg class="w-3.5 h-3.5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                            </svg>
                            <span class="sr-only">Open dropdown</span>
                        </button>
                    </div>
                    <!-- Dropdown Content -->
                    <div id="widgetDropdown1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="widgetDropdownButton1">
                            <!-- Add options as needed -->
                        </ul>
                    </div>
                    <!-- Pie Chart for Status Akademik Mahasiswa -->
                    <div class="py-6" id="pie-chart-1"></div>
                </div>
            </div>

            <!-- Second column -->
            <div class="rounded-lg dark:border-gray-600 h-auto">     
                <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between items-center mb-1">
                        <h5 class="text-l font-semibold leading-none text-gray-900 dark:text-white text-center flex-grow">Status Pengisian IRS Mahasiswa</h5>
                        <button id="widgetDropdownButton3" data-dropdown-toggle="widgetDropdown3" data-dropdown-placement="bottom" type="button" class="inline-flex items-center justify-center text-gray-500 w-8 h-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm">
                            <svg class="w-3.5 h-3.5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                            </svg>
                            <span class="sr-only">Open dropdown</span>
                        </button>
                    </div>
                    <div id="widgetDropdown3" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="widgetDropdownButton3">
                            <!-- Add options as needed -->
                        </ul>
                    </div>
                    <div class="py-6" id="pie-chart-3"></div>
                </div>
            </div>

            <!-- Third column -->
            <div class="rounded-lg dark:border-gray-600 h-auto">     
                <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between items-center mb-1">
                        <h5 class="text-l font-semibold leading-none text-gray-900 dark:text-white text-center flex-grow">Status Penyetujuan IRS Mahasiswa</h5>
                        <button id="widgetDropdownButton2" data-dropdown-toggle="widgetDropdown2" data-dropdown-placement="bottom" type="button" class="inline-flex items-center justify-center text-gray-500 w-8 h-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm">
                            <svg class="w-3.5 h-3.5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                            </svg>
                            <span class="sr-only">Open dropdown</span>
                        </button>
                    </div>
                    <div id="widgetDropdown2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="widgetDropdownButton2">
                            <!-- Add options as needed -->
                        </ul>
                    </div>
                    <div class="py-6" id="pie-chart-2"></div>
                </div>
            </div>
        </div>


      <!-- Konten 3-->
      <div class="rounded-lg dark:border-gray-600 h-auto mb-8">     
          <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-8 mt-2">Kegiatan Administrasi Akademik Semester Gasal 2024/2025</h3>  
            <ol class="relative border-s border-gray-200 dark:border-gray-700">                  
                <li class="mb-8 ms-8">            
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h6 class="flex items-center mb-1 text-lg text-gray-900 dark:text-white">Pembayaran biaya pendidikan semester Gasal 2024/2025</h6>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Mulai : 01 Juli 2024</time>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Selesai : 25 Agustus 2024</time>
                </li>

                <li class="mb-8 ms-8">  
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h6 class="flex items-center mb-1 text-lg text-gray-900 dark:text-white">HER-Registrasi akademik semester Gasal 2024/2025</h6>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Mulai : 02 Juli 2024</time>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Selesai : 25 Agustus 2024</time>
                </li>

                <li class="mb-8 ms-8">  
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h6 class="flex items-center mb-1 text-lg text-gray-900 dark:text-white">Registrasi akademik (pengisian IRS) semester Gasal 2024/2025</h6>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Mulai : 02 Juli 2024</time>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Selesai : 25 Agustus 2024</time>
                </li>

                <li class="mb-8 ms-8">  
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h6 class="flex items-center mb-1 text-lg text-gray-900 dark:text-white">Batas akhir surat permohonan pindah program studi semester Gasal 2024/2025 dari dalam dan luar lingkungan Undip</h6>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Mulai : 21 Juli 2024</time>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Selesai : -</time>
                </li>

                <li class="mb-8 ms-8">  
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h6 class="flex items-center mb-1 text-lg text-gray-900 dark:text-white">Batas akhir penyampaian surat permohonan aktif kembali setelah mangkir kuliah</h6>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Mulai : 12 Agustus 2024</time>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Selesai : -</time>
                </li>

                <li class="mb-8 ms-8">  
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h6 class="flex items-center mb-1 text-lg text-gray-900 dark:text-white">Batas akhir penyampaian surat permohonan cuti akademik Gasal 2024/2025</h6>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Mulai : 12 Agustus 2024</time>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Selesai : -</time>
                </li>

                <li class="mb-8 ms-8">  
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h6 class="flex items-center mb-1 text-lg text-gray-900 dark:text-white">Awal kuliah Gasal 2024/2025</h6>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Mulai : 19 Agustus 2024</time>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Selesai : -</time>
                </li>

                <li class="mb-8 ms-8">  
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h6 class="flex items-center mb-1 text-lg text-gray-900 dark:text-white">Batas akhir perubahan IRS untuk penggantian mata kuliah Gasal 2024/2025</h6>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Mulai : 30 Agustus 2024</time>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Selesai : -</time>
                </li>

                <li class="mb-8 ms-8">  
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h6 class="flex items-center mb-1 text-lg text-gray-900 dark:text-white">Batas akhir pembatalan IRS untuk penggantian mata kuliah Gasal 2024/2025</h6>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Mulai : 13 September 2024</time>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Selesai : -</time>
                </li>
            </ol>
      </div>

    </main>

    <x-footerdosen></x-footerdosen>

  </div>

    <script>
        const getChartOptions = (labels) => {
        return {
            series: labels.length === 2 ? [70, 30] : [52.8, 26.8, 20.4], // Example data
            colors: ["#9CA3AF", "#1F2937", "#E3A008"],
            chart: {
            height: 250,
            width: "100%", 
            type: "pie",
            },
            labels: labels,
            dataLabels: {
            enabled: true,
            style: {
                fontFamily: "Inter, sans-serif",
            },
            },
            legend: {
            position: "bottom",
            fontFamily: "Inter, sans-serif",
            },
        };
        };

        // Render chart in the first column
        if (document.getElementById("pie-chart-1")) {
            const chart1 = new ApexCharts(document.getElementById("pie-chart-1"), getChartOptions(["Aktif", "Cuti", "Mangkir"]));
            chart1.render();
        }

        // Render chart in the second column
        if (document.getElementById("pie-chart-3")) {
            const chart3 = new ApexCharts(document.getElementById("pie-chart-3"), getChartOptions(["Sudah Isi", "Belum Isi"]));
            chart3.render();
        }

        // Render chart in the third column
        if (document.getElementById("pie-chart-2")) {
            const chart2 = new ApexCharts(document.getElementById("pie-chart-2"), getChartOptions(["Disetujui", "Belum Disetujui"]));
            chart2.render();
        }
    </script>
  

  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.19/dist/flowbite.min.js"></script>
</body>
</html>