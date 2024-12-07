<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Dashboard Dosen Wali</title>
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
      <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 mt-4">Dashboard</h1>
      
      <!-- Konten 1 -->
      <div class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-56 mb-8">
            <div class="relative bg-gray-800 rounded-lg border-gray-300 dark:border-gray-600 h-28 flex items-center">
                 <!-- Foto Profil -->
                <div class="absolute -bottom-16 left-12">
                    <img 
                        class="w-36 h-36 rounded-full" 
                        src="<?php echo e(asset('img/USERFIX.jpg')); ?>" 
                        alt="photo profile"
                    />
                </div>
                <!-- Nama Dosen -->
                <h1 class="text-xl font-semibold text-yellow-400 dark:text-white text-center mt-8 pl-64">
                    <?php echo e($dosen->nama_dosen ?? 'Nama tidak ditemukan'); ?>

                </h1>
            </div>
            <!-- Konten Dua Kolom -->
            <div class="flex flex-row justify-between mt-6">
                <!-- Kolom Kiri -->
                <div class="text-left pl-64">
                    <p class="text-l text-black dark:text-white mb-4">
                        NIP : <?php echo e($dosen->nip_dosen ?? 'NIP tidak ditemukan'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo e($user->email); ?>

                    </p>
                    <p class="text-l text-black dark:text-white mb-4">
                        Total Mahasiswa Perwalian : <?php echo e($totalMahasiswa); ?>

                    </p>
                </div>
            </div>
        </div>
      
      <!-- Konten 2 -->
      <?php if($statusCounts): ?>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 mb-8">
            <!-- First column -->
            <div class="rounded-lg dark:border-gray-600 h-auto">     
                <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <!-- Header with title and three-dot icon -->
                    <div class="flex justify-between items-center mb-1">
                        <h5 class="text-l font-semibold leading-none text-gray-900 dark:text-white text-center flex-grow">Status Registrasi Mahasiswa</h5>
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
                    </div>
                    <div class="py-6" id="pie-chart-3"></div>
                </div>
            </div>

            <!-- Third column -->
            <div class="rounded-lg dark:border-gray-600 h-auto">     
                <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between items-center mb-1">
                        <h5 class="text-l font-semibold leading-none text-gray-900 dark:text-white text-center flex-grow">Status Penyetujuan IRS Mahasiswa</h5>
                    </div>
                    <div class="py-6" id="pie-chart-2"></div>
                </div>
            </div>
        </div>
      <?php endif; ?>

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
    const statusCounts = <?php echo json_encode($statusCounts, 15, 512) ?>;

    const getChartOptions = (labels, data) => {
        const isEmpty = data.reduce((sum, val) => sum + val, 0) === 0;

        return {
            series: isEmpty ? [100] : data,
            colors: isEmpty ? ["#D1D5DB"] : ["#9CA3AF", "#1F2937", "#E3A008"],
            chart: {
                height: 250,
                width: "100%", 
                type: "pie",
            },
            labels: isEmpty ? ["Data Tidak Tersedia"] : labels,
            dataLabels: {
                enabled: true,
                style: {
                    //colors: ["#000"], // Warna teks hitam
                    fontSize: "14px",
                    fontFamily: "Inter, sans-serif",
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 1,
                    opacity: 0.2,
                },
                formatter: function (val, opts) {
                    return `${val.toFixed(1)}%`; // Menampilkan persentase
                },
                offsetY: -10, // Memindahkan teks ke dalam lingkaran
            },
            legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
            },
            states: {
                hover: {
                    filter: {
                        type: 'darken',
                        value: 0.75, // Menggelapkan bagian yang dihover
                    },
                },
            },
            tooltip: {
                enabled: true,
                theme: "light", // Warna tooltip terang
            },
        };
    };

    // Data untuk setiap chart
    const dataRegistrasi = [
        statusCounts['Belum Registrasi'],
        statusCounts['Aktif'],
        statusCounts['Cuti'],
    ];

    const dataPengisianIRS = [
        statusCounts['Belum Isi IRS'],
        statusCounts['Sudah Isi IRS'],
    ];

    const dataPenyetujuanIRS = [
        statusCounts['Belum Disetujui'],
        statusCounts['Sudah Disetujui'],
    ];

    // Render chart untuk Status Registrasi Mahasiswa
    if (document.getElementById("pie-chart-1")) {
        const chart1 = new ApexCharts(
            document.getElementById("pie-chart-1"), 
            getChartOptions(["Belum Registrasi", "Aktif", "Cuti"], dataRegistrasi)
        );
        chart1.render();
    }

    // Render chart untuk Status Pengisian IRS Mahasiswa
    if (document.getElementById("pie-chart-3")) {
        const chart3 = new ApexCharts(
            document.getElementById("pie-chart-3"), 
            getChartOptions(["Belum Isi IRS", "Sudah Isi IRS"], dataPengisianIRS)
        );
        chart3.render();
    }

    // Render chart untuk Status Penyetujuan IRS Mahasiswa
    if (document.getElementById("pie-chart-2")) {
        const chart2 = new ApexCharts(
            document.getElementById("pie-chart-2"), 
            getChartOptions(["Belum Disetujui", "Sudah Disetujui"], dataPenyetujuanIRS)
        );
        chart2.render();
    }
</script>


  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.19/dist/flowbite.min.js"></script>
</body>
</html><?php /**PATH C:\PPL\SiGMA\resources\views/content/dosen/dashboard.blade.php ENDPATH**/ ?>