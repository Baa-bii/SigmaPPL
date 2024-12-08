<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Set CSRF token for Axios
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;
    </script>

    <title>Registrasi</title>
    <link rel="icon" href="<?php echo e(asset('img/fix.png')); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Header -->
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
    
    <!-- Container Utama -->
    <main class="md:ml-64 h-auto pt-10 flex-grow">
        
        <div class="container max-w-7xl mx-auto p-6">
            <h1 class="mt-10 text-lg font-semibold text-gray-900 dark:text-white mb-4">Registrasi</h1>
            <!-- Pilih Status Akademik -->
            <div class="bg-white p-6 shadow-md rounded-lg">
                <h3 class="text-xl font-semibold mb-4">Pilih Status Akademik</h3>
                <div class="flex flex-col md:flex-row gap-6 mb-4">
                    <!-- Status Aktif -->
                    <div class="bg-gray-100 p-6 flex-1 rounded-lg">
                        <h3 class="text-lg font-bold mb-2">Aktif</h3>
                        <p class="mb-4">Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).</p>
                        <button id="status-aktif" 
                        class="px-4 py-2 rounded-md text-sm transition
                                <?php if(optional($semesterAktif->where('is_active', true)->first())->status !== 'Belum Registrasi'): ?> bg-gray-400 text-gray-700 cursor-not-allowed <?php else: ?> bg-yellow-300 hover:bg-yellow-600 <?php endif; ?>"
                            <?php if(optional($semesterAktif->where('is_active', true)->first())->status !== 'Belum Registrasi'): ?> disabled <?php endif; ?>>
                            Pilih
                        </button>
                    </div>
                    <!-- Status Cuti -->
                    <div class="bg-gray-100 p-6 flex-1 rounded-lg">
                        <h3 class="text-lg font-bold mb-2">Cuti</h3>
                        <p class="mb-4">Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa Undip.</p>
                        <button id="status-cuti" 
                        class="px-4 py-2 rounded-md text-sm transition
                                <?php if(optional($semesterAktif->where('is_active', true)->first())->status !== 'Belum Registrasi'): ?> bg-gray-400 text-gray-700 cursor-not-allowed <?php else: ?> bg-yellow-300 hover:bg-yellow-600 <?php endif; ?>"
                            <?php if(optional($semesterAktif->where('is_active', true)->first())->status !== 'Belum Registrasi'): ?> disabled <?php endif; ?>>
                            Pilih
                        </button>
                    </div>
                </div>
                <hr class="border-gray-300 mb-4">
                <div class="flex items-center">
                    <h3 class="text-lg font-semibold mr-4">Status Akademik:</h3>
                    <span id="status-akademik" 
                        class="px-4 py-2 rounded-md text-white text-sm
                            <?php if(isset($semesterAktif) && $semesterAktif->where('is_active', true)->first()->status === 'Aktif'): ?> bg-green-500
                            <?php elseif(isset($semesterAktif) && $semesterAktif->where('is_active', true)->first()->status === 'Cuti'): ?> bg-blue-500
                            <?php else: ?> bg-red-600 <?php endif; ?>">
                        <?php echo e($semesterAktif->where('is_active', true)->first()->status ?? 'Belum Tersedia'); ?>

                    </span>
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
</body>

<script>
    const nim = <?php echo json_encode($mahasiswa->nim, 15, 512) ?>; // Ambil NIM dari mahasiswa yang dikirim ke view

    document.getElementById('status-aktif').addEventListener('click', function () {
        updateStatus('Aktif');
    });

    document.getElementById('status-cuti').addEventListener('click', function () {
        updateStatus('Cuti');
    });

    function updateStatus(status) {
        axios.post('/update-status', {
            status: status,
            nim: nim // Kirim NIM ke backend
        })
        .then(response => {
            alert(response.data.message || 'Status berhasil diperbarui!');

            // Update status akademik di UI
            const statusAkademik = document.getElementById('status-akademik');
            statusAkademik.textContent = status; // Update teks status
            statusAkademik.classList.remove('bg-red-600'); // Hapus warna merah
            statusAkademik.classList.add('bg-green-600'); // Tambahkan warna biru
            // Tambahkan warna sesuai status
            
            // if (response.data.status === 'Aktif') {
            //     statusAkademik.classList.add('bg-green-600'); // Hijau untuk Aktif
            // } else if (response.data.status === 'Cuti') {
            //     statusAkademik.classList.add('bg-blue-600'); // Biru untuk Cuti
            // } else {
            //     statusAkademik.classList.add('bg-red-600'); // Merah untuk status lain
            // }
            // Disable tombol Aktif dan Cuti
            const statusAktifBtn = document.getElementById('status-aktif');
            const statusCutiBtn = document.getElementById('status-cuti');

            statusAktifBtn.disabled = true;
            statusAktifBtn.classList.add('bg-gray-400', 'text-gray-700', 'cursor-not-allowed');
            statusAktifBtn.classList.remove('bg-yellow-300', 'hover:bg-yellow-600');

            statusCutiBtn.disabled = true;
            statusCutiBtn.classList.add('bg-gray-400', 'text-gray-700', 'cursor-not-allowed');
            statusCutiBtn.classList.remove('bg-yellow-300', 'hover:bg-yellow-600');
            
        })
        .catch(error => {
            if (error.response) {
                alert(error.response.data.error || 'Terjadi kesalahan!');
            } else {
                alert('Gagal menghubungi server!');
            }
        });

    }

</script>
</html>
<?php /**PATH C:\00 KULIAH\00 SEMESTER 5\SiGMA\SigmaPPL\resources\views/content/mhs/registrasi.blade.php ENDPATH**/ ?>