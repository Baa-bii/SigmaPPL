<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal</title>
    <link rel="icon" href="<?php echo e(asset('img/fix.png')); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        #timetable.hidden {
            display: none;
        }
        
        .table-auto td, .table-auto th {
            text-align: center;
            vertical-align: middle;
        }
        #ajukan-modal {
            backdrop-filter: blur(5px);  /* Menambahkan efek blur */
        }

        </style>
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
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $attributes = $__attributesOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $component = $__componentOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__componentOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>

        <main class="md:ml-64 h-auto pt-20">
            <!-- Container Utama -->

        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <?php if($message = Session::get('success')): ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: '<?php echo e($message); ?>',
                        });
                    </script>
                <?php endif; ?>
            
                <?php if($errors->any()): ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: `
                                <strong>Terjadi Kesalahan:</strong>
                                <ul style="text-align: left;">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            `,
                        });
                    </script>
                <?php endif; ?>
            
            
                <div class="mb-6 pl-4">
                    <h2 class="text-2xl font-bold">Daftar Jadwal</h2>
                    <p>Tahun Ajaran Aktif: <?php echo e($tahunAjaran); ?></p>
                    <p>Program Studi: <?php echo e($programStudi->nama_prodi); ?></p>
                    <p>Status Jadwal: <?php echo e($statusJadwal); ?></p>
                </div>
                <div class="flex justify-between items-center mb-6 pl-4">
                    
                    <div x-data="{open : false}">
                        <button 
                            data-modal-target="add-modal"  data-modal-toggle="add-modal" class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg 
                                class="h-5 w-5 mr-2" 
                                fill="currentColor" 
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                            </svg>
                            Tambah Jadwal
                        </button>
                        
                        
                        <div id="add-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full h-auto max-w-md max-h-full">
                                <div class="relative bg-white p-6 w-full max-w-lg rounded-lg shadow " >
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400" data-modal-toggle="add-modal">✖</button>
                                        <form id="form-primer" method="POST" action="<?php echo e(route('kaprodi.jadwal.store')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <h4 class="text-center text-2xl mb-6">Tambah Jadwal</h4>
                                            
                                            <!-- Dropdown Mata Kuliah -->
                                            <div class="mb-4 pl-4">
                                                <label for="kode_mk" class="block text-sm font-medium">Mata Kuliah</label>
                                                <select name="kode_mk" id="kode_mk" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 w-full p-2.5" required>
                                                    <?php $__currentLoopData = $matakuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($mk->kode_mk); ?>" data-sks="<?php echo e($mk->sks); ?>"><?php echo e($mk->nama_mk); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        
                                            <!-- Input Jumlah Kelas -->
                                            <div class="mb-4 pl-4">
                                                <label for="jumlah_kelas" class="block text-sm font-medium">Jumlah Kelas</label>
                                                <input type="number" id="jumlah_kelas" name="jumlah_kelas" class="form-input bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 w-full p-2.5" min="1" max="10" required>
                                            </div>
                                        
                                            <!-- Tempat untuk Jadwal Kelas -->
                                            <div id="jadwal-kelas-container" class="mb-4 pl-4">
                                                <!-- Form tambahan akan muncul di sini -->
                                            </div>
                                        
                                            <div class="flex items-center space-x-4 mt-4">
                                                <button type="submit" class="text-white bg-green-600 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Simpan dan tambahkan
                                                </button>
                                            </div>
                                        </form>
                                        <script>
                                            document.getElementById('jumlah_kelas').addEventListener('input', function () {
                                                const container = document.getElementById('jadwal-kelas-container');
                                                const jumlahKelas = parseInt(this.value) || 0;

                                                // Hapus elemen sebelumnya
                                                container.innerHTML = '';

                                                for (let i = 1; i <= jumlahKelas; i++) {
                                                    const jadwalHtml = `
                                                        <div class="mb-4">
                                                            <h5 class="text-lg font-bold">Jadwal Kelas ${i}</h5>
                                                            <!-- kelas -->
                                                            <div class="mb-4 pl-2">
                                                                <label for="kelas[${i}][kelas]" class="block text-sm font-medium">Kelas</label>
                                                                <input type="text" id="kelas" name="kelas[${i}][kelas]" class="form-input bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 w-full p-2.5" required>
                                                            </div>

                                                            <!-- ID jadwal-->
                                                           <div class="mb-4 pl-2">
                                                                <label for="kelas[${i}][id_jadwal]" class="block text-sm font-medium">ID Jadwal</label>
                                                                <input type="text" id="id_jadwal" name="kelas[${i}][id_jadwal]" class="form-input bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 w-full p-2.5" required>
                                                            </div>


                                                            <!-- Hari -->
                                                            <label for="kelas[${i}][hari]" class="block text-sm font-medium">Hari</label>
                                                            <select name="kelas[${i}][hari]" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" required>
                                                                <option value="Senin">Senin</option>
                                                                <option value="Selasa">Selasa</option>
                                                                <option value="Rabu">Rabu</option>
                                                                <option value="Kamis">Kamis</option>
                                                                <option value="Jumat">Jumat</option>
                                                            </select>

                                                            <!-- Ruangan -->
                                                            <label for="kelas[${i}][id_ruang]" class="block text-sm font-medium mt-2">Ruangan</label>
                                                            <select name="kelas[${i}][id_ruang]" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" required>
                                                                <?php $__currentLoopData = $ruang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($ru->id); ?>"><?php echo e($ru->gedung); ?><?php echo e($ru->nama); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>

                                                            <!-- Jam Mulai -->
                                                            <label for="kelas[${i}][id_waktu]" class="block text-sm font-medium mt-2">Jam Mulai</label>
                                                            <select name="kelas[${i}][id_waktu]" id="jam_mulai_${i}" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5 jam-mulai" data-index="${i}" required>
                                                                <?php $__currentLoopData = $waktu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($wt->id); ?>" data-jam="<?php echo e($wt->jam_mulai); ?>"><?php echo e($wt->jam_mulai); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    `;
                                                    container.insertAdjacentHTML('beforeend', jadwalHtml);
                                                        
                                                        // Event listener untuk dropdown
                                                        document.getElementById('jadwal-kelas-container').addEventListener('change', function (event) {
                                                            const target = event.target;

                                                            // Jika dropdown jam_mulai berubah
                                                            if (target.matches('.jam-mulai')) {
                                                                hitungJamSelesai(target);
                                                            }
                                                        });
                                                    }                                                       
                                                }
                                            );
                                        </script>                                                                                 
                                </div>
                            </div>
                        </div>    
                    </div>  
                    <div class="flex items-center space-x-2 mt-4"> 
                        <button type="btn" class="text-white  bg-yellow-400  border-yellow-500 hover:bg-yellow-600 hover:text-white border focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center">
                            Lihat Timetable Jadwal
                        </button>
                    </div>
                    <button 
                        data-modal-toggle="ajukan-modal" 
                        type="button" 
                        class="text- bg-green-200 border-green-600 hover:bg-green-600 hover:text-white border focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center">
                        Ajukan Jadwal
                    </button>

                </div>  
                    <!-- Tabel Jadwal -->
                <div class="overflow-x-auto pl-4 mr-4">
                        <table class="table-auto w-full border-collapse border border-green-500">
                            <thead class="text-xs text-white uppercase bg-green-500 dark:bg-gray-700">
                                <tr class="bg-green-500">
                                    <th scope="col" class="p-4">No</th>
                                    <th class="px-4 py-2 border">ID Jadwal</th>
                                    <th class="px-4 py-2 border">Hari</th>
                                    <th class="px-4 py-2 border">Mata Kuliah</th>
                                    <th class="px-4 py-2 border">SKS</th>
                                    <th class="px-4 py-2 border">Kelas</th>
                                    <th class="px-4 py-2 border">Ruang</th>
                                    <th class="px-4 py-2 border">Jam Mulai</th>
                                    <th class="px-4 py-2 border">Jam Selesai</th>
                                    <th class="px-4 py-2 border">Semester</th>
                                    <th class="px-4 py-2 border">Opsi</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="text-center">
                                        <td class="p-4 w-4"><?php echo e($loop->iteration); ?></td>
                                        <td class="px-4 py-2 border"><?php echo e($item->id_jadwal); ?></td>
                                        <td class="px-4 py-2 border"><?php echo e($item->hari); ?></td>
                                        <td class="px-4 py-2 border">
                                            <?php echo e($item->matakuliah->nama_mk); ?>

                                        </td>
                                        <td class="px-4 py-2 border"><?php echo e($item->matakuliah->sks); ?></td>
                                        <td class="px-4 py-2 border"><?php echo e($item->kelas); ?></td>
                                        <td class="px-4 py-2 border">
                                            <?php echo e($item->ruang->gedung); ?>

                                            <?php echo e($item->ruang->nama); ?>

                                        </td>
                                        <td class="px-4 py-2 border">
                                            <?php echo e($item->waktu->jam_mulai); ?>

                                           
                                        </td> 
                                        <td class="px-4 py-2 border">
                                            <?php echo e($item->jam_selesai); ?> <!-- Menampilkan jam selesai -->
                                        </td>
                                        <td class="px-4 py-2 border">
                                            <?php echo e($item->semesterAktif->semester); ?> <!-- Menampilkan jam selesai -->
                                        </td>
                                        <!-- Kolom untuk tombol -->
                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center space-x-4">
                                                
                                                <button type="button" data-modal-target="edit-modal-<?php echo e($item->id_jadwal); ?>" data-modal-toggle="edit-modal-<?php echo e($item->id_jadwal); ?>" aria-controls="edit-modal-<?php echo e($item->id_jadwal); ?>" class="py-2 px-3 flex items-center text-sm font-medium text-center text-black bg-yellow-400 rounded-lg border-yellow-500 hover:bg-yellow-600 hover:text-white border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="false">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                    </svg>
                                                    Edit
                                                </button>
                                                <div id="edit-modal-<?php echo e($item->id_jadwal); ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full h-auto max-w-md max-h-full">
                                                        <div class="relative bg-white p-6 w-full max-w-lg rounded-lg shadow">
                                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400" data-modal-toggle="edit-modal-<?php echo e($item->id_jadwal); ?>">✖</button>
                                                            <form id="edit_modal" method="POST" action="<?php echo e(route('kaprodi.jadwal.update', $item->id_jadwal)); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('PUT'); ?>
                                                                <h4 class="text-center text-2xl mb-6">Edit Jadwal</h4>
                                                
                                                                <!-- Dropdown Mata Kuliah -->
                                                                <div class="mb-4">
                                                                    <label for="kode_mk" class="block text-sm font-medium">Mata Kuliah</label>
                                                                    <select name="kode_mk" id="kode_mk" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 w-full p-2.5" required>
                                                                        <?php $__currentLoopData = $matakuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($mk->kode_mk); ?>" <?php echo e($mk->kode_mk == $item->kode_mk ? 'selected' : ''); ?>>
                                                                                <?php echo e($mk->nama_mk); ?>

                                                                            </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                
                                                                <!-- Tempat untuk Jadwal Kelas -->
                                                                <div id="jadwal-kelas-container" class="mb-4">
                                                                    <div class="mb-4">
                                                                        <h5 class="text-lg font-bold">Jadwal Kelas</h5>
                                                                        <div class="mb-4">
                                                                            <label for="kelas" class="block text-sm font-medium">Kelas</label>
                                                                            <input type="text" id="kelas" name="kelas" class="form-input bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" value="<?php echo e($item->kelas); ?>" required>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <label for="id_jadwal" class="block text-sm font-medium">ID Jadwal</label>
                                                                            <input type="text" id="id_jadwal" name="id_jadwal" class="form-input bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" value="<?php echo e($item->id_jadwal); ?>" required>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <label for="hari" class="block text-sm font-medium">Hari</label>
                                                                            <select id="hari" name="hari" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" required>
                                                                                <option value="Senin" <?php echo e($item->hari === 'Senin' ? 'selected' : ''); ?>>Senin</option>
                                                                                <option value="Selasa" <?php echo e($item->hari === 'Selasa' ? 'selected' : ''); ?>>Selasa</option>
                                                                                <option value="Rabu" <?php echo e($item->hari === 'Rabu' ? 'selected' : ''); ?>>Rabu</option>
                                                                                <option value="Kamis" <?php echo e($item->hari === 'Kamis' ? 'selected' : ''); ?>>Kamis</option>
                                                                                <option value="Jumat" <?php echo e($item->hari === 'Jumat' ? 'selected' : ''); ?>>Jumat</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <label for="id_ruang" class="block text-sm font-medium">Ruangan</label>
                                                                            <select id="id_ruang" name="id_ruang" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" required>
                                                                                <?php $__currentLoopData = $ruang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($ru->id); ?>" <?php echo e($item->id_ruang == $ru->id ? 'selected' : ''); ?>><?php echo e($ru->gedung); ?><?php echo e($ru->nama); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <label for="id_waktu" class="block text-sm font-medium">Jam Mulai</label>
                                                                            <select id="id_waktu" name="id_waktu" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" required>
                                                                                <?php $__currentLoopData = $waktu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($wt->id); ?>" <?php echo e($item->id_waktu == $wt->id ? 'selected' : ''); ?>><?php echo e($wt->jam_mulai); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                
                                                                <div class="flex items-center space-x-4 mt-4">
                                                                    <button type="submit" class="text-white bg-green-600 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                        Simpan dan Tambahkan
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function () {
                                                        const modals = document.querySelectorAll('[id^="edit-modal-"]');
                                                
                                                        modals.forEach((modal) => {
                                                            const container = modal.querySelector('#jadwal-kelas-container');
                                                            const jumlahKelasInput = modal.querySelector('#jumlah_kelas');
                                                
                                                            const kelasData = <?php echo json_encode($item->kelas || [], 15, 512) ?>; // Ambil data kelas
                                                
                                                            const generateJadwalFields = (jumlahKelas) => {
                                                                container.innerHTML = ''; // Bersihkan kontainer
                                                
                                                                for (let i = 1; i <= jumlahKelas; i++) {
                                                                    const kelas = kelasData[i - 1] || {}; // Data kelas jika ada
                                                
                                                                    const jadwalHtml = `
                                                                        <div class="mb-4">
                                                                            <h5 class="text-lg font-bold">Jadwal Kelas ${i}</h5>
                                                                            <div class="mb-4">
                                                                                <label for="kelas_${i}" class="block text-sm font-medium">Kelas</label>
                                                                                <input type="text" id="kelas_${i}" name="kelas[${i}][kelas]" class="form-input bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" value="${kelas.kelas || ''}" required>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label for="id_jadwal_${i}" class="block text-sm font-medium">ID Jadwal</label>
                                                                                <input type="text" id="id_jadwal_${i}" name="kelas[${i}][id_jadwal]" class="form-input bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" value="${kelas.id_jadwal || ''}" required>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label for="hari_${i}" class="block text-sm font-medium">Hari</label>
                                                                                <select id="hari_${i}" name="kelas[${i}][hari]" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" required>
                                                                                    <option value="Senin" ${kelas.hari === 'Senin' ? 'selected' : ''}>Senin</option>
                                                                                    <option value="Selasa" ${kelas.hari === 'Selasa' ? 'selected' : ''}>Selasa</option>
                                                                                    <option value="Rabu" ${kelas.hari === 'Rabu' ? 'selected' : ''}>Rabu</option>
                                                                                    <option value="Kamis" ${kelas.hari === 'Kamis' ? 'selected' : ''}>Kamis</option>
                                                                                    <option value="Jumat" ${kelas.hari === 'Jumat' ? 'selected' : ''}>Jumat</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    `;
                                                                    container.insertAdjacentHTML('beforeend', jadwalHtml);
                                                                }
                                                            };
                                                
                                                            jumlahKelasInput.addEventListener('input', (e) => {
                                                                const jumlahKelas = parseInt(e.target.value) || 0;
                                                                generateJadwalFields(jumlahKelas);
                                                            });
                                                
                                                            // Generate fields saat pertama kali modal dibuka
                                                            const jumlahKelas = parseInt(jumlahKelasInput.value) || 0;
                                                            generateJadwalFields(jumlahKelas);
                                                        });
                                                    });
                                                </script>
                                                
                                                
                                                
                                                <form id="delete-form-<?php echo e($item->id_jadwal); ?>" action="<?php echo e(route('kaprodi.jadwal.destroy', $item->id_jadwal)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="button" onclick="openDialog('custom-confirm-<?php echo e($item->id_jadwal); ?>')" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 rounded-lg text-sm item-center font-medium px-3 py-2.5 text-center ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                    
                                                </form>
                                                <div id="custom-confirm-<?php echo e($item->id_jadwal); ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                                    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm">
                                                        <p class="mb-4">Apakah Anda yakin ingin menghapus jadwal <strong><?php echo e($item->id_jadwal); ?></strong>?</p>
                                                        <div class="flex justify-end gap-4">
                                                            <button onclick="closeDialog('custom-confirm-<?php echo e($item->id_jadwal); ?>')" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded">Batal</button>
                                                            <button onclick="submitForm('delete-form-<?php echo e($item->id_jadwal); ?>')" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function openDialog(dialogId) {
                                                        document.getElementById(dialogId).classList.remove('hidden');
                                                    }

                                                    function closeDialog(dialogId) {
                                                        document.getElementById(dialogId).classList.add('hidden');
                                                    }

                                                    function submitForm(formId) {
                                                        document.getElementById(formId).submit();
                                                    }
                                                </script>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-gray-500">
                                            Tidak ada jadwal yang tersedia.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="timetable" class="hidden overflow-x-auto pl-4">
                    <table class="table-auto w-full border-collapse border border-green-500">
                        <thead class="text-xs text-white uppercase bg-green-500 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                
                                <th class="px-4 py-2 border">Waktu</th>
                                <th class="px-4 py-2 border">Senin</th>
                                <th class="px-4 py-2 border">Selasa</th>
                                <th class="px-4 py-2 border">Rabu</th>
                                <th class="px-4 py-2 border">Kamis</th>
                                <th class="px-4 py-2 border">Jumat</th>
                            </tr>
                        </thead>
                        <tbody id="timetable-body">
                            <!-- Data timetable akan diisi dengan JavaScript -->
                        </tbody>
                    </table>
                </div>
                <script>
                    document.querySelector('button[type="btn"]').addEventListener('click', function () {
                    const timetableContainer = document.getElementById('timetable');
                    const normalTable = document.querySelector('.table-auto'); // Tabel awal
                    timetableContainer.classList.toggle('hidden');
                    normalTable.classList.toggle('hidden');

                    if (!timetableContainer.classList.contains('hidden')) {
                        const timetableBody = document.getElementById('timetable-body');
                        timetableBody.innerHTML = ''; // Kosongkan tabel terlebih dahulu

                        const timeslots = <?php echo json_encode($waktu, 15, 512) ?>; // Data waktu (jam mulai)
                        const days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

                        // Loop untuk mengisi setiap baris berdasarkan waktu
                        timeslots.forEach((timeslot) => {
                            const row = document.createElement('tr');
                            row.innerHTML = `<td class="px-4 py-2 border">${timeslot.jam_mulai}</td>`;

                            days.forEach((day) => {
                                const cell = document.createElement('td');
                                cell.className = 'px-4 py-2 border text-center';

                                const schedule = <?php echo json_encode($jadwal, 15, 512) ?>.filter(
                                    (item) => item.hari === day && item.id_waktu === timeslot.id
                                );

                                if (schedule.length) {
                                    cell.innerHTML = schedule.map(
                                        (s) => `<div>${s.matakuliah.nama_mk} ${s.kelas}<br>${s.ruang.gedung} ${s.ruang.nama}</div>`
                                    ).join('');
                                } else {
                                    cell.innerHTML = '-';
                                }

                                row.appendChild(cell);
                            });

                            timetableBody.appendChild(row);
                        });
                    }
                });

                </script>
                <!-- Ajukan -->
                <div id="ajukan-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center backdrop-blur-lg">
                    <div class="relative w-full h-auto max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div id="modal-content" class="p-6 text-center">
                                <!-- Konten awal modal -->
                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Ajukan Jadwal Ini?</h3>
                                <button id="confirm-button" onclick="document.getElementById('ajukan-form').submit()" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Iya, ajukan
                                </button>
                                <form id="ajukan-form" action="<?php echo e(route('kaprodi.jadwal.ajukan')); ?>" method="POST" class="hidden">
                                    <?php echo csrf_field(); ?>
                                </form>
                                
                                <button data-modal-toggle="ajukan-modal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Kembali
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                    document.querySelectorAll('[data-modal-toggle]').forEach((button) => {
                        button.addEventListener('click', function () {
                            const modalId = this.getAttribute('data-modal-toggle');
                            const modal = document.getElementById(modalId);
                            modal.classList.toggle('hidden');
                        });
                    });
                </script>
                <script>
                    document.getElementById('confirm-button').addEventListener('click', function () {
                        const modalContent = document.getElementById('modal-content');
                        modalContent.innerHTML = `
                            <svg aria-hidden="true" class="mx-auto mb-4 text-green-400 w-14 h-14 dark:text-green-200" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-semibold text-green-600 dark:text-green-400">Jadwal Telah Diajukan</h3>
                            <button id="close-modal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Tutup
                            </button>
                        `;
                        
                        // Tambahkan event listener ke tombol "Tutup"
                        document.getElementById('close-modal').addEventListener('click', function () {
                            document.getElementById('ajukan-modal').classList.add('hidden');
                        });
                    });
                </script>

            </div>
        </section>
           
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
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
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
<?php /**PATH /var/www/sigmappl/resources/views/content/kaprodi/jadwal.blade.php ENDPATH**/ ?>