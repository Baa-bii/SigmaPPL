<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal</title>
    <link rel="icon" href="<?php echo e(asset('img/fix.png')); ?>" type="image/png">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body class = 'flex flex-col min-h-screen'>
    <div class="antialiased bg-gray-50 dark:bg-gray-900 ">
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
        <main class="p-16 md:ml-64 h-auto pt-20 flex flex-col min-h-screen">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 mt-4">Usulan Jadwal Kuliah</h1>
            <!-- Konten 1 -->
            <div class="container mx-auto my-3">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Statistik Belum Disetujui -->
                    <div class="bg-yellow-400 text-white rounded-lg shadow-md p-6 flex flex-col items-center">
                        <h3 class="text-4xl font-bold mb-1"><?php echo e($belum_disetujui); ?></h3>
                        <p class="text-sm font-semibold mb-2">Belum Disetujui</p>
                        <a class="bg-gray-300 text-gray-50 px-3 py-1 rounded-full mt-2 text-white text-sm font-bold">Baru saja</a>
                    </div>

                    <!-- Statistik Sudah Disetujui -->
                    <div class="bg-green-500 text-white rounded-lg shadow-md p-6 flex flex-col items-center">
                        <h3 class="text-4xl font-bold mb-1"><?php echo e($sudah_disetujui); ?></h3>
                        <p class="text-sm font-semibold mb-2">Sudah Disetujui</p>
                        <a class="bg-gray-300 text-gray-50 px-3 py-1 rounded-full mt-2 text-white text-sm font-bold">Baru saja</a>
                    </div>

                    <!-- Statistik Ditolak -->
                    <div class="bg-red-600 text-white rounded-lg shadow-md p-6 mr-4 flex flex-col items-center">
                        <h3 class="text-4xl font-bold mb-1"><?php echo e($ditolak); ?></h3>
                        <p class="text-sm font-semibold mb-2">Ditolak</p>
                        <a class="bg-gray-300 text-gray-50 px-3 py-1 rounded-full mt-2 text-white text-sm font-bold">Baru saja</a>
                    </div>
                </div>
            </div>
        <!-- Form Section -->
        <div class="bg-white shadow p-6 mr-4 mt-8">
            <h3 class="text-lg font-semibold mb-4">Persetujuan Usulan Jadwal Kuliah</h3>
            <div class="space-y-4">
                <!-- Dropdown Program Studi -->
                <form id="filter-form" action="<?php echo e(route('dekan.jadwal.filter')); ?>" method="GET" class="space-y-4">
                <div>
                    <label for="program-studi" class="block font-semibold mb-1">Program Studi</label>
                    <select id="program-studi" name="prodi" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Pilih Prodi</option>
                        <option value="BIO123">Biologi</option>
                        <option value="KIM123">Kimia</option>
                        <option value="FIS123">Fisika</option>
                        <option value="MAT123">Matematika</option>
                        <option value="STA123">Statistika</option>
                        <option value="INF123">Informatika</option>
                        <option value="TEK123">Bioteknologi</option>
                    </select>
                </div>
        
                <!-- Button Tampilkan -->
                <a id="show-button" href="<?php echo e(route('dekan.verifikasijadwal')); ?>" class="w-full bg-gray-200 text-black block font-semibold py-2 rounded-md hover:bg-gray-300 text-center" type="submit">
                    Tampilkan
                </a>
                </form>
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
        
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('filter-form');
        const programStudi = document.getElementById('program-studi');
        const errorMessage = document.getElementById('error-message');
        const tableBody = document.getElementById('data-tabel-jadwal');
        const emptyPlaceholder = document.getElementById('empty-placeholder');
        const loadingIndicator = document.getElementById('loading-indicator');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const prodi = programStudi.value;

            // Validasi input
            if (!prodi) {
                alert('Mohon pilih Program Studi!');
                return;
            }

            // Kirim permintaan GET ke backend
            fetch(`/dekan/jadwal/filter?prodi=${prodi}`, {
                method: 'GET',
                headers: { 'Content-Type': 'application/json' },
            })
                .then(response => response.json())
                .then(data => {
                    tableBody.innerHTML = ''; // Bersihkan tabel sebelumnya

                    if (!data.jadwal || data.jadwal.length === 0) {
                        emptyPlaceholder.classList.remove('hidden');
                        return;
                    }

                    emptyPlaceholder.classList.add('hidden');

                    data.jadwal.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.matakuliah?.nama_mk || 'Tidak Ada Data'}</td>
                            <td>${item.waktu?.jam_mulai || 'N/A'} - ${item.waktu?.jam_selesai || 'N/A'}</td>
                            <td>${item.matakuliah?.dosenmatkul?.dosen?. nama_dosen || 'N/A'}</td>
                            <td>${item.ruang?.nama || 'Tidak Ada Ruangan'}</td>
                            <td>${item.ruang?.gedung || 'N/A'}</td>
                            <td>${item.id_TA || 'N/A'}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memuat data.');
                });
        });
    });

</script>

</body>
</html><?php /**PATH /var/www/sigmappl/resources/views/content/dekan/jadwal.blade.php ENDPATH**/ ?>