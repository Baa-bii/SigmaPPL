<div class ="tab-content hidden w-full" id="irs">
            <!-- Konten 2 IRS -->
            <div id="irs" class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-auto mb-8 px-6">
                <div id="tabs-title" class="text-xl font-semibold pt-8 pb-6 text-center">Isian Rencana Semester</div>
                <!-- Accordion IRS content here -->
                <div id="accordion-irs">
                    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                        <?php $__currentLoopData = $semesterAktifData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                // Periksa apakah semester ini sudah memiliki IRS
                                $hasIRSForSemester = App\Models\IRS::where('id_TA', $semester->id)->exists();
                                // Ambil status IRS (misal: Disetujui, Belum Disetujui, dll)
                                $statusIRS = $hasIRSForSemester ? App\Models\IRS::where('id_TA', $semester->id)->first()->status : null;
                            ?>

                            <?php if(!$hasIRSForSemester): ?>
                                <!-- Jika belum ada IRS, jangan tampilkan accordion untuk semester ini -->
                                <?php continue; ?>
                            <?php endif; ?>
                            
                            <h2 id="accordion-flush-heading-<?php echo e($semester->id); ?>" class="pb-4">
                                <button type="button" class="flex items-center justify-between bg-gray-100 rounded-lg border-gray-300 w-full pl-3 pr-3 py-3 font-medium rtl:text-right text-black border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-<?php echo e($semester->id); ?>" aria-expanded="false" aria-controls="accordion-flush-body-<?php echo e($semester->id); ?>">
                                    <div class="flex flex-col items-start">
                                        <span>Semester <?php echo e($semester->semester); ?> | Tahun Ajaran <?php echo e($semester->tahun_akademik); ?></span>
                                        <span class="text-sm text-gray-500 mt-2">Jumlah SKS <?php echo e($semester->jumlah_sks ?? 'N/A'); ?></span>
                                    </div>
                                    <!-- Ikon defaultnya mengarah ke bawah, menggunakan rotate-0 -->
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>
                           
                            <div id="accordion-flush-body-<?php echo e($semester->id); ?>" class="hidden" aria-labelledby="accordion-flush-heading-<?php echo e($semester->id); ?>">  
                                <!-- Table -->
                                <div class="relative overflow-x-auto rounded-lg border border-gray-300 shadow-md mb-8 sm:rounded-lg">
                                    <table class="w-full text-sm text-left roundertl:text-right text-gray-500 dark:text-gray-400">
                                        <caption class="p-5 text-center text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                            <?php echo e($semester->statusIRS); ?> <!-- Menampilkan status IRS -->
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
                                            <?php $__currentLoopData = $semester->irsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- Baris Utama -->
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-4 py-4 border-r font-medium text-gray-900 whitespace-nowrap dark:text-white" rowspan="2">
                                                        <?php echo e($index + 1); ?>

                                                    </th>
                                                    <td class="px-4 py-4 border-r w-4"><?php echo e($ir->matakuliah->kode_mk); ?></td>
                                                    <td class="px-6 py-4 border-r"><?php echo e($ir->matakuliah->nama_mk); ?></td>
                                                    <td class="px-4 py-4 border-r text-center align-middle"><?php echo e($ir->jadwal->kelas); ?></td>
                                                    <td class="px-4 py-4 border-r text-center align-middle"><?php echo e($ir->matakuliah->sks); ?></td>
                                                    <td class="px-4 py-4 border-r text-center align-middle"><?php echo e($ir->jadwal->ruang->gedung ?? 'N/A'); ?><?php echo e($ir->jadwal->ruang->nama ?? 'N/A'); ?></td>
                                                    <td class="px-4 py-4 border-r text-center align-middle"><?php echo e($ir->status_mata_kuliah); ?></td>
                                                    <td class="px-6 py-4">
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
                                                <tr class="bg-gray-50 border-b dark:bg-gray-700">
                                                    <td colspan="7" class="px-6 py-4 text-gray-700 dark:text-gray-300">
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
                                </div>  
                                <!-- Tombol Setujui IRS atau Cetak IRS berdasarkan status -->
                                <div class="flex justify-start mt-4 pl-4">
                                    <?php if($statusIRS === 'Sudah Disetujui'): ?>
                                        <a href=" <?php echo e(route('dosen.cetakirs', $semester->id)); ?>" target="_blank">
                                            <button type="button" class="text-gray-900 text-center inline-flex items-center border border-gray-800 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2.5 mr-2 mb-8 dark:text-white dark:bg-yellow-500 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                                                Cetak IRS
                                            </button>
                                        </a>
                                    <?php else: ?>
                                        
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
</div>
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
  </script><?php /**PATH C:\00 KULIAH\00 SEMESTER 5\SiGMA\SigmaPPL\resources\views/content/mhs/irs.blade.php ENDPATH**/ ?>