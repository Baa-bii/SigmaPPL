<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Detail Mahasiswa</title>
    <link rel="icon" href="<?php echo e(asset('img/fix.png')); ?>" type="image/png">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    
  <div class="antialiased bg-gray-50 dark:bg-gray-900">

    <!--Navbar-->    
    <?php if (isset($component)) { $__componentOriginalfd1f218809a441e923395fcbf03e4272 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfd1f218809a441e923395fcbf03e4272 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $attributes = $__attributesOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__attributesOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $component = $__componentOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__componentOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>

    <!-- Sidebar -->
    <?php if (isset($component)) { $__componentOriginal2880b66d47486b4bfeaf519598a469d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2880b66d47486b4bfeaf519598a469d6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $attributes = $__attributesOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $component = $__componentOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__componentOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>

    <!-- Main Content -->
    <main class="p-16 md:ml-64 h-auto pt-20">
        <div class="mt-4 mb-4 flex items-center space-x-4">
            <a href="<?php echo e(route('dosen.perwalian.index')); ?>" class="text-xl text-black hover:text-blue-500 font-semibold">
                Perwalian >
            </a>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                Detail Mahasiswa
            </h1>
        </div>

        <!-- Konten 1 -->
        <div class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-64 mb-8">
            <div class="relative bg-gray-800 rounded-lg border-gray-300 dark:border-gray-600 h-28 flex items-center">
                 <!-- Foto Profil -->
                <div class="absolute -bottom-16 left-12">
                    <img 
                        class="w-36 h-36 rounded-full" 
                        src="<?php echo e(asset('img/USERFIX.jpg')); ?>" 
                        alt="photo profile"
                    />
                </div>
                <!-- Nama Mahasiswa -->
                <h1 class="text-xl font-semibold text-yellow-400 dark:text-white text-center mt-8 pl-64">
                    <?php echo e($mahasiswa->nama_mhs ?? 'Nama tidak ditemukan'); ?>

                </h1>
            </div>
            <!-- Konten Dua Kolom -->
            <div class="flex flex-row justify-between mt-4">
                <!-- Kolom Kiri -->
                <div class="w-1/2 text-left pl-64">
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>NIM :</strong> <?php echo e($mahasiswa->nim); ?>

                    </p>
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>Semester :</strong> <?php echo e($semester); ?>

                    </p>
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>Tahun Ajaran :</strong> <?php echo e($tahunAkademik); ?>

                    </p>
                </div>

                <!-- Kolom Kanan -->
                <div class="w-1/2 text-left pl-24">
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>IPS / SKSs :</strong> <?php echo e($ips); ?> / <?php echo e($ipsData['sks']); ?>

                    </p>
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>IPK / SKSk :</strong> <?php echo e($ipk); ?> / <?php echo e($ipkData['sks']); ?>

                    </p>
                    <p class="text-l text-black dark:text-white mb-4">
                        <strong>Max Beban SKS :</strong> <?php echo e($maxBebanSKSData['max_beban_sks']); ?>

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
                                        <button type="button" 
                                            class="text-gray-900 text-center inline-flex items-center border border-gray-800 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2.5 mr-2 mb-8 dark:text-white dark:bg-yellow-500 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800"
                                            onclick="setujuiIRS(<?php echo e($semester->id); ?>)">
                                            Setujui IRS
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!-- Konten 2 KHS -->
            <!-- <div id="content-khs" class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-auto mb-8 px-6 hidden">
                <div id="tabs-title" class="text-xl font-semibold pt-8 pb-4 text-center">Kartu Hasil Studi</div> -->
                <!-- Accordion KHS content here -->
                <!-- <div id="accordion-khs">    
                    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400"> -->
                    
                        <!-- 10 -->
                        <!-- <h2 id="accordion-flush-heading-10">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-10" aria-expanded="false" aria-controls="accordion-flush-body-10">
                                <div class="flex flex-col items-start">
                                    <span>Semester 1  |  Tahun Ajaran 2022/2023 Ganjil</span>
                                    <span class="text-sm text-gray-500 mt-2">Jumlah SKS 21</span>
                                </div> -->
                                <!-- Ikon defaultnya mengarah ke bawah, menggunakan rotate-0 -->
                                <!-- <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2> -->

                        <!-- <div id="accordion-flush-body-10" class="hidden" aria-labelledby="accordion-flush-heading-10">
                            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                <p class="mb-2 text-gray-500 dark:text-gray-400"> -->
                                    <!-- Table -->
                                    <!-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                                                        Jenis
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        SKS
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Nilai Huruf
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Bobot
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        SKS x Bobot
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
                                                    <td class="px-6 py-4">
                                                        Lulus
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        3
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        A
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        4.0
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        12
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        2
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
                                                    <td class="px-6 py-4">
                                                        Lulus
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        3
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        A
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        4.0
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        12
                                                    </td>
                                                </tr> -->
                                                <!-- Total row -->
                                                <!-- <tr class="font-semibold bg-gray-100 dark:bg-gray-800 dark:text-white">
                                                    <td colspan="5" class="px-6 py-3 text-right">Total</td>
                                                    <td class="px-6 py-3">6</td>
                                                    <td class="px-6 py-3"></td>
                                                    <td class="px-6 py-3">8</td>
                                                    <td class="px-6 py-3">24</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </p>
                                <div class="flex flex-col items-start text-sm text-gray-500 mt-8">
                                    <span>IP. Semester : 4.0</span>
                                    <span>82/21</span>
                                    <span class="text-sm text-gray-500 mt-2">Jumlah SKS 21</span>
                                </div>
                                <button type="button" class="text-gray-900 text-center inline-flex items-center border border-gray-800 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-8 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">  
                                    <svg class="w-3 h-3 text-gray-900 dark:text-gray-400 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                                    </svg>    
                                    Cetak KHS
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </main>
    
    <!--Footer-->    
    <?php if (isset($component)) { $__componentOriginal178110e4649b332c26946e049de185fe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal178110e4649b332c26946e049de185fe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footerdosen','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footerdosen'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal178110e4649b332c26946e049de185fe)): ?>
<?php $attributes = $__attributesOriginal178110e4649b332c26946e049de185fe; ?>
<?php unset($__attributesOriginal178110e4649b332c26946e049de185fe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal178110e4649b332c26946e049de185fe)): ?>
<?php $component = $__componentOriginal178110e4649b332c26946e049de185fe; ?>
<?php unset($__componentOriginal178110e4649b332c26946e049de185fe); ?>
<?php endif; ?>

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
</html><?php /**PATH C:\PPL\SiGMA\resources\views/content/dosen/detailmhs.blade.php ENDPATH**/ ?>