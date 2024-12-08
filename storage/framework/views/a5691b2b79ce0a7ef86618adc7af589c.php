<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Mahasiswa</title>
    <link rel="icon" href="<?php echo e(asset('img/fix.png')); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>


<body>
  <div class="antialiased bg-gray-50 dark:bg-gray-900 flex flex-col min-h-screen">
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
        <main class="md:ml-64 h-auto pt-10 flex-grow">
            <div class="container max-w-7xl mx-auto p-6">
                <h1 class="mt-10 text-lg font-semibold text-gray-900 dark:text-white mb-4">Dashboard</h1>
                <!-- Main Content -->
                <div class="main-content">
                    <!--Profile-->
                    <div class="bg-white border dark:border-gray-600 mb-4 relative rounded-lg">
                        <!-- Profile Photo Positioned in the Middle Left -->
                        <div class="absolute top-1/2 left-4 transform -translate-y-1/2">
                            <img 
                                class="w-36 h-36 "  
                                src="<?php echo e(asset('img/USER.png')); ?>" 
                                alt="photo profile"
                            />
                        </div>

                        <div class="bg-gray-800 rounded-lg border-gray-300 dark:border-gray-600 h-20 flex items-center justify-lefy pl-36">
                            <h1 class="text-xl font-semibold text-yellow-400 dark:text-white">
                                <?php echo e($mhs->nama_mhs); ?>

                            </h1>
                        </div>

                        <div class="bg-white h-20 flex items-center justify-left pl-36 rounded-lg">
                            <h2 class="text-l text-black dark:text-gray-700">
                                NIM : <?php echo e($mhs->nim); ?> | Informatika S1
                            </h2>
                        </div>
                    </div>
                    
                    <!-- Status Akademik -->
                    <div class="flex flex-col lg:flex-row gap-6 mb-6">
                        <div class="flex-1 p-6 shadow-md bg-white rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Status Akademik</h3>
                            <p class="text-gray-600 mb-4">Dosen Wali: <?php echo e(($mhs->dosen)->nama_dosen ?? 'Tidak Diketahui'); ?> <i class="fab fa-whatsapp text-green-500"></i></p>
                            <p class="text-gray-600 mb-4">NIP: <?php echo e($mhs->nip_dosen ?? 'Tidak Diketahui'); ?></p>
                            <hr class="border-t border-gray-300 mb-4">

                            <div class="flex justify-between items-center gap-4">
                                <div class="text-center flex-1">
                                    <p class="text-sm">Semester Akademik Sekarang</p>
                                    <p class="text-lg font-bold mt-1"><?php echo e($mhs->semester_aktif->where('is_active', true)->first()->tahun_akademik ?? 'Tidak Diketahui'); ?></p>
                                </div>
                                <div class="h-12 border-l border-gray-400"></div>
                                <div class="text-center flex-1">
                                    <p class="text-sm">Semester Studi</p>
                                    <p class="text-lg font-bold mt-1"><?php echo e($mhs->semester_aktif->where('is_active', true)->first()->semester ?? 'Tidak Diketahui'); ?></p>
                                </div>
                                <div class="h-12 border-l border-gray-400"></div>
                                <div class="text-center flex-1">
                                    <p class="text-sm">Status Akademik</p>
                                    <p class="text-lg font-bold mt-1 
                                        <?php if(isset($mhs->semester_aktif) && $mhs->semester_aktif->where('is_active', true)->first()->status === 'Aktif'): ?> text-green-600
                                        <?php elseif(isset($mhs->semester_aktif) && $mhs->semester_aktif->where('is_active', true)->first()->status === 'Cuti'): ?> text-blue-600
                                        <?php else: ?> text-red-600 <?php endif; ?>">
                                        <?php echo e($mhs->semester_aktif->where('is_active', true)->first()->status ?? 'Belum Registrasi'); ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 lg:flex-none bg-white p-6 shadow-md lg:w-1/3 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Prestasi Akademik</h3>
                            <div class="flex items-center justify-center h-full gap-8">
                                <div class="text-center">
                                    <p class="text-sm">IPK</p>
                                    <p class="text-xl font-bold mt-1"><?php echo e($ipk); ?></p>
                                </div>
                                <div class="h-12 border-l border-gray-400"></div>
                                <div class="text-center">
                                    <p class="text-sm">SKS</p>
                                    <p class="text-xl font-bold mt-1"><?php echo e($totalSKS); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Section (Registrasi and Akademik) -->
                    <div class="menu-section">
                        <div class=" bg-yellow-300 p-4 mb-6 shadow-lg rounded-md hover:transition transform hover:scale-105">
                            <a href="/mhs/registrasi" </a>
                            <h3 class="text-lg font-bold mb-4">Registrasi</h3>
                            
                            <div class="flex justify-start">
                                <p class="bg-gray-400 text-white px-2 py-2 text-sm mr-2">Pilih Status Akademik</p>
                                <span class="px-2 py-2 text-sm text-white
                                    <?php if(isset($mhs->semester_aktif) && $mhs->semester_aktif->where('is_active', true)->first()->status === 'Aktif'): ?> bg-green-600
                                    <?php elseif(isset($mhs->semester_aktif) && $mhs->semester_aktif->where('is_active', true)->first()->status === 'Cuti'): ?> bg-blue-700
                                    <?php else: ?> bg-red-600 <?php endif; ?>">
                                    Mahasiswa <?php echo e($mhs->semester_aktif->where('is_active', true)->first()->status ?? 'Belum Registrasi'); ?>

                                </span>
                            </div>

                        </div>
                        <div class=" bg-yellow-300 p-4 shadow-lg rounded-md hover:transition transform hover:scale-105">
                            <a href="/mhs/akademik"</a>
                            <h3 class="text-lg font-bold mb-4">Isian Rencana Studi</h3>
                            <div class="flex justify-start">
                                <p class="text-sm py-2 mr-2">TA <?php echo e($mhs->semester_aktif->where('is_active', true)->first()->tahun_akademik ?? 'Tidak Diketahui'); ?></p>
                                <p class="bg-gray-400 text-white px-2 py-2 text-sm mr-2">Buat IRS</p>
                                <p class="bg-gray-400 text-white px-2 py-2 text-sm mr-2"> Lihat IRS</p>
                            </div>
                        </div>
                    </div>
                </div>
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
</html>
<?php /**PATH C:\PPL\SiGMA\resources\views/content/mhs/dashboard.blade.php ENDPATH**/ ?>