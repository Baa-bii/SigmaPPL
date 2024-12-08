<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak IRS</title>
    <link rel="icon" href="{{ asset('img/fix.png') }}" type="image/png">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <!-- <style>
        @media print {
            table {
                page-break-inside: auto;
                border-collapse: collapse;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            thead {
                display: table-header-group;
            }
            tfoot {
                display: table-footer-group;
            }
            /* Pastikan pemisahan halaman rapi */
            .page-break {
                page-break-before: always;
                break-before: page;
            }
        }
    </style> -->


</head>
<body>

    <div class="header text-center pb-8" style="font-family: 'Times New Roman', Times, serif;">
        <h1 class="text-xs font-semi-bold">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI</h1>
        <h1 class="text-xs font-semi-bold">FAKULTAS SAINS DAN MATEMATIKA</h1>
        <h1 class="text-xs font-semi-bold">UNIVERSITAS DIPONEGORO</h1>
    </div>

    <div class="header text-center pb-8" style="font-family: 'Times New Roman', Times, serif;">
        <h1 class="text-xs font-bold">ISIAN RENCANA STUDI</h1>
        <h1 class="text-xs font-semi-bold">Semester {{ $semester }}</h1>
        <h1 class="text-xs font-semi-bold">TA {{ $tahunMulai }}/{{ $tahunAkhir }}</h1>
    </div>

    <div class="header pb-5" style="font-family: 'Times New Roman', Times, serif; display: grid; grid-template-columns: 115px 1fr; row-gap: 5px;">
        <div>
            <h1 class="text-xs font-semi-bold">NIM<span style="padding-left: 73px; padding-right: 8px;">:</span></h1>
        </div>
        <div>
            <h1 class="text-xs">{{ $mahasiswaData->nim ?? 'N/A' }}</h1>
        </div>
        
        <div>
            <h1 class="text-xs font-semi-bold">Nama Mahasiswa<span style="padding-left: 11px; padding-right: 8px;">:</span></h1>
        </div>
        <div>
            <h1 class="text-xs">{{ $mahasiswaData->nama_mhs }}</h1>
        </div>

        <div>
            <h1 class="text-xs font-semi-bold">Program Studi<span style="padding-left: 26px; padding-right: 8px;">:</span></h1>
        </div>
        <div>
            <h1 class="text-xs">{{ $mahasiswaData->programStudi->nama_prodi ?? 'N/A' }}</h1>
        </div>

        <div>
            <h1 class="text-xs font-semi-bold">Dosen Wali<span style="padding-left: 40px; padding-right: 8px;">:</span></h1>
        </div>
        <div>
            <h1 class="text-xs">{{ $mahasiswaData->dosen->nama_dosen ?? 'N/A' }}</h1>
        </div>
    </div>

    <!-- Tabel IRS -->
    <table class="w-full text-xs border border-black text-black dark:text-gray-400" style="font-family: 'Times New Roman', Times, serif;">
        <thead class="text-xs text-black text-center border-b border-black dark:text-gray-400" style="font-size: 10px;">
            <tr>
            <th scope="col" class="border-r border-black px-1 py-1">No</th>
            <th scope="col" class="border-r border-black px-1 py-1">Kode</th>
            <th scope="col" class="border-r border-black px-1 py-1">Mata Kuliah</th>
            <th scope="col" class="border-r border-black px-1 py-1">Kelas</th>
            <th scope="col" class="border-r border-black px-1 py-1">SKS</th>
            <th scope="col" class="border-r border-black px-1 py-1">Ruang</th>
            <th scope="col" class="border-r border-black px-1 py-1">Status</th>
            <th scope="col" class="px-1 py-1">Nama Dosen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semesterAktifData->irs as $index => $ir)
                <!-- Baris Utama -->
                <tr class="bg-white text-xs border-b border-black dark:bg-gray-800 dark:border-gray-700" style="font-size: 10px;">
                    <th scope="row" class="px-1 py-1 border-r border-black  font-medium text-center whitespace-nowrap">
                        {{ $index + 1 }}
                    </th>
                    <td class="px-2 py-1 border-r border-black text-center">{{ $ir->matakuliah->kode_mk }}</td>
                    <td class="px-2 py-1 border-r border-black text-center">{{ $ir->matakuliah->nama_mk }}</td>
                    <td class="px-2 py-1 border-r border-black text-center">{{ $ir->jadwal->kelas }}</td>
                    <td class="px-2 py-1 border-r border-black text-center">{{ $ir->matakuliah->sks }}</td>
                    <td class="px-2 py-1 border-r border-black text-center">{{ $ir->jadwal->ruang->gedung ?? 'N/A' }}{{ $ir->jadwal->ruang->nama ?? 'N/A' }}</td>
                    <td class="px-2 py-1 border-r border-black text-center">{{ $ir->status_mata_kuliah }}</td>
                    <td class="px-2 py-1">
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
                <tr class="bg-gray-50 border-b text-center border-black dark:bg-gray-700" style="font-size: 10px;">
                    <td colspan="5" class="px-2 py-1 text-gray-700 dark:text-gray-300">
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

    <!-- Tanda Tangan -->
    <div class="flex justify-between mt-8" style="font-family: 'Times New Roman', Times, serif;">
        <!-- Kolom Kiri untuk Dosen Wali -->
        <div class="text-left">
            <p class="text-xs mt-4">Pembimbing Akademik (Dosen Wali)</p>
            <div class="mt-16">
                <p class="text-xs font-semibold">{{ $mahasiswaData->dosen->nama_dosen ?? 'N/A' }}</p>
                <p class="text-xs">NIP: {{ $mahasiswaData->dosen->nip_dosen ?? 'N/A' }}</p>
            </div>
        </div>
        <!-- Kolom Kanan untuk Mahasiswa -->
        <div class="text-left">
            <p class="text-xs">Semarang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p class="text-xs">Nama Mahasiswa,</p>
            <div class="mt-16">
                <p class="text-xs font-semibold">{{ $mahasiswaData->nama_mhs }}</p>
                <p class="text-xs">NIM: {{ $mahasiswaData->nim }}</p>
            </div>
        </div>
    </div>
    
    <!--
    <div class="footer">
        <p>&copy; 2024 Universitas XYZ. Semua hak cipta dilindungi.</p>
    </div>
    -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    <script>
        window.onload = function() {
            var element = document.body;
            var semester = "{{ $semester }}";
            var options = {
                filename: `IRS-Semester-${semester}.pdf`,
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
                margin: [10, 10, 10, 10], // Margin untuk PDF
                html2canvas: { scale: 3, logging: true, useCORS: true },
                pagebreak: { mode: ['avoid-all', 'css', 'legacy'] },
            };
            html2pdf().set(options).from(element).save();  // Menghasilkan PDF otomatis
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.19/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>
</html>
