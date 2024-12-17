<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Kaprodi</title>
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
        <main class="md:ml-64 h-auto pt-20 flex-grow">
          <div class="container max-w-7xl mx-auto p-6">
            <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16 flex flex-col min-h-screen">
                <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                  <div class="mx-auto max-w-5xl">
                    <div class="gap-4 sm:flex sm:items-center sm:justify-between flex-col">
                      <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Mata Kuliah dan Jadwal</h2>
                        <div class="mt-10 grid grid-cols-2  gap-6">
                            <!-- Kotak Mata Kuliah -->
                            <div class="bg-red-200 p-10  rounded-lg shadow-lg dark:bg-gray-800">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mata Kuliah</h3>
                                <?php
                                    $mataKuliahCount = DB::table('matakuliah')
                                        ->whereRaw('semester % 2 = 1') // Semester ganjil
                                        ->orWhere('semester', 0)       // Atau semester 0
                                        ->count();
                                    // Menghitung jumlah mata kuliah
                                ?>
                                <p class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                                    <?php echo e($mataKuliahCount); ?>

                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Jumlah Mata Kuliah yang terdaftar</p>
                            </div>

                            <!-- Kotak Jadwal -->
                            <div class="bg-blue-400 p-10 top-6 rounded-lg shadow-lg dark:bg-gray-800">
                                <h3 class="text-lg font-semibold text-white dark:text-white">Jadwal</h3>
                                <?php
                                    $jadwalCount = \App\Models\Jadwal::whereHas('semesterAktif', function ($query) {
                                        $query->whereRaw('semester % 2 = 1');
                                    })->count();  // Menghitung jumlah jadwal
                                ?>


                                <p class="text-2xl font-bold text-white dark:text-gray-200">
                                    <?php echo e($jadwalCount); ?>

                                </p>
                                <p class="text-sm text-white dark:text-gray-400">Jumlah Jadwal yang terdaftar</p>
                            </div>
                        </div>
                    </div> 
                </div>   
              </section>
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
</html>
<?php /**PATH C:\00 KULIAH\00 SEMESTER 5\SiGMA\SigmaPPL\resources\views/content/kaprodi/dashboard.blade.php ENDPATH**/ ?>