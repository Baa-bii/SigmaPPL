<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail Mahasiswa</title>
    <link rel="icon" href="{{ asset('img/fix.png') }}" type="image/png">
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
        <div class="mt-4 mb-4 flex items-center space-x-4">
            <a href="{{ route('dosen.perwalian.index') }}" class="text-xl text-black hover:text-blue-500 font-semibold">
                Perwalian >
            </a>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                Detail Mahasiswa
            </h1>
        </div>

        <!-- Konten 1 -->
        <div class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-auto md:h-auto lg:h-64 mb-8">
            <!-- Header -->
            <div class="relative bg-gray-800 rounded-t-lg border-gray-300 dark:border-gray-600 h-auto md:h-28 flex flex-col md:flex-row items-center md:items-start">
                <!-- Foto Profil -->
                <div class="w-24 h-24 md:w-36 md:h-36 rounded-full overflow-hidden border-4 border-white dark:border-gray-800 mt-4 md:absolute md:-bottom-16 md:left-12">
                    <img 
                        class="w-full h-full object-cover" 
                        src="{{ asset('img/USERFIX.jpg') }}" 
                        alt="photo profile"
                    />
                </div>
                <!-- Nama Mahasiswa -->
                <div class="text-center md:text-left mt-4 mb-4 md:mt-14 md:pl-64 w-full">
                    <h1 class="text-l md:text-xl font-semibold text-yellow-400 dark:text-white">
                        {{ $mahasiswa->nama_mhs ?? 'Nama tidak ditemukan' }}
                    </h1>
                </div>
            </div>

            <!-- Konten Dua Kolom -->
            <div class="relative flex flex-col md:flex-row lg:flex-row justify-between mt-6 px-4 md:px-64">
                <!-- Kolom Kiri -->
                <div class="w-full md:w-1/2 text-center md:text-left md:mr-32 md:mb-0">
                    <p class="text-sm md:text-l text-black dark:text-white mb-4">
                        <strong>NIM :</strong> {{ $mahasiswa->nim }}
                    </p>
                    <p class="text-sm md:text-l text-black dark:text-white mb-4">
                        <strong>Semester :</strong> {{ $semester }}
                    </p>
                    <p class="text-sm md:text-l text-black dark:text-white mb-4">
                        <strong>Tahun Ajaran :</strong> {{ $tahunAkademik }}
                    </p>
                </div>

                <!-- Kolom Kanan -->
                <div class="w-full md:w-1/2 text-center md:text-left">
                    <p class="text-sm md:text-l text-black dark:text-white mb-4">
                        <strong>IPs/SKSs : </strong>{{ $ips }}/{{ $ipsData['sks'] }}
                    </p>
                    <p class="text-sm md:text-l text-black dark:text-white mb-4">
                        <strong>IPk/SKSk : </strong>{{ $ipk }}/{{ $ipkData['sks'] }}
                    </p>
                    <p class="text-sm md:text-l text-black dark:text-white mb-4">
                        <strong>Max Beban SKS : </strong>{{ $maxBebanSKSData['max_beban_sks'] }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <!-- <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex justify-center flex-wrap -mb-px text-sm font-medium text-center" id="tabs" role="tablist">
                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg border-blue-500 text-blue-500" id="tab-irs" data-tab-target="#content-irs" type="button" role="tab" aria-controls="irs" aria-selected="true">IRS</button>
                </li>
                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="tab-khs" data-tab-target="#content-khs" type="button" role="tab" aria-controls="khs" aria-selected="false">KHS</button>
                </li>
            </ul>
        </div> -->

        <div id="tabs-content">
            <!-- Konten 2 IRS -->
            <div id="content-irs" class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-auto mb-8 px-6">
                <div id="tabs-title" class="text-xl font-semibold pt-8 pb-6 text-center">Isian Rencana Semester</div>
                <!-- Accordion IRS content here -->
                <div id="accordion-irs">
                    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">   
                            @foreach ($semesterAktifData as $index => $semester)
                                @php
                                    // Periksa apakah semester ini sudah memiliki IRS
                                    $hasIRSForSemester = App\Models\IRS::where('id_TA', $semester->id)->exists();
                                    // Ambil status IRS (misal: Disetujui, Belum Disetujui, dll)
                                    $statusIRS = $hasIRSForSemester ? App\Models\IRS::where('id_TA', $semester->id)->first()->status : null;
                                    $semesterAktifTerbaru = collect($semesterAktifData)->firstWhere('is_active', 1);
                                @endphp

                                @if ($semester->semester > $semesterAktifTerbaru->semester)
                                    @continue {{-- Abaikan semester di atas semester aktif --}}
                                @endif

                                @if (!$hasIRSForSemester && $semester->is_active == 1)
                                    <!-- Jika semester ini tidak punya IRS dan is_active = 1 -->
                                    <div class="p-4 mb-4 text-center text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                        {{ $mahasiswa->nama_mhs ?? 'Nama Mahasiswa' }} belum melakukan pengisian IRS pada semester {{ $semester->semester }} tahun akademik {{ $semester->tahun_akademik }}.
                                    </div>
                                    @continue
                                @endif
                                
                                <h2 id="accordion-flush-heading-{{ $semester->id }}" class="pb-4">
                                    <button type="button" class="flex items-center justify-between bg-gray-100 rounded-lg border-gray-300 w-full pl-3 pr-3 py-3 font-medium rtl:text-right text-black border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-{{ $semester->id }}" aria-expanded="false" aria-controls="accordion-flush-body-{{ $semester->id }}">
                                        <div class="flex flex-col items-start">
                                            <span>Semester {{ $semester->semester }} | Tahun Ajaran {{ $semester->tahun_akademik }}</span>
                                            <span class="text-sm text-gray-500 mt-2">Jumlah SKS {{ $semester->jumlah_sks ?? 'N/A' }}</span>
                                        </div>
                                        <!-- Ikon defaultnya mengarah ke bawah, menggunakan rotate-0 -->
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                        </svg>
                                    </button>
                                </h2>
                            
                                <div id="accordion-flush-body-{{ $semester->id }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $semester->id }}">  
                                    <!-- Table -->
                                    <div class="relative overflow-x-auto rounded-lg border border-gray-300 shadow-md mb-8 sm:rounded-lg">
                                        <table class="w-full text-sm text-left roundertl:text-right text-gray-500 dark:text-gray-400">
                                            <caption class="p-5 text-center text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                                {{ $semester->statusIRS }} <!-- Menampilkan status IRS -->
                                            </caption>
                                            <thead class="text-xs text-yellow-400 uppercase rounded-lg border border-gray-300 bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="border-r px-3 py-3">
                                                                No
                                                    </th>
                                                    <th scope="col" class="border-r px-4 py-3">
                                                                Kode
                                                    </th>
                                                    <th scope="col" class="border-r px-6 py-3">
                                                                Mata Kuliah
                                                    </th>
                                                    <th scope="col" class="border-r px-4 py-3 text-center">
                                                                Kelas
                                                    </th>
                                                    <th scope="col" class="border-r px-4 py-3 text-center">
                                                                SKS
                                                    </th>
                                                    <th scope="col" class="border-r px-4 py-3 text-center">
                                                                Ruang
                                                    </th>
                                                    <th scope="col" class="border-r px-4 py-3 text-center">
                                                                Status
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                                Nama Dosen
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($semester->irsData as $index => $ir)
                                                    <!-- Baris Utama -->
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row" class="px-4 py-4 border-r font-medium text-gray-900 whitespace-nowrap dark:text-white" rowspan="2">
                                                            {{ $index + 1 }}
                                                        </th>
                                                        <td class="px-4 py-4 border-r w-4">{{ $ir->matakuliah->kode_mk }}</td>
                                                        <td class="px-6 py-4 border-r">{{ $ir->matakuliah->nama_mk }}</td>
                                                        <td class="px-4 py-4 border-r text-center align-middle">{{ $ir->jadwal->kelas }}</td>
                                                        <td class="px-4 py-4 border-r text-center align-middle">{{ $ir->matakuliah->sks }}</td>
                                                        <td class="px-4 py-4 border-r text-center align-middle">{{ $ir->jadwal->ruang->gedung ?? 'N/A' }}{{ $ir->jadwal->ruang->nama ?? 'N/A' }}</td>
                                                        <td class="px-4 py-4 border-r text-center align-middle">{{ $ir->status_mata_kuliah }}</td>
                                                        <td class="px-6 py-4">
                                                            @if ($ir->matakuliah->dosen->isNotEmpty())
                                                                @foreach ($ir->matakuliah->dosen as $dosen)
                                                                    {{ $dosen->nama_dosen }}<br>
                                                                @endforeach
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <!-- Baris Tambahan -->
                                                    <tr class="bg-gray-50 border-b dark:bg-gray-700">
                                                        <td colspan="7" class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                                            <strong>{{ $ir->jadwal->hari ?? 'N/A' }}</strong>
                                                            pukul 
                                                            @php
                                                                try {
                                                                    // Pastikan jam_mulai valid dan format sesuai
                                                                    if (!empty($ir->jadwal->waktu->jam_mulai)) {
                                                                        // Format waktu mulai
                                                                        $jamMulai = \Carbon\Carbon::createFromFormat('H:i', substr($ir->jadwal->waktu->jam_mulai, 0, 5));
                                                                        
                                                                        // Hitung waktu selesai berdasarkan SKS (1 SKS = 50 menit)
                                                                        $durasi = $ir->matakuliah->sks * 50; // Durasi dalam menit
                                                                        $jamSelesai = $jamMulai->copy()->addMinutes($durasi);

                                                                        // Format hasil
                                                                        $jamMulaiFormatted = $jamMulai->format('H:i'); // Format konsisten
                                                                        $jamSelesaiFormatted = $jamSelesai->format('H:i'); // Format konsisten
                                                                    } else {
                                                                        $jamMulaiFormatted = 'N/A';
                                                                        $jamSelesaiFormatted = 'N/A';
                                                                    }
                                                                } catch (\Exception $e) {
                                                                    $jamMulaiFormatted = 'Invalid Time';
                                                                    $jamSelesaiFormatted = 'Invalid Time';
                                                                }
                                                            @endphp
                                                            <strong>{{ $jamMulaiFormatted }}</strong> - <strong>{{ $jamSelesaiFormatted }}</strong>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>  
                                    <!-- Tombol Setujui IRS atau Cetak IRS berdasarkan status -->
                                    <div class="flex justify-start mt-4 pl-4">
                                        @if ($statusIRS === 'Sudah Disetujui')
                                            <a href=" {{ route('dosen.cetakirs', $semester->id) }}" target="_blank">
                                                <button type="button" class="text-gray-900 text-center inline-flex items-center border border-gray-800 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2.5 mr-2 mb-8 dark:text-white dark:bg-yellow-500 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                                                    Cetak IRS
                                                </button>
                                            </a>
                                        @else
                                            <button type="button" 
                                                class="text-gray-900 text-center inline-flex items-center border border-gray-800 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2.5 mr-2 mb-8 dark:text-white dark:bg-yellow-500 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800"
                                                onclick="setujuiIRS({{ $semester->id }})">
                                                Setujui IRS
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
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

  <script>
        function setujuiIRS(semesterId) {
        if (confirm('Apakah Anda yakin ingin menyetujui IRS?')) {
            fetch(`/dosen/setujuiirs/${semesterId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);

                    // Perbarui status di UI
                    const accordion = document.querySelector(`#accordion-flush-body-${semesterId}`);
                    const statusElement = accordion.querySelector('caption');
                    const buttonContainer = accordion.querySelector('.flex button');

                    // Ubah status menjadi "Sudah Disetujui"
                    statusElement.textContent = 'Sudah Disetujui';

                    // Ubah tombol menjadi "Cetak IRS"
                    buttonContainer.outerHTML = `
                        <a href="/dosen/cetakirs/${semesterId}" target="_blank">
                            <button type="button" class="text-gray-900 text-center inline-flex items-center border border-gray-800 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2.5 mr-2 mb-8 dark:text-white dark:bg-yellow-500 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                                Cetak IRS
                            </button>
                        </a>
                    `;
                } else {
                    alert('Gagal menyetujui IRS. Coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Coba lagi.');
            });
        }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.19/dist/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>
</html>