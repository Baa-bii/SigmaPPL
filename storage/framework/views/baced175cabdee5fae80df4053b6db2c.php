<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak IRS</title>
    <link rel="icon" href="<?php echo e(asset('img/fix.png')); ?>" type="image/png">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
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
        <h1 class="text-xs font-semi-bold">Semester <?php echo e($semester); ?></h1>
        <h1 class="text-xs font-semi-bold">TA <?php echo e($tahunMulai); ?>/<?php echo e($tahunAkhir); ?></h1>
    </div>

    <div class="header pb-5" style="font-family: 'Times New Roman', Times, serif; display: grid; grid-template-columns: 115px 1fr; row-gap: 5px;">
        <div>
            <h1 class="text-xs font-semi-bold">NIM<span style="padding-left: 73px; padding-right: 8px;">:</span></h1>
        </div>
        <div>
            <h1 class="text-xs"><?php echo e($mahasiswaData->nim ?? 'N/A'); ?></h1>
        </div>
        
        <div>
            <h1 class="text-xs font-semi-bold">Nama Mahasiswa<span style="padding-left: 11px; padding-right: 8px;">:</span></h1>
        </div>
        <div>
            <h1 class="text-xs"><?php echo e($mahasiswaData->nama_mhs); ?></h1>
        </div>

        <div>
            <h1 class="text-xs font-semi-bold">Program Studi<span style="padding-left: 26px; padding-right: 8px;">:</span></h1>
        </div>
        <div>
            <h1 class="text-xs"><?php echo e($mahasiswaData->programStudi->nama_prodi ?? 'N/A'); ?></h1>
        </div>

        <div>
            <h1 class="text-xs font-semi-bold">Dosen Wali<span style="padding-left: 40px; padding-right: 8px;">:</span></h1>
        </div>
        <div>
            <h1 class="text-xs"><?php echo e($mahasiswaData->dosen->nama_dosen ?? 'N/A'); ?></h1>
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
            <?php $__currentLoopData = $semesterAktifData->irs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Baris Utama -->
                <tr class="bg-white text-xs border-b border-black dark:bg-gray-800 dark:border-gray-700" style="font-size: 10px;">
                    <th scope="row" class="px-1 py-1 border-r border-black  font-medium text-center whitespace-nowrap">
                        <?php echo e($index + 1); ?>

                    </th>
                    <td class="px-2 py-1 border-r border-black text-center"><?php echo e($ir->matakuliah->kode_mk); ?></td>
                    <td class="px-2 py-1 border-r border-black text-center"><?php echo e($ir->matakuliah->nama_mk); ?></td>
                    <td class="px-2 py-1 border-r border-black text-center"><?php echo e($ir->jadwal->kelas); ?></td>
                    <td class="px-2 py-1 border-r border-black text-center"><?php echo e($ir->matakuliah->sks); ?></td>
                    <td class="px-2 py-1 border-r border-black text-center"><?php echo e($ir->jadwal->ruang->gedung ?? 'N/A'); ?><?php echo e($ir->jadwal->ruang->nama ?? 'N/A'); ?></td>
                    <td class="px-2 py-1 border-r border-black text-center"><?php echo e($ir->status_mata_kuliah); ?></td>
                    <td class="px-2 py-1">
                        <?php if($ir->matakuliah->dosen->isNotEmpty()): ?>
                            <?php $__currentLoopData = $ir->matakuliah->dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dosen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($dosen->nama_dosen); ?><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                </tr>
                <!-- Baris Tambahan -->
                <tr class="bg-gray-50 border-b text-center border-black dark:bg-gray-700" style="font-size: 10px;">
                    <td colspan="5" class="px-2 py-1 text-gray-700 dark:text-gray-300">
                        <strong><?php echo e($ir->jadwal->hari ?? 'N/A'); ?></strong>
                        pukul 
                        <?php
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
                        ?>
                        <strong><?php echo e($jamMulaiFormatted); ?></strong> - <strong><?php echo e($jamSelesaiFormatted); ?></strong>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Tanda Tangan -->
    <div class="flex justify-between mt-8" style="font-family: 'Times New Roman', Times, serif;">
        <!-- Kolom Kiri untuk Dosen Wali -->
        <div class="text-left">
            <p class="text-xs mt-4">Pembimbing Akademik (Dosen Wali)</p>
            <div class="mt-16">
                <p class="text-xs font-semibold"><?php echo e($mahasiswaData->dosen->nama_dosen ?? 'N/A'); ?></p>
                <p class="text-xs">NIP: <?php echo e($mahasiswaData->dosen->nip_dosen ?? 'N/A'); ?></p>
            </div>
        </div>
        <!-- Kolom Kanan untuk Mahasiswa -->
        <div class="text-left">
            <p class="text-xs">Semarang, <?php echo e(\Carbon\Carbon::now()->translatedFormat('d F Y')); ?></p>
            <p class="text-xs">Nama Mahasiswa,</p>
            <div class="mt-16">
                <p class="text-xs font-semibold"><?php echo e($mahasiswaData->nama_mhs); ?></p>
                <p class="text-xs">NIM: <?php echo e($mahasiswaData->nim); ?></p>
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
            var semester = "<?php echo e($semester); ?>";
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
<?php /**PATH C:\00 KULIAH\00 SEMESTER 5\SiGMA\SigmaPPL\resources\views/content/dosen/cetakirs.blade.php ENDPATH**/ ?>