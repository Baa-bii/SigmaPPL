<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mata Kuliah</title>
    <link rel="icon" href="<?php echo e(asset('img/fix.png')); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        <main class="md:ml-64 h-auto pt-20">
               <!-- Start block -->
            <section class="bg-gray-20 dark:bg-gray-900 p-3 sm:p-5 antialiased flex flex-col mim-h-screen">
                <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-auto min-h-screen">
                        <?php if($message = Session::get('success')): ?>
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: '<?php echo e($message); ?>',
                                });
                            </script>
                        <?php endif; ?>
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                            <div class="flex-1 flex items-center space-x-2">
                                <h5>
                                    <span class="text-gray-500">Semua Mata Kuliah:</span>
                                   
                                </h5>
                              
                               
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                            <div class="w-full md:w-1/2">
                                <form class="flex items-center">
                                    <label for="simple-search" class="sr-only">Cari mata kuliah</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="simple-search" placeholder="Cari mata kuliah" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                </form>
                                <script>
                                    document.getElementById("simple-search").addEventListener("input", function () {
                                        const query = this.value.toLowerCase(); // Ambil nilai input dan ubah ke huruf kecil
                                        const rows = document.querySelectorAll("#table-body tr"); // Ambil semua baris di tabel

                                        rows.forEach(row => {
                                            const rowText = row.textContent.toLowerCase(); // Ambil teks di dalam baris
                                            if (rowText.includes(query)) {
                                                row.style.display = ""; // Tampilkan baris jika cocok
                                            } else {
                                                row.style.display = "none"; // Sembunyikan baris jika tidak cocok
                                            }
                                        });
                                    });


                                </script>
                                <div id="search-results" class="mt-4"></div>
                                
                            </div>
                            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <div x-data="{ open: false }">
                                    <!-- Tombol "Tambah Mata Kuliah" -->
                                    <button 
                                        data-modal-target="add-modal"  data-modal-toggle="add-modal" class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        <svg 
                                            class="h-5 w-5 mr-2" 
                                            fill="currentColor" 
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                                        </svg>
                                        Tambah Mata Kuliah
                                    </button>

                                
                                    <!-- Form tambah mata kuliah -->
                                    <div id="add-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full h-auto max-w-screen-xl mx-auto">
                                            <div class="relative bg-white p-6 w-full max-w-full rounded-lg shadow-lg">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400" data-modal-toggle="add-modal">✖</button>
                                                    <h4 class="text-center text-2xl mb-6">Pengisian Mata Kuliah</h4>
                                                    
                                                    <form action="<?php echo e(route('kaprodi.mata_kuliah.store')); ?>" method="POST" class="space-y-4">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="grid grid-cols-2 gap-4">
                                                            <!-- Kode Mata Kuliah -->
                                                            <div>
                                                                <label for="kode_mk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Mata Kuliah</label>
                                                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" id="kode_mk" name="kode_mk" required>
                                                            </div>
                                                            <!-- Jenis Mata Kuliah -->
                                                            <div>
                                                                <label for="jenis_mk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Mata Kuliah</label>
                                                                <select class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" id="jenis_mk" name="jenis_mk" required>
                                                                    <option value="wajib">Wajib</option>
                                                                    <option value="pilihan">Pilihan</option>
                                                                </select>
                                                            </div>
                                                            <!-- Nama Mata Kuliah -->
                                                            <div>
                                                                <label for="nama_mk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mata Kuliah</label>
                                                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" id="nama_mk" name="nama_mk" required>
                                                               
                                                            </div>
                                                           
                                                            <!-- Semester -->
                                                            <div>
                                                                <label for="semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                                                <select name="semester" id="semester" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                                                                    <?php for($i = 1; $i <= 8; $i++): ?>
                                                                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                                
                                                            </div>
                                                            <!-- Jumlah SKS -->
                                                            <div>
                                                                <label for="sks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah SKS</label>
                                                                <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" id="sks" name="sks" min="1" required>
                                                            </div>
                                                            
                                                            <!-- Nama Dosen Pengampu -->                                                           
                                                            <div class="col-span-2">
                                                                <label for="nip_dosen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dosen Pengampu</label>
                                                                <div id="nip_dosen" class="space-y-2" style="max-height: 200px; overflow-y: auto;">
                                                                    <?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="flex items-center">
                                                                            <input type="checkbox" name="nip_dosen[]" value="<?php echo e($item->nip_dosen); ?>" id="nip_dosen_<?php echo e($item->nip_dosen); ?>" class="mr-2">
                                                                            <label for="nip_dosen_<?php echo e($item->nip_dosen); ?>"><?php echo e($item->nama_dosen); ?></label>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                        </div>
                                                        
                                                        <div class="flex items-center space-x-4 mt-4">
                                                            <button type="submit" class="text-white bg-green-600 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                Simpan dan tambahkan
                                                            </button>
                                                            
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>                           

                            </div>
                            <div class="overflow-x-auto">
                                <div class="mb-4">
                                   
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-white uppercase bg-green-500 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            
                                            <th scope="col" class="p-4">No</th>
                                            <th scope="col" class="p-4">Kode Mata Kuliah</th>
                                            <th scope="col" class="p-4">Nama Mata Kuliah</th>
                                            <th scope="col" class="p-4">SKS</th>
                                            <th scope="col" class="p-4">Semester</th>
                                            <th scope="col" class="p-4">Jenis</th>
                                            <th scope="col" class="p-4">Program Studi</th>
                                            <th scope="col" class="p-4">Opsi</th> <!-- Kolom tambahan untuk opsi tombol -->
                                        </tr>
                                    </thead>
                                    
                                    <tbody id="table-body">
                                        
                                        <?php $__empty_1 = true; $__currentLoopData = $mataKuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            
                                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                
                                                <td class="p-4 w-4"><?php echo e($loop->iteration); ?></td>
                                                <td class="px-4 py-2 border"><?php echo e($item->kode_mk); ?></td>
                                               
                                                <td class="px-4 py-2 border"><?php echo e($item->nama_mk); ?></td>
                                                <td class="px-4 py-2 border"><?php echo e($item->sks); ?></td>
                                                <td class="px-4 py-2 border"><?php echo e($item->semester); ?></td>
                                                <td class="px-4 py-2 border"><?php echo e($item->jenis_mk); ?></td>
                                                <td class="px-4 py-2 border"><?php echo e($item->programStudi->nama_prodi); ?></td>
                                                
                                    
                                                <!-- Kolom untuk tombol -->
                                                
                                                <td class="px-4 py-2 border">
                                                    <div class="flex items-center space-x-4">
                                                        <button type="button" data-modal-target="edit-modal-<?php echo e($item->kode_mk); ?>" data-modal-toggle="edit-modal-<?php echo e($item->kode_mk); ?>" aria-controls="edit-modal-<?php echo e($item->kode_mk); ?>" class="py-2 px-3 flex items-center text-sm font-medium text-center text-black bg-yellow-400 rounded-lg border-yellow-500 hover:bg-yellow-600 hover:text-white border">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="false">
                                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                            </svg>
                                                            Edit
                                                        </button>
                                                        
                                                        <div id="edit-modal-<?php echo e($item->kode_mk); ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative w-full h-auto max-w-screen-xl mx-auto">
                                                                <div class="relative bg-white p-6 w-full max-w-full rounded-lg shadow-lg">
                                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400" data-modal-toggle="edit-modal-<?php echo e($item->kode_mk); ?>">✖</button>
                                                                    <h4 class="text-center text-2xl mb-6">Edit Mata Kuliah</h4>
                                                                    <form action="<?php echo e(route('kaprodi.mata_kuliah.update', $item->kode_mk)); ?>" method="POST" class="space-y-4">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('PUT'); ?> <!-- Menandakan update -->
                                                                        <div class="grid grid-cols-2 gap-4">
                                                                            <!-- Kode Mata Kuliah -->
                                                                            <div>
                                                                                <label for="kode_mk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Mata Kuliah</label>
                                                                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" id="kode_mk" name="kode_mk" value="<?php echo e($item->kode_mk); ?>" required>
                                                                            </div>
                                                                            <!-- Jenis Mata Kuliah -->
                                                                            <div>
                                                                                <label for="jenis_mk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Mata Kuliah</label>
                                                                                <select class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" id="jenis_mk" name="jenis_mk" required>
                                                                                    <option value="wajib" <?php echo e($item->jenis_mk == 'wajib' ? 'selected' : ''); ?>>Wajib</option>
                                                                                    <option value="pilihan" <?php echo e($item->jenis_mk == 'pilihan' ? 'selected' : ''); ?>>Pilihan</option>
                                                                                </select>
                                                                            </div>
                                                                            <!-- Nama Mata Kuliah -->
                                                                            <div>
                                                                                <label for="nama_mk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mata Kuliah</label>
                                                                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" id="nama_mk" name="nama_mk" value="<?php echo e($item->nama_mk); ?>" required>
                                                                            </div>
                                                                            <!-- Semester -->
                                                                            <div>
                                                                                <label for="semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                                                                <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" id="semester" name="semester" value="<?php echo e($item->semester); ?>" min="1" max="8" required>
                                                                            </div>
                                                                            <!-- Jumlah SKS -->
                                                                            <div>
                                                                                <label for="sks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah SKS</label>
                                                                                <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" id="sks" name="sks" value="<?php echo e($item->sks); ?>" min="1" required>
                                                                            </div>
                                                                            
                                                                            <!-- Nama Dosen Pengampu -->                                                           
                                                                            <div class="col-span-2">
                                                                                <label for="nip_dosen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dosen Pengampu</label>
                                                                                <div id="nip_dosen" class="space-y-2" style="max-height: 200px; overflow-y: auto;">
                                                                                    <?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dosenItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <div class="flex items-center">
                                                                                            <input type="checkbox" name="nip_dosen[]" value="<?php echo e($dosenItem->nip_dosen); ?>" id="nip_dosen_<?php echo e($dosenItem->nip_dosen); ?>" class="mr-2" <?php echo e(in_array($dosenItem->nip_dosen, $item->dosen->pluck('nip_dosen')->toArray()) ? 'checked' : ''); ?>>
                                                                                            <label for="nip_dosen_<?php echo e($dosenItem->nip_dosen); ?>"><?php echo e($dosenItem->nama_dosen); ?></label>
                                                                                        </div>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                            
                                                                        <div class="flex items-center space-x-4 mt-4">
                                                                            <button type="submit" class="text-white bg-green-600 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                                Simpan perubahan
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-blue-300 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" 
                                                                data-id="<?php echo e($item->kode_mk); ?>" 
                                                                data-nama="<?php echo e($item->nama_mk); ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                            </svg>
                                                            Lihat
                                                        </button>
                                                        <div id="drawer-read-product-advanced" class="fixed top-0 right-0 z-50 hidden h-full w-80 bg-white dark:bg-gray-800 dark:text-white border-l border-gray-200 dark:border-gray-600 p-6">
                                                            <h2 class="text-2xl font-bold">Detail Mata Kuliah</h2>
                                                            <p id="mata-kuliah-nama">Loading...</p>
                                                            <!-- Anda bisa menambahkan data lainnya seperti kode MK, deskripsi, dll. -->
                                                            <button type="button" class="mt-4 py-2 px-4 bg-red-500 text-white rounded" onclick="closeDrawer()">Tutup</button>
                                                        </div>
                                                        <script>
                                                            // Fungsi untuk menampilkan drawer dan mengisi data mata kuliah
                                                            function openDrawer(mataKuliahNama) {
                                                                const drawer = document.getElementById("drawer-read-product-advanced");
                                                                const mataKuliahNamaElement = document.getElementById("mata-kuliah-nama");
                                                        
                                                                // Update konten dengan nama mata kuliah yang dipilih
                                                                mataKuliahNamaElement.innerHTML = mataKuliahNama;
                                                        
                                                                // Menampilkan drawer
                                                                drawer.classList.remove("hidden");
                                                            }
                                                        
                                                            // Fungsi untuk menutup drawer
                                                            function closeDrawer() {
                                                                const drawer = document.getElementById("drawer-read-product-advanced");
                                                                drawer.classList.add("hidden");
                                                            }
                                                        
                                                            // Menambahkan event listener untuk tombol "Lihat"
                                                            document.querySelectorAll("button[data-id]").forEach(button => {
                                                                button.addEventListener("click", function() {
                                                                    const mataKuliahNama = this.getAttribute("data-nama"); // Mendapatkan nama mata kuliah
                                                                    openDrawer(mataKuliahNama);
                                                                });
                                                            });
                                                        </script>
                                                        

                                                        <form id="delete-form-<?php echo e($item->kode_mk); ?>" action="<?php echo e(route('kaprodi.mata_kuliah.destroy', $item->kode_mk)); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="button" onclick="openDialog('custom-confirm-<?php echo e($item->kode_mk); ?>')"  class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 rounded-lg text-sm inline item-center font-medium px-3 py-2.5 text-center ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                                </svg>
                                                                Hapus
                                                            </button>
                                                            
                                                        </form>
                                                        <div id="custom-confirm-<?php echo e($item->kode_mk); ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                                            <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm">
                                                                <p class="mb-4">Apakah Anda yakin ingin menghapus mata kuliah <strong><?php echo e($item->nama_mk); ?></strong>?</p>
                                                                <div class="flex justify-end gap-4">
                                                                    <button onclick="closeDialog('custom-confirm-<?php echo e($item->kode_mk); ?>')" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded">Batal</button>
                                                                    <button onclick="submitForm('delete-form-<?php echo e($item->kode_mk); ?>')" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Hapus</button>
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
                                                <td colspan="7" class="text-center py-4">Tidak ada data mata kuliah</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    
                                </table>
                                


                            </div>
                            
                        </div>   
                    </div>
                </div>
                
            </section>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
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
</html><?php /**PATH C:\00 KULIAH\00 SEMESTER 5\SiGMA\SigmaPPL\resources\views/content/kaprodi/matakuliah.blade.php ENDPATH**/ ?>