<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ruangan</title>
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
        <main class="p-16 md:ml-64 h-auto pt-20">
            <div class="font-sans font-semibold text-gray-600 m-5">
                <h2>Kelola Ruangan</h2>
            </div>

            <div>
                <form method="GET" action="<?php echo e(route('akademik.ruang.index')); ?>">
                    <label for="filter_gedung" class="form-label font-sans font-medium ">Filter by Gedung</label>
                    <select name="filter_gedung" id="filter_gedung" class="rounded-lg text-sm" onchange="this.form.submit()">
                        <option value="">All Gedung</option>
                        <option value="A" <?php echo e(request('filter_gedung') == 'A' ? 'selected' : ''); ?>>A</option>
                        <option value="B" <?php echo e(request('filter_gedung') == 'B' ? 'selected' : ''); ?>>B</option>
                        <option value="C" <?php echo e(request('filter_gedung') == 'C' ? 'selected' : ''); ?>>C</option>
                        <option value="D" <?php echo e(request('filter_gedung') == 'D' ? 'selected' : ''); ?>>D</option>
                        <option value="E" <?php echo e(request('filter_gedung') == 'E' ? 'selected' : ''); ?>>E</option>
                        <option value="F" <?php echo e(request('filter_gedung') == 'F' ? 'selected' : ''); ?>>F</option>
                        <option value="G" <?php echo e(request('filter_gedung') == 'G' ? 'selected' : ''); ?>>G</option>
                        <option value="H" <?php echo e(request('filter_gedung') == 'H' ? 'selected' : ''); ?>>H</option>
                        <option value="I" <?php echo e(request('filter_gedung') == 'I' ? 'selected' : ''); ?>>I</option>
                        <option value="J" <?php echo e(request('filter_gedung') == 'J' ? 'selected' : ''); ?>>J</option>
                        <option value="K" <?php echo e(request('filter_gedung') == 'K' ? 'selected' : ''); ?>>K</option>
                    </select>
            
                    <label for="filter_prodi" class="form-label font-sans font-medium ml-4">Filter by Prodi</label>
                    <select name="filter_prodi" id="filter_prodi" class="rounded-lg text-sm" onchange="this.form.submit()">
                        <option value="">All Prodi</option>
                        <?php $__currentLoopData = $programStudi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($prodi->kode_prodi); ?>" <?php echo e(request('filter_prodi') == $prodi->kode_prodi ? 'selected' : ''); ?>>
                                <?php echo e($prodi->nama_prodi); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </form>
            </div>
            <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-500 bg-white shadow-md rounded-xl bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                    <tr>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-lg antialiased font-semibold leading-none text-blue-700 ">
                            Ruang
                        </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50" data-sort="gedung">
                        <p class="block font-sans text-lg antialiased font-semibold leading-none text-blue-700">
                            Gedung
                        </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50" data-sort="prodi">
                        <p class="block font-sans text-lg antialiased font-semibold leading-none text-blue-700 ">
                            Prodi
                        </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-lg antialiased font-semibold leading-none text-blue-700 ">Action</p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $ruangKelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="text-sm text-blue-gray-900"><?php echo e($ruang->nama); ?></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="text-sm text-blue-gray-900"><?php echo e($ruang->gedung); ?></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="text-sm text-blue-gray-900"><?php echo e($ruang->program_studi->nama_prodi); ?></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <a href="<?php echo e(route('akademik.ruang.edit', $ruang->id)); ?>">
                                <button class="bg-green-400 w-auto p-1 rounded text-white hover:bg-green-500 shadow-md">
                                    Edit
                                </button>
                                <form action="<?php echo e(route('akademik.ruang.destroy', $ruang->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="bg-red-500 w-auto p-1 rounded text-white hover:bg-red-600 shadow-md">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div>
                <a href="<?php echo e(route('akademik.ruang.create')); ?>">
                    <button class="bg-blue-500 w-auto h-auto m-4 p-2 rounded text-white hover:bg-blue-600 shadow-lg" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ruangKelasModal">
                        Tambahkan Ruangan
                    </button>
                </a>
                <form action="<?php echo e(route('akademik.ruang.ajukan-all')); ?>" method="POST" class="inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <button type="submit" name="status" value="menunggu" 
                            class="w-auto h-auto p-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Ajukan
                    </button>
                </form>
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


</html><?php /**PATH C:\PPL\SiGMA\resources\views/content/akademik/ruangan.blade.php ENDPATH**/ ?>