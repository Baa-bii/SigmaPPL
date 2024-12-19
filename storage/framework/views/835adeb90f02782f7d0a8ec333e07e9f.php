<div class="z-10 tab-content flex flex-col lg:flex-row gap-6" id="buat-irs">
<?php if(isset($status) && $status === 'Aktif' && $statusIRSMHS === 'Belum Disetujui' || !isset($statusIRSMHS)): ?>
    <!-- Sidebar Informasi Mahasiswa -->
    <div class="bg-white p-6 w-full lg:w-1/3 border border-gray-300">
        
        <!-- Bagian Nama dan NIM -->
        <div class="border border-gray-300 p-4 mb-6">
            <div class="mb-4">
                <h3 class="font-semibold mb-2 text-xs">Nama: <span class="font-normal"><?php echo e($mhs->nama_mhs); ?></span></h3>
                <h3 class="font-semibold mb-2 text-xs">NIM: <span class="font-normal"><?php echo e($mhs->nim); ?></span></h3>
                <h3 class="font-semibold mb-2 text-xs">Semester: <span class="font-normal"><?php echo e($semester ?? 'Tidak Diketahui'); ?></span></h3>
            </div>
            <!-- Garis pemisah -->
            <hr class="border-t-2 border-gray-300 mb-4">
            <!-- Bagian Informasi Akademik -->
            <div>
                <p class="text-gray-600 mb-1 text-xs">Th. Ajaran: <span class="font-normal"><?php echo e($tahunAkademik ?? 'Tidak Diketahui'); ?></span></p>
                <p class="text-gray-600 mb-1 text-xs">IPK (kumulatif): <span class="font-normal"><?php echo e($ipk); ?></span></p>
                <p class="text-gray-600 mb-1 text-xs">IPS (semester lalu): <span class="font-normal"><?php echo e($ips); ?></span></p>
                <p class="text-gray-600 mb-1 text-xs">Max. Beban SKS: <span class="font-normal"><?php echo e($maxSKS); ?></span></p>
            </div>
        </div>

        <div class="daftar-mk">
            <!-- Progress Pilih SKS -->
            <div class="flex items-center mb-4">
                <div class="w-full h-5 bg-gray-200 rounded dark:bg-gray-700 mr-2">
                    <div id="progress-sks" class="h-5 bg-yellow-300 rounded" style="width: 0%"></div>
                </div>
                <span id="sks-text" class="text-sm font-medium text-gray-500 dark:text-gray-400"><?php echo e($maxSKS); ?> SKS</span>
            </div>
            <div id="sks-warning" class="text-red-500 text-sm mt-2 hidden">
                Total SKS melebihi batas maksimal!
            </div>
            
            <!-- Dropdown menu -->
            <!-- Dropdown menu -->
            <div id="mataKuliahForm">
                <label for="input-group-search" class="sr-only">Search</label>
                <div class="relative mb-4">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-auto">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="input-group-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mata Kuliah">
                </div>
                <ul id="dropdownSearchList" class="h-auto px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200 mb-4" aria-labelledby="dropdownSearchButton">
                    <?php $__currentLoopData = $mataKuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input type="checkbox" name="mata_kuliah[]" id="checkbox-<?php echo e($mk->kode_mk); ?>" 
                                value="<?php echo e($mk->kode_mk); ?>" 
                                class="course-checkbox cursor-pointer"
                                <?php if(in_array($mk->kode_mk, $selectedMataKuliah)): ?> checked <?php endif; ?>
                                <?php if($mk->semester == $semester): ?> checked <?php endif; ?> />
                            <label for="checkbox-<?php echo e($mk->kode_mk); ?>" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300 cursor-pointer">
                                <?php echo e($mk->nama_mk); ?> - <?php echo e($mk->sks); ?> SKS (Semester <?php echo e($mk->semester); ?>) - <?php echo e(strtoupper($mk->jenis_mk)); ?> - (<?php echo e($mk->kode_mk); ?>)
                            </label>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

        </div>
    </div>
    
    <!-- Jadwal Mata Kuliah -->
    <div class="w-full lg:w-2/3 scroll-smooth">
        <div class="overflow-x-auto">
            <table id="jadwalTable" class="w-full mb-5 border-collapse border border-gray-300 bg-white">
                <thead class="bg-white shadow-sm">
                    <tr>
                        <th class="border border-gray-300 p-2">WAKTU<br><span class="italic text-sm font-medium">TIME</span></th>
                        <?php $__currentLoopData = ['SENIN' => 'MONDAY', 'SELASA' => 'TUESDAY', 'RABU' => 'WEDNESDAY', 'KAMIS' => 'THURSDAY', 'JUMAT' => 'FRIDAY']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indonesia => $english): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th class="border border-gray-300 p-2"><?php echo e($indonesia); ?><br><span class="italic text-sm font-medium"><?php echo e($english); ?></span></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </thead>

                <tbody id="jadwalBody">
                    <?php
                        $timeslots = ['06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'];
                        $days = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT'];
                    ?>

                    <?php $__currentLoopData = $timeslots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center"><?php echo e($slot); ?></td>
                        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="border border-gray-300 p-2">
                                <!-- Jadwal akan ditambahkan secara dinamis melalui JavaScript -->
                                <?php
                                    $currentJadwal = $jadwal->filter(function ($j) use ($day, $slot) {
                                        if (!isset($j->jam_mulai) || !isset($j->hari)) {
                                            return false;
                                        }

                                        try {
                                            // Memformat 'jam_mulai' menjadi 'HH:MM'
                                            $jamMulaiFormatted = Carbon::createFromFormat('H:i:s', $j->jam_mulai)->format('H:i');
                                        } catch (\Exception $e) {
                                            // Jika format salah, abaikan jadwal ini
                                            return false;
                                        }
                                        return strtoupper($j->hari) === $day && $jamMulaiFormatted === $slot;
                                    });
                                ?>

                                <?php if($currentJadwal->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $currentJadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       
                                    <div class="w-40 h-auto p-2 bg-white border-l-4 border-blue-500 rounded-lg shadow-lg mb-2 jadwal-item <?php echo e($jadwalClass); ?>

                                        <?php if(in_array($item->id_jadwal, $selectedJadwal)): ?>
                                            border-green-500 bg-green-400 
                                        
                                        <?php endif; ?>"
                                        data-jadwal-id="<?php echo e($item->id_jadwal); ?>"
                                        data-kode-mk="<?php echo e($item->kode_mk); ?>"
                                        data-nama-mk="<?php echo e($item->matakuliah->nama_mk); ?>"
                                        data-hari="<?php echo e(strtoupper($item->hari)); ?>"
                                        data-jam-mulai="<?php echo e(\Carbon\Carbon::createFromFormat('H:i:s', $item->jam_mulai)->format('H:i')); ?>"
                                        data-jam-selesai="<?php echo e(\Carbon\Carbon::createFromFormat('H:i:s', $item->jam_selesai)->format('H:i')); ?>">
                                            <div>
                                                <h5 class="mb-2 text-xs font-bold text-gray-900"><?php echo e($item->matakuliah->nama_mk); ?></h5>
                                                <p class="text-xs text-red-500 font-semibold"><?php echo e(strtoupper($item->matakuliah->jenis_mk)); ?> (<?php echo e($item->kode_mk); ?>)</p>
                                                <p class="text-xs text-gray-700">(SMT <?php echo e($item->matakuliah->semester); ?>) (<?php echo e($item->matakuliah->sks); ?> SKS)</p>
                                                <p class="text-xs text-gray-700">Kelas: <?php echo e($item->kelas); ?></p>
                                                <p class="text-xs text-gray-700">Ruangan: <?php echo e($item->ruangan); ?></p>
                                                <div class="flex justify-between">
                                                    <div class="flex items-center mt-2 text-xs text-gray-600">
                                                        <i class="fas fa-clock mr-1"></i>
                                                        <?php echo e($item->jam_mulai); ?>-<?php echo e($item->jam_selesai); ?>

                                                    </div>
                                                    <div class="flex items-center mt-2 text-xs text-gray-500"><?php echo e($item->slot_tersisa); ?>/<?php echo e($item->ruang->kapasitas); ?></div>
                                                </div>
                                                <!-- <button class="text-xs mt-2 bg-blue-500 text-white px-2 py-1 rounded" onclick="selectJadwal('<?php echo e($item->id_jadwal); ?>', '<?php echo e($item->kode_mk); ?>')">Pilih Jadwal</button> -->
                                                <!-- <button class="pilih-jadwal text-xs mt-2 bg-blue-500 text-white px-2 py-1 rounded" 
                                                    data-jadwal-id="<?php echo e($item->id_jadwal); ?>" 
                                                    data-kode-mk="<?php echo e($item->kode_mk); ?>">
                                                    Pilih Jadwal
                                                </button> -->
                                                
                                                <button class="pilih-jadwal text-xs mt-2 bg-blue-500 text-white px-2 py-1 rounded pilih-jadwal"
                                                        data-jadwal-id="<?php echo e($item->id_jadwal); ?>"
                                                        data-kode-mk="<?php echo e($item->kode_mk); ?>">
                                                    Pilih Jadwal
                                                </button>
                                               
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <a href="/mhs-irs-temp" class="mt-15 mb-15 focus:outline-none text-white bg-purple-800 hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                Lihat IRS Sementara
            </a>
        </div>
    </div>
</div>
<?php elseif(isset($statusIRSMHS) && $statusIRSMHS === 'Sudah Disetujui'): ?>
<div class="w-full bg-white p-6 text-center border border-gray-300">
    <h2 class="text-green-500 text-xl font-semibold">IRS Sudah Disetujui</h2>
    <p class="text-gray-500 mt-2">Jika ingin melakukan perubahan, hubungi dosen wali Anda.</p>
</div>

<?php elseif(isset($statusIRSMHS) && $statusIRSMHS === 'Pembatalan'): ?>
<div class="flex flex-col lg:flex-row gap-6 w-full">
    <main class="h-auto flex-grow">
        <div>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900 mb-4">Daftar Mata Kuliah yang Diambil</h2>
                    <p>Max. Beban SKS: <?php echo e($maxSKS); ?> SKS</p>
                    <p>IP. Semester (lalu): <?php echo e($ips); ?></p>
                    <p>Total SKS dipilih: <?php echo e($totalSKS); ?></p>
                    
                    <!-- Table with Responsive Scroll -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 mt-4">
                            <thead class="bg-gray-50 text-center">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode MK</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SMT</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ruang</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__currentLoopData = $irsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="row-<?php echo e($row->id); ?>">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900"><?php echo e($index + 1); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($row->kode_mk); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($row->mata_kuliah); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($row->semester); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($row->kelas); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($row->status); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($row->ruang); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($row->sks); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <button type="button" 
                                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-xs px-5 py-2.5 text-center mb-2"
                                                onclick="handleCancelJadwal('<?php echo e($row->jadwalId); ?>', '<?php echo e($row->kode_mk); ?>')">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>       
    </main>
</div>

<?php else: ?>
    <div class="w-full bg-white p-6 text-center border border-gray-300">
        <h2 class="text-red-500 text-xl font-semibold">Tidak Dapat Membuat IRS</h2>
        <p class="text-gray-500 mt-2">Anda bukan mahasiswa aktif. Segera lakukan registrasi untuk membuat IRS</p>
    </div>
<?php endif; ?>
</div>

<!-- Modal Konfirmasi (Optional, jika masih diperlukan) -->
<!-- Jika Anda memilih untuk menggunakan SweetAlert2, Anda dapat menghapus atau menonaktifkan modal ini -->
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeModal()">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Apakah Anda yakin ingin menambahkan <strong id="modal-mk-name"></strong> ke rencana studi Anda?
                </h3>
                <div class="flex justify-center gap-3">
                    <form id="add-jadwal-form" method="POST" action="<?php echo e(route('isi-irs')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="jadwal_id" id="jadwal_id">
                        
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Ya
                        </button>
                    </form>
                    <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" onclick="closeModal()">
                        Tidak, Batalkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sertakan SweetAlert2 dan jQuery -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Script untuk Mengelola Pilihan Mata Kuliah dan Notifikasi -->
<script>
    $(document).ready(function() {
        // Setup CSRF Token untuk semua permintaan AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var timeslots = <?php echo json_encode($timeslots, 15, 512) ?>;
        var days = <?php echo json_encode($days, 15, 512) ?>;
        var selectedMataKuliah = <?php echo json_encode($selectedMataKuliah, 15, 512) ?>;
        var conflictingJadwal = <?php echo json_encode($conflictingJadwal, 15, 512) ?>;
        var selectedJadwal = <?php echo json_encode($selectedJadwal, 15, 512) ?>;
        var totalSks = <?php echo e($totalSKS); ?>;
      
        var maxSks = <?php echo e($maxSKS); ?>;
        var jadwal = <?php echo json_encode($jadwal, 15, 512) ?>;
        
        fetchTotalSks();
        markConflictingSchedules();
        updateProgressBar();

        // Fungsi untuk mengonversi waktu 'HH:MM' ke total menit
        function convertTimeToMinutes(time) {
            var parts = time.split(':');
            return parseInt(parts[0], 10) * 60 + parseInt(parts[1], 10);
        }

        // Fungsi untuk memeriksa apakah dua rentang waktu tumpang tindih
        function isOverlapping(start1, end1, start2, end2) {
            return (start1 < end2) && (start2 < end1);
        }

        // Fungsi untuk menemukan timeslot yang cocok
        function findMatchedSlot(jamMulaiFormatted, timeslots) {
            const [jam, menit] = jamMulaiFormatted.split(':').map(Number);
            const totalMinutes = jam * 60 + menit;

            let matchedSlot = null;
            timeslots.forEach(function(slot) {
                const [sJam, sMenit] = slot.split(':').map(Number);
                const slotMinutes = sJam * 60 + sMenit;
                if (slotMinutes <= totalMinutes) {
                    matchedSlot = slot;
                }
            });
            return matchedSlot;
        }
        $('#irs-form').on('submit', function(e) {
            if (totalSks > maxSks) {
                e.preventDefault(); // Mencegah form submission
                Swal.fire({
                    icon: 'error',
                    title: 'SKS Terlampaui',
                    text: 'Total SKS melebihi batas maksimal. Silakan kurangi pilihan mata kuliah Anda.',
                    confirmButtonText: 'OK'
                });
            }
        });

         // Fungsi untuk mengupdate progress bar
         function updateProgressBar() {
            console.log(`Total SKS: ${totalSks}`);
            console.log(`Max SKS: ${maxSks}`);

            // Hitung persentase SKS
            var persen = (totalSks / maxSks) * 100;
            persen = persen > 100 ? 100 : persen; // Batasi maksimal 100%
            console.log(`Persentase SKS: ${persen}%`);

            // Update lebar progress bar
            $('#progress-sks').css('width', persen + '%');

            // Update teks SKS
            $('#sks-text').text(totalSks + ' SKS / ' + maxSks + ' SKS');

            // Ubah warna progress bar berdasarkan total SKS dan tampilkan/ sembunyikan peringatan
            if (totalSks > maxSks) {
                $('#progress-sks').removeClass('bg-yellow-300 bg-green-500').addClass('bg-red-500');
                // Tampilkan peringatan
                $('#sks-warning').removeClass('hidden').addClass('block');
                // Nonaktifkan tombol Ajukan
                $('.ajukan').addClass('opacity-50 cursor-not-allowed').attr('disabled', true);
                // Nonaktifkan checkbox yang belum dicentang
                $('.sks-checkbox:not(:checked)').attr('disabled', true);
            } else {
                if (totalSks === maxSks) {
                    $('#progress-sks').removeClass('bg-yellow-300 bg-red-500').addClass('bg-green-500');
                } else {
                    $('#progress-sks').removeClass('bg-red-500 bg-green-500').addClass('bg-yellow-300');
                }
                // Sembunyikan peringatan
                $('#sks-warning').removeClass('block').addClass('hidden');
                // Aktifkan kembali tombol Ajukan
                $('.ajukan').removeClass('opacity-50 cursor-not-allowed').attr('disabled', false);
                // Aktifkan checkbox yang belum dicentang
                $('.sks-checkbox').attr('disabled', false);
            }
        }
        
        function markConflictingSchedules() {
            // Loop melalui setiap jadwal yang dipilih
            $('.jadwal-item[data-status="selected"]').each(function() {
                var jadwalId = $(this).data('jadwal-id');
                var hari = $(this).data('hari');
                var jamMulai = $(this).data('jam-mulai');

                // Mencari jadwal lain yang bentrok
                $('.jadwal-item').not(`[data-jadwal-id="${jadwalId}"]`).each(function() {
                    var otherHari = $(this).data('hari');
                    var otherJamMulai = $(this).data('jam-mulai');

                    if (hari === otherHari && jamMulai === otherJamMulai) {
                        $(this).css('border-left-color', 'red');
                        $(this).addClass('conflict'); // Menambahkan kelas conflict untuk memberi identifikasi visual
                        
                    }
                });
            });
            
        }


        // Fungsi untuk menambahkan jadwal ke tabel
        function addJadwalToTable(jadwal) {
            console.log('Menambahkan jadwal:', jadwal);
            

            // Flatten data jika perlu
            if (jadwal.matakuliah) {
                jadwal.nama_mk = jadwal.matakuliah.nama_mk;
                jadwal.sks = jadwal.matakuliah.sks;
                jadwal.semester = jadwal.matakuliah.semester;
                jadwal.jenis_mk = jadwal.matakuliah.jenis_mk;
            }

            if (jadwal.ruang) {
                jadwal.kapasitas = jadwal.ruang.kapasitas;
                jadwal.ruangan = `${jadwal.ruang.gedung} ${jadwal.ruang.nama}`;
            }

            const requiredProps = [
                'id_jadwal', 'kode_mk', 'nama_mk', 'sks', 'semester', 
                'jenis_mk', 'hari', 'jam_mulai', 'jam_selesai', 
                'kelas', 'ruangan', 'slot_tersisa', 'kapasitas'
            ];

            const missingProps = requiredProps.filter(prop => !jadwal.hasOwnProperty(prop) || jadwal[prop] === null);
            if (missingProps.length > 0) {
                console.error('Jadwal memiliki properti yang hilang:', missingProps, 'Jadwal:', jadwal);
                return;
            }

            if (!jadwal.jam_mulai || !jadwal.hari) {
                console.error('Jadwal tidak memiliki jam_mulai atau hari:', jadwal);
                return;
            }

            // Format jam_mulai menjadi 'HH:MM'
            let jamMulaiFormatted = jadwal.jam_mulai.substring(0, 5);
            if (jamMulaiFormatted.length === 4) {
                jamMulaiFormatted = '0' + jamMulaiFormatted;
            }

            console.log('Jam Mulai Formatted:', jamMulaiFormatted);

            // Temukan timeslot yang cocok
            const matchedSlot = findMatchedSlot(jamMulaiFormatted, timeslots);
            console.log('Matched Slot:', matchedSlot);

            if (!matchedSlot) {
                console.error('Tidak ada timeslot yang cocok untuk jam_mulai:', jamMulaiFormatted);
                return;
            }

            // Temukan baris dalam tabel yang sesuai dengan timeslot
            const row = $('#jadwalBody tr').filter(function() {
                const tableTime = $(this).find('td:first').text().trim();
                return tableTime === matchedSlot;
            });

            console.log('Row ditemukan:', row.length > 0);

            if (row.length > 0) {
                const dayMap = {
                    'SENIN': 1,
                    'SELASA': 2,
                    'RABU': 3,
                    'KAMIS': 4,
                    'JUMAT': 5
                };
                const dayIndex = dayMap[jadwal.hari.toUpperCase()];
                console.log('Day Index:', dayIndex);

                if (dayIndex === undefined) {
                    console.error('Hari tidak valid:', jadwal.hari);
                    return;
                }

                const cell = row.find('td').eq(dayIndex);
                console.log('Cell ditemukan pada index:', dayIndex);

                if (cell.find(`[data-jadwal-id="${jadwal.id_jadwal}"]`).length > 0) {
                    console.log('Jadwal sudah ada di dalam cell.');
                    return;
                }

                console.log('Jenis MK sebelum toUpperCase:', jadwal.jenis_mk);

                const jamSelesaiFormatted = jadwal.jam_selesai.substring(0,5);
                const jenisMk = typeof jadwal.jenis_mk === 'string' ? jadwal.jenis_mk.toUpperCase() : 'UNKNOWN';

                // Tentukan apakah jadwal sudah dipilih
                var isSelected = selectedJadwal.includes(jadwal.id_jadwal);
                var jadwalClass = isSelected ? 'border-green-500 bg-green-400' : 'border-yellow-300 bg-white';
                var isConflict = conflictingJadwal.includes(jadwal.id_jadwal);
                var isUnselected = !isSelected && selectedMataKuliah.includes(jadwal.kode_mk);
                
                
                if (isSelected) {
                    jadwalClass = 'border-green-500 bg-green-400';  // Jadwal dipilih
                } 
                // Cek apakah jadwal bentrok
                else if (isConflict) {
                    jadwalClass = 'border-red-500 bg-red-100 cursor-not-allowed';  // Jadwal bentrok
                } 
                // Cek apakah jadwal unselected
                else if (isUnselected) {
                    jadwalClass = 'border-gray-500 bg-gray-200 cursor-not-allowed';  // Jadwal tidak dipilih
                }
                
                // Debugging: Periksa apakah kelas diterapkan dengan benar
                console.log(jadwalClass);
                // Tentukan tombol berdasarkan status
                var buttonHtml = '';
                if (isSelected) {
                    buttonHtml = `
                        <button class="batalkan-jadwal text-xs mt-2 bg-red-500 text-white px-2 py-1 rounded"
                                data-jadwal-id="${jadwal.id_jadwal}"
                                data-kode-mk="${jadwal.kode_mk}">
                            Batalkan Jadwal
                        </button>
                    `;
                } else if (isConflict) {
                    buttonHtml = `
                        <button class="text-xs mt-2 bg-gray-500 text-white px-2 py-1 rounded cursor-not-allowed" disabled>
                            Bentrok
                        </button>
                    `;
                } else if (isUnselected) {
                    buttonHtml = `
                        <button class="text-xs mt-2 bg-gray-500 text-white px-2 py-1 rounded cursor-not-allowed" disabled>
                            Tidak Tersedia
                        </button>
                    `;
                } else {
                    buttonHtml = `
                        <button class="pilih-jadwal text-xs mt-2 bg-blue-500 text-white px-2 py-1 rounded" 
                                data-jadwal-id="${jadwal.id_jadwal}" 
                                data-kode-mk="${jadwal.kode_mk}">
                            Pilih Jadwal
                        </button>
                    `;
                }
                

                const jadwalDiv = $(`
                    <div class="w-full p-2 ${jadwalClass} border-l-4 rounded-lg shadow-lg mb-2 jadwal-item" 
                        data-jadwal-id="${jadwal.id_jadwal}" 
                        data-kode-mk="${jadwal.kode_mk}" 
                        data-nama-mk="${jadwal.nama_mk}" 
                        data-hari="${jadwal.hari}" 
                        data-jam-mulai="${jadwal.jam_mulai}" 
                        data-jam-selesai="${jadwal.jam_selesai}">
                        <div>
                            <h5 class="mb-2 text-xs font-bold text-gray-900">${jadwal.nama_mk}</h5>
                            <p class="text-xs text-red-500 font-semibold">${jenisMk} (${jadwal.kode_mk})</p>
                            <p class="text-xs text-gray-700">(SMT ${jadwal.semester}) (${jadwal.sks} SKS)</p>
                            <p class="text-xs text-gray-700">Kelas: ${jadwal.kelas}</p>
                            <p class="text-xs text-gray-700">Ruangan: ${jadwal.ruangan}</p>
                            <div class="flex justify-between">
                                <div class="flex items-center mt-2 text-xs text-gray-600">
                                    <i class="fas fa-clock mr-1"></i>
                                    ${jamMulaiFormatted}-${jamSelesaiFormatted}
                                </div>
                                <div class="flex items-center mt-2 text-xs text-gray-500">${jadwal.slot_tersisa}/${jadwal.kapasitas}</div>
                            </div>
                            ${buttonHtml}
                        </div>
                    </div>
                `);

                cell.append(jadwalDiv);
                console.log('Jadwal berhasil ditambahkan ke dalam cell.');
                // Jika jadwal ini dipilih, tambahkan ke selectedJadwal dan perbarui progress bar
                if (isSelected) {
                    selectedJadwal.push(jadwal.id_jadwal);
                    fetchTotalSks();
                    // updateProgressBar();
                }
            } else {
                console.error('Row untuk timeslot tidak ditemukan:', matchedSlot);
            }
        }

        // Fungsi untuk menghapus jadwal dari tabel berdasarkan kodeMk
        function removeJadwalFromTable(kodeMk) {
            console.log('Menghapus jadwal untuk kodeMk:', kodeMk);
            // Cari semua jadwal yang memiliki kodeMk tersebut dan hapus dari tabel
            $('#jadwalBody').find(`[data-kode-mk="${kodeMk}"]`).each(function() {
                var jadwalId = $(this).data('jadwal-id');
                // Hapus dari selectedJadwal
                selectedJadwal = selectedJadwal.filter(id => id !== jadwalId);
                // Hapus elemen jadwal dari DOM
                $(this).remove();
            });
            fetchTotalSks();
            // updateProgressBar();
            
            
            // Tandai ulang konflik
            markConflictingSchedules();
        }

        // Fungsi untuk mengambil total SKS dari backend
        function fetchTotalSks() {
            $.ajax({
                url: '/get-total-sks',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.total_sks !== undefined) {
                        totalSks = data.total_sks;
                        maxSks = data.max_sks; 
                       // updateProgressBar();
                    } else {
                        console.error('Data total_sks tidak ditemukan dalam respon.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error saat mengambil total SKS:', error);
                }
            });
        }


        // Fungsi untuk menangani pemilihan jadwal
        function handleSelectJadwal(jadwalId, kodeMk) {
            // Cari jadwal berdasarkan jadwalId
            var jadwalItem = jadwal.find(j => j.id_jadwal === jadwalId);
            if (!jadwalItem) {
                Swal.fire('Gagal', 'Jadwal tidak ditemukan.', 'error');
                return;
            }
            // Tampilkan konfirmasi sebelum memilih jadwal
            Swal.fire({
                title: 'Konfirmasi Pilih Jadwal',
                text: "Apakah Anda yakin ingin memilih jadwal ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, pilih',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX ke server untuk memvalidasi dan menyimpan jadwal
                    $.ajax({
                        url: '/isi-irs',
                        method: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({ jadwal_id: jadwalId }),
                        success: function(response) {
                            if (response.status === 'success') {
                                const sksJadwal = response.sks_jadwal;
                                const newTotalSks = totalSks + sksJadwal;

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    // Tambahkan jadwal ke daftar terpilih
                                    selectedJadwal.push(jadwalId);

                                    // Update total SKS dan progress bar
                                    totalSks += sksJadwal;
                                    // updateProgressBar();

                                    // Ubah tampilan tombol
                                    const button = $(`[data-jadwal-id="${jadwalId}"]`).find('.pilih-jadwal');
                                    button.removeClass('bg-blue-500 pilih-jadwal')
                                        .addClass('bg-red-500 batalkan-jadwal')
                                        .text('Batalkan Jadwal')
                                        .removeAttr('disabled');

                                    // Tandai ulang konflik
                                    markConflictingSchedules();

                                    // Reload UI jika diperlukan
                                    location.reload();
                                });
                            } else {
                                // Tangani pesan error sesuai jenis error
                                if (response.error_type === 'sks_exceeded') {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'SKS Terlampaui',
                                        text: 'Anda tidak dapat memilih jadwal ini karena total SKS akan melebihi batas maksimal.',
                                        confirmButtonText: 'OK'
                                    });
                                } else if (response.error_type === 'conflict') {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Jadwal Bentrok',
                                        text: 'Jadwal ini bentrok dengan jadwal lain yang sudah dipilih.',
                                        confirmButtonText: 'OK'
                                    });
                                } else {
                                    Swal.fire('Gagal', response.message, 'error');
                                }
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhr.responseJSON.message || 'Terjadi kesalahan.',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        }
        // Fungsi untuk menangani pembatalan jadwal
    function handleCancelJadwal(jadwalId, kodeMk) {
        // Tampilkan konfirmasi sebelum membatalkan jadwal
        Swal.fire({
            title: 'Konfirmasi Batalkan Jadwal',
            text: "Apakah Anda yakin ingin membatalkan jadwal ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, batalkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim permintaan AJAX untuk membatalkan jadwal
                $.ajax({
                    url: `/irs/cancel/${jadwalId}`,
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ jadwal_id: jadwalId }),
                    success: function(data) {
                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: data.message,
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Ubah UI tanpa reload
                                var button = $(`[data-jadwal-id="${jadwalId}"]`).closest('.jadwal-item').find('button.batalkan-jadwal');
                                button.removeClass('bg-red-500 batalkan-jadwal').addClass('bg-blue-500 pilih-jadwal').text('Pilih Jadwal');

                                // Hapus jadwalId dari selectedJadwal
                                selectedJadwal = selectedJadwal.filter(id => id !== jadwalId);

                                // Kurangi SKS dari total SKS
                                var sks = parseInt($(`[data-jadwal-id="${jadwalId}"]`).closest('.jadwal-item').find('.text-gray-700:contains("SKS")').text().match(/(\d+) SKS/)[1]);
                                totalSks -= sks;
                                location.reload();

                                // Perbarui total SKS di sidebar jika ada
                                // $('#total-sks').text(totalSks); // Sesuaikan dengan ID elemen yang sesuai
                                fetchTotalSks();
                                // updateProgressBar();
                                // Tandai ulang konflik
                                markConflictingSchedules();
                            });
                        } else {
                            Swal.fire('Gagal', data.message, 'error');
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: error.responseJSON.message || 'Terjadi kesalahan saat membatalkan jadwal.',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    }

        // Event handler untuk tombol "Pilih Jadwal" menggunakan event delegation
        $('#jadwalBody').on('click', '.pilih-jadwal', function() {
            var jadwalId = $(this).data('jadwal-id');
            var kodeMk = $(this).data('kode-mk');
            var namaMk = $(this).data('nama-mk');

            handleSelectJadwal(jadwalId, kodeMk);
            
        });
        $('#jadwalBody').on('click', '.batalkan-jadwal', function() {
        var jadwalId = $(this).data('jadwal-id');
        var kodeMk = $(this).data('kode-mk');

        handleCancelJadwal(jadwalId, kodeMk);
    });
        // Menangani checkbox yang sudah tercentang saat halaman dimuat
        $('.course-checkbox:checked').each(function() {
            // auto checked yg sesuai semester
            var checkbox = $(this);
            var kodeMk = checkbox.val();
            var isChecked = checkbox.is(':checked');
            var nim = '<?php echo e($mhs->nim); ?>'; // Pastikan NIM tersedia di sini

            // Ambil jadwal mata kuliah melalui AJAX
            if (isChecked) {
                $.ajax({
                    url: '/get-jadwal/' + kodeMk,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: data.error,
                                confirmButtonText: 'OK'
                            });
                            checkbox.prop('checked', false);
                            return;
                        }

                        // Tambahkan setiap jadwal ke tabel
                        data.forEach(function(jadwal) {
                            addJadwalToTable(jadwal);
                        });

                        markConflictingSchedules();
                        fetchTotalSks();
                        // updateProgressBar();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat mengambil jadwal.',
                            confirmButtonText: 'OK'
                        });
                        checkbox.prop('checked', false);
                    }
                    
                });
            }else {
                // Hapus jadwal mata kuliah dari tabel
                removeJadwalFromTable(kodeMk);

                // Hapus mata kuliah yang dipilih dari server
                $.ajax({
                    url: '/update-mk',
                    method: 'POST',
                    data: {
                        mata_kuliah: [kodeMk] // Hanya hapus mata kuliah yang tidak dipilih
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            console.log('Mata kuliah dihapus dari IRS.');
                             // Hapus semua jadwal terkait kodeMk dari selectedJadwals
                                $('div[data-kode-mk="' + kodeMk + '"]').each(function() {
                                    var jadwalId = $(this).data('jadwal-id');
                                    selectedJadwal = selectedJadwal.filter(id => id !== jadwalId);
                                });
                                markConflictingSchedules();
                                fetchTotalSks();
                                // updateProgressBar();
                        } else {
                            console.log('Tidak ada perubahan pada IRS.');
                        }
                    },
                    
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }
            
        });

        // Ketika checkbox berubah status (checked/unchecked)
        $('.course-checkbox').change(function () {
            var checkbox = $(this);
            var kodeMk = checkbox.val();
            var isChecked = checkbox.is(':checked');
            var nim = '<?php echo e($mhs->nim); ?>'; // Pastikan NIM tersedia di sini

            if (isChecked) {
                // Ambil jadwal mata kuliah melalui AJAX
                $.ajax({
                    url: '/get-jadwal/' + kodeMk,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: data.error,
                                confirmButtonText: 'OK'
                            });
                            checkbox.prop('checked', false);
                            return;
                        }

                        // Tambahkan setiap jadwal ke tabel
                        data.forEach(function(jadwal) {
                            addJadwalToTable(jadwal);
                            selectedJadwal.push(jadwal.id_jadwal);
                        });
                        markConflictingSchedules();
                        fetchTotalSks();
                        // updateProgressBar();

                        // Tampilkan SweetAlert sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Jadwal mata kuliah berhasil ditambahkan ke timetable.',
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat mengambil jadwal.',
                            confirmButtonText: 'OK'
                        });
                        checkbox.prop('checked', false);
                    }
                });
            } else {
                // Hapus jadwal mata kuliah dari tabel
                removeJadwalFromTable(kodeMk);

                // Hapus mata kuliah yang dipilih dari server
                $.ajax({
                    url: '/update-mk',
                    method: 'POST',
                    data: {
                        mata_kuliah: [kodeMk] // Hanya hapus mata kuliah yang tidak dipilih
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            console.log('Mata kuliah dihapus dari IRS.');
                            fetchTotalSks();
                            // updateProgressBar();
                        } else {
                            console.log('Tidak ada perubahan pada IRS.');
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }
        });

        // Filter dropdown berdasarkan pencarian
        $('#input-group-search').on('input', function() {
            var query = $(this).val().toLowerCase();
            $('#dropdownSearchList li').each(function() {
                var text = $(this).find('label').text().toLowerCase();
                $(this).toggle(text.includes(query)); // Tampilkan atau sembunyikan item
            });
        });

       
        function roundToNearestHour(time) {
            // time in 'HH:MM'
            const [hh, mm] = time.split(':').map(Number);
            return (mm >= 30) 
                ? (hh + 1).toString().padStart(2, '0') + ':00' 
                : hh.toString().padStart(2, '0') + ':00';
        }

        // Fungsi untuk enable conflicting courses
        function enableConflictingCourses(kodeMk) {
            // Kembalikan semua checkbox yang tidak dipilih ke enabled dan label warna hitam
            $('.course-checkbox').not(':checked').each(function() {
                $(this).prop('disabled', false);
                $(this).next('label').removeClass('text-red-500');
            });
        }

        // Filter dropdown berdasarkan pencarian
        $('#input-group-search').on('input', function() {
            var query = $(this).val().toLowerCase();
            $('#dropdownSearchList li').each(function() {
                var text = $(this).find('label').text().toLowerCase();
                $(this).toggle(text.includes(query)); // Tampilkan atau sembunyikan item
            });
        });

        // Fungsi untuk membulatkan waktu ke jam terdekat
        function roundToNearestHour(time) {
            // time in 'HH:MM'
            const [hh, mm] = time.split(':').map(Number);
            return (mm >= 30) 
                ? (hh + 1).toString().padStart(2, '0') + ':00' 
                : hh.toString().padStart(2, '0') + ':00';
        }
    });

    // Fungsi untuk menutup modal jika masih diperlukan
    function closeModal() {
        const modal = document.getElementById('popup-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // SweetAlert2 untuk flash messages
    <?php if(session('status')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?php echo e(session('status')); ?>',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>

    <?php if(session('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?php echo e(session('error')); ?>',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
    function handleCancelJadwal(jadwalId, kodeMk) {
    // Tampilkan konfirmasi sebelum membatalkan jadwal
    Swal.fire({
        title: 'Konfirmasi Batalkan Jadwal',
        text: "Apakah Anda yakin ingin membatalkan jadwal ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, batalkan',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Kirim permintaan AJAX untuk membatalkan jadwal
            $.ajax({
                url: `/irs/cancel/${jadwalId}`,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Sertakan CSRF token
                },
                contentType: 'application/json',
                data: JSON.stringify({ jadwal_id: jadwalId }),
                success: function(data) {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: data.message,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Muat ulang halaman setelah pembatalan berhasil
                            location.reload();
                        });
                    } else {
                        Swal.fire('Gagal', data.message, 'error');
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: error.responseJSON?.message || 'Terjadi kesalahan saat membatalkan jadwal.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });
}

</script>
<script>
   function handleCancelJadwal(jadwalId, kodeMk) {
    // Tampilkan konfirmasi sebelum membatalkan jadwal
    Swal.fire({
        title: 'Konfirmasi Batalkan Jadwal',
        text: "Apakah Anda yakin ingin membatalkan jadwal ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, batalkan',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Kirim permintaan AJAX untuk membatalkan jadwal
            $.ajax({
                url: `/irs/cancel/${jadwalId}`,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Sertakan CSRF token
                },
                contentType: 'application/json',
                data: JSON.stringify({ jadwal_id: jadwalId }),
                success: function(data) {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: data.message,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Muat ulang halaman setelah pembatalan berhasil
                            location.reload();
                        });
                    } else {
                        Swal.fire('Gagal', data.message, 'error');
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: error.responseJSON?.message || 'Terjadi kesalahan saat membatalkan jadwal.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });
}
</script>

<?php /**PATH C:\PPL\SiGMA\resources\views/content/mhs/buatIrs.blade.php ENDPATH**/ ?>