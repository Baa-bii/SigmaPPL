<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Ruang</title>
    <link rel="icon" href="<?php echo e(asset('img/fix.png')); ?>" type="image/png">
</head>
<body>
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
        <form action="<?php echo e(route('akademik.ruang.update', $ruangKelas->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
        <div class="m-6">
            <label for="nama" class="form-label font-sans font-medium">Nama Ruang: </label>
            <input type="text" name="nama" class="rounded-lg w-full" value="<?php echo e(old('nama', $ruangKelas->nama ?? '')); ?>" required>
        </div>
        <div class="m-6">
            <label for="gedung" class="form-label font-sans font-medium">Gedung: </label>
            <select name="gedung" id="gedung" class="rounded-lg w-full" required>
                <option value="">Select Gedung</option>
                <?php $__currentLoopData = ['A', 'B', 'C', 'D', 'E','F','G','H','I','J','K','OR']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gedung): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($gedung); ?>" <?php echo e((old('gedung', $ruangKelas->gedung ?? '') == $gedung) ? 'selected' : ''); ?>>
                        <?php echo e($gedung); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="m-6">
            <label for="kapasitas" class="form-label font-sans font-medium">Kapasitas: </label>
            <input type="number" name="kapasitas" id="kapasitas" class="rounded-lg w-full" min="1" value="<?php echo e(old('kapasitas', $ruangKelas->kapasitas ?? '')); ?>" required>
        </div>
        <div class="m-6">
            <label for="kode_prodi" class="form-label font-sans font-medium">Prodi: </label>
            <select id="kode_prodi" name="kode_prodi" class="rounded-lg w-full" required>
                <option value="">Select Prodi</option>
                <?php $__currentLoopData = $programStudi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($prodi->kode_prodi); ?>" <?php echo e((old('kode_prodi', $ruangKelas->kode_prodi ?? '') == $prodi->kode_prodi) ? 'selected' : ''); ?>>
                        <?php echo e($prodi->nama_prodi); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
                <button class="bg-blue-500 p-2 text-white rounded hover:bg-blue-600" type="submit">
                Simpan
                </button>
        </div>
    </form>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger text-red-500">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    </main>
</body>
</html><?php /**PATH C:\00 KULIAH\00 SEMESTER 5\SiGMA\SigmaPPL\resources\views/content/akademik/editruang.blade.php ENDPATH**/ ?>