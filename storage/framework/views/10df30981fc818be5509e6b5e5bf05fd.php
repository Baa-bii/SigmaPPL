<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Dekan</title>
    <link rel="icon" href="<?php echo e(asset('img/fix.png')); ?>" type="image/png">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
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
        <main>
        <!-- Main Content -->
        <main class="p-16 md:ml-64 h-auto pt-20">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 mt-4">Dashboard</h1>
            <!-- Konten 1 -->
            <div class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-48 mb-8">
                <div class="relative bg-gray-800 rounded-lg border-gray-300 dark:border-gray-600 h-28 flex items-center">
                <!-- Nama Dosen -->
                <h1 class="text-xl font-semibold text-yellow-400 dark:text-white text-center mt-8 pl-64">
                    <?php echo e($user->name ?? 'Nama tidak ditemukan'); ?>

                </h1>
                </div>
            <div class="relative flex items-center">
                <!-- NIP dan Email -->
                <h1 class="text-l text-black dark:text-white text-center mt-4 pl-64">
                    NIP : 198120450823691 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo e($user->email); ?>

                </h1>
                <!-- Foto Profil -->
                <img 
                    class="absolute -bottom-6 left-12 w-36 h-36 rounded-full" 
                    src="<?php echo e(asset('img/USERFIX.jpg')); ?>" 
                    alt="photo profile"
                />
            </div>
        </div>
            <div class="relative max-w-screen-lg mx-auto p-4 bg-white shadow mb-8">
            <!-- Tabel dengan Wrapper -->
            <h3 class="text-lg font-semibold mb-4">Informasi Persetujuan Usulan Jadwal Kuliah</h3>
            <div class="overflow-x-auto border border-gray-200">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-200 text-black">
                            <th scope="col" class="p-4 whitespace-nowrap text-center">NO</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">MATA KULIAH</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">WAKTU</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">DOSEN</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">SEMESTER</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">RUANGAN</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">GEDUNG</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">TAHUN AKADEMIK</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-transparent">
                    <?php $index = ($jadwal->currentPage() - 1) * $jadwal->perPage() + 1; ?>
                    <?php $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="bg-white text-black dark:bg-gray-800">
                            <td class="p-4 whitespace-nowrap text-sm text-center"><?php echo e($index); ?></td> <!-- Nomor urut yang memperhitungkan pagination -->
                            <td class="p-4 whitespace-nowrap text-sm text-left"><?php echo e($item->matakuliah->nama_mk); ?></td>
                            <td class="p-4 whitespace-nowrap text-sm text-left"><?php echo e($item->waktu->jam_mulai); ?> - <?php echo e($item->waktu->jam_selesai); ?></td>
                            <td class="p-4 whitespace-nowrap text-sm"><?php echo e($item->matakuliah->dosenmatkul->first()->dosen->nama_dosen ?? 'Belum tersedia'); ?></td>
                            <td class="p-4 whitespace-nowrap text-sm text-center"><?php echo e($item->semesterAktif->semester); ?></td>
                            <td class="p-4 whitespace-nowrap text-sm text-center"><?php echo e($item->ruang->nama); ?></td>
                            <td class="p-4 whitespace-nowrap text-sm text-center"><?php echo e($item->ruang->gedung); ?></td> 
                            <td class="p-4 whitespace-nowrap text-sm text-center"><?php echo e($item->semesterAktif->tahun_akademik); ?></td>
                            <td class="p-4 whitespace-nowrap">
                                <span 
                                    class="statusCell rounded-full px-4 py-1 text-sm inline-flex justify-center items-center w-full
                                    <?php echo e($item->status === 'disetujui' ? 'bg-green-200 text-green-600' : ''); ?>

                                    <?php echo e($item->status === 'ditolak' ? 'bg-red-200 text-red-600' : ''); ?>

                                    <?php echo e($item->status === 'diajukan' ? 'bg-yellow-200 text-yellow-600' : ''); ?> ">
                                    <?php echo e($item->status); ?>

                                </span>
                            </td>
                        </tr>
                        <?php $index++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="relative max-w-screen-lg mx-auto p-4 bg-white shadow">
    <!-- Tabel dengan Wrapper -->
    <h3 class="text-lg font-semibold mb-4">Informasi Persetujuan Usulan Ruang Kuliah</h3>
    <div class="overflow-x-auto border border-gray-200">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-200 text-black">
                    <th scope="col" class="p-4 whitespace-nowrap text-center">NO</th>
                    
                    <th scope="col" class="p-4 whitespace-nowrap text-center">GEDUNG</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">RUANGAN</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">KAPASITAS</th>
                    
                    <th scope="col" class="p-4 whitespace-nowrap text-center">STATUS</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-transparent">
            <!-- Loop untuk menampilkan data jadwal -->
            <?php $__currentLoopData = $ruang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="bg-white text-black dark:bg-gray-800">
                    <td class="p-4 whitespace-nowrap text-sm text-center"><?php echo e($index + 1); ?></td>
                    <td class="p-4 whitespace-nowrap text-sm text-center"><?php echo e($data->gedung ?? 'N/A'); ?></td>
                    <td class="p-4 whitespace-nowrap text-sm text-center"><?php echo e($data->nama ?? 'N/A'); ?></td>
                    <td class="p-4 whitespace-nowrap text-sm text-center"><?php echo e($data->kapasitas ?? 'N/A'); ?></td>
                    
                    <td class="p-4 whitespace-nowrap">
                        <span 
                            class="statusCell rounded-full px-4 py-1 text-sm inline-flex justify-center items-center w-full
                            <?php echo e($data->status === 'disetujui' ? 'bg-green-200 text-green-600' : ''); ?>

                            <?php echo e($data->status === 'ditolak' ? 'bg-red-200 text-red-600' : ''); ?>

                            <?php echo e($data->status === 'menunggu' ? 'bg-yellow-200 text-yellow-600' : ''); ?> ">
                            <?php echo e($data->status); ?>

                        </span>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
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
</body>
</html><?php /**PATH C:\PPL\SiGMA\resources\views/content/dekan/dashboard.blade.php ENDPATH**/ ?>