<!-- BUAT IRS -->
 
<div class="z-10 tab-content flex flex-col lg:flex-row gap-6" id="buat-irs">
@if(isset($status) && $status === 'Aktif')
    <!-- Sidebar Informasi Mahasiswa -->
    <div class="bg-white p-6 w-full lg:w-1/3 border border-gray-300">
        
        <!-- Bagian Nama dan NIM -->
        <div class="border border-gray-300 p-4 mb-6">
            <div class="mb-4">
                <h3 class="font-semibold mb-2 text-xs">Nama: <span class="font-normal">{{ $mhs->nama_mhs }}</span></h3>
                <h3 class="font-semibold mb-2 text-xs">NIM: <span class="font-normal">{{ $mhs->nim }}</span></h3>
                <h3 class="font-semibold mb-2 text-xs">Semester: <span class="font-normal">{{ $mhs->semester_aktif->where('is_active', true)->first()->semester ?? 'Tidak Diketahui' }}</span></h3>
            </div>
            <!-- Garis pemisah -->
            <hr class="border-t-2 border-gray-300 mb-4">
            <!-- Bagian Informasi Akademik -->
            <div class>
                <p class="text-gray-600 mb-1 text-xs">Th. Ajaran: <span class="font-normal">{{ $mhs->semester_aktif->where('is_active', true)->first()->tahun_akademik ?? 'Tidak Diketahui' }}</span></p>
                <p class="text-gray-600 mb-1 text-xs">IPK (kumulatif): <span class="font-normal">{{ $ipk }}</span></p>
                <p class="text-gray-600 mb-1 text-xs">IPS (semester lalu): <span class="font-normal">{{ $ips }}</span></p>
                <p class="text-gray-600 mb-1 text-xs">Max. Beban SKS: <span class="font-normal">{{ $maxSKS }}</span></p>
            </div>
        </div>

        <div class="daftar-mk">
            <!-- Progress Pilih SKS -->
            <div class="flex items-center mb-4">
                <div class="w-full h-5  bg-gray-200 rounded dark:bg-gray-700 mr-2">
                    <div class="h-5 bg-yellow-300 rounded" style="width: 70%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">18 SKS</span>
            </div>
            
           
            <!-- Dropdown menu -->
            <form id="mataKuliahForm method="POST" action="{{ route('update-mk') }}">
                @csrf
                <label for="input-group-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-auto">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="input-group-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mata Kuliah">
                    </div>
                <label for="input-group-search" class="sr-only">Search</label>
                <ul id="dropdownSearchList" class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                    @foreach ($mataKuliah as $mk)
                        <li>
                            <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input type="checkbox" name="mata_kuliah[]" id="checkbox-{{ $mk->kode_mk }}" 
                                    value="{{ $mk->kode_mk }}" 
                                    class="course-checkbox cursor-pointer" 
                                 
                                <label for="checkbox-{{ $mk->kode_mk }}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300 cursor-pointer">
                                    {{ $mk->nama_mk }} - {{ $mk->sks }}  SKS (Semester {{ $mk->semester }}) - {{ strtoupper($mk->jenis_mk) }} - ({{ $mk->kode_mk }})
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <!-- <button type="submit" class="m-2 focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Pilih</button> -->
            </form>
        </div>
        
        
    </div>
    
    <!-- Jadwal Mata Kuliah -->
    <div class="w-full lg:w-2/3 scroll-smooth">
        <div class="overflow-x-auto" >
        <table id="jadwalTable" class="w-full border-collapse border border-gray-300 bg-white">
            <thead class="bg-white z-10 shadow-sm">
                <tr>
                    <th class="border border-gray-300 p-2">WAKTU<br><span class="italic text-sm font-medium">TIME</span></th>
                    @foreach(['SENIN' => 'MONDAY', 'SELASA' => 'TUESDAY', 'RABU' => 'WEDNESDAY', 'KAMIS' => 'THURSDAY', 'JUMAT' => 'FRIDAY'] as $indonesia => $english)
                        <th class="border border-gray-300 p-2">{{ $indonesia }}<br><span class="italic text-sm font-medium">{{ $english }}</span></th>
                    @endforeach
                </tr>
            </thead>

            <tbody id="jadwalBody">
                @php
                    $timeslots = ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'];
                    $days = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT'];
                @endphp

                @foreach ($timeslots as $slot)
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ $slot }}</td>
                    @foreach ($days as $day)
                        <td class="border border-gray-300 p-2">
                            <!-- Jadwal akan ditambahkan secara dinamis melalui JavaScript -->
                            @if(in_array($day . '-' . $slot, collect($jadwal)->map(function($j) { return strtoupper($j->hari) . '-' . $j->jam_mulai; })->toArray()))
                                    <!-- Optional: Tampilkan jadwal yang sudah dipilih dari IRS -->
                            @endif
                            <!-- @php
                                $currentJadwal = $jadwal->filter(function ($j) use ($day, $slot) {
                                    return strtoupper($j->hari) === $day && $j->jam_mulai === $slot;
                                });
                            @endphp

                            @if ($currentJadwal->isNotEmpty())

                                @foreach ($currentJadwal as $item)
                                    @php
                                        $isSelected = in_array($item->id_jadwal, $selectedJadwal);
                                        $isConflicting = in_array($item->id_jadwal, $conflictingJadwal);
                                    @endphp
                                <div 
                                    class="w-40 h-auto p-2 bg-white border-l-4 rounded-lg shadow-lg mb-2 
                                        cursor-pointer jadwal-item
                                        {{ $isSelected ? 'border-green-500 bg-green-300' : ($isConflicting ? 'border-red-500 bg-red-700 opacity-50 cursor-not-allowed' : 'border-yellow-300 bg-white') }} 
                                                           {{ $isConflicting ? 'pointer-events-none' : 'cursor-pointer' }}"
                                                    data-jadwal-id="{{ $item->id_jadwal }}" 
                                                    data-nama-mk="{{ $item->nama_mk }}"
                                                    @if($isConflicting) 
                                                        onclick="return false;" 
                                                    @endif
                                                >
                               
                                        <div>
                                            <h5 class="mb-2 text-xs font-bold text-gray-900">{{ $item->nama_mk }}</h5>
                                            <p class="text-xs text-red-500 font-semibold">{{ strtoupper($item->jenis_mk) }} ({{ $item->kode_mk }})</p>
                                            <p class="text-xs text-gray-700">(SMT {{ $item->semester }}) ({{ $item->sks }} SKS)</p>
                                            <p class="text-xs text-gray-700">Kelas: {{ $item->kelas }}</p>
                                            <p class="text-xs text-gray-700">Ruangan: {{ $item->ruangan }}</p>
                                            <div class="flex justify-between">
                                                <div class="flex items-center mt-2 text-xs text-gray-600">
                                                    <i class="fas fa-clock mr-1"></i>
                                                    {{ $item->jam_mulai }}-{{ $item->jam_selesai }}
                                                </div>
                                                <div class="flex items-center mt-2 text-xs text-gray-500"> {{ $item->slot_tersisa }}/{{ $item->kapasitas }}</div>
                                            </div>
                                        </div> 
                                    </div>
                                @endforeach
                            @endif -->
                        </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
            <!-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-2">Simpan</button> -->
            <a href="/mhs-irs-temp" class="focus:outline-none text-white bg-purple-800 hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                Lihat
            </a>
            <!-- <button type="button" class="focus:outline-none text-white bg-purple-800 hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Lihat</button>
            @include('content.mhs.irsSementara') -->
        </div>
    </div>
@else
    <div class="w-full bg-white p-6 text-center border border-gray-300">
        <h2 class="text-red-500 text-xl font-semibold">Tidak Dapat Membuat IRS</h2>
        <p class="text-gray-500 mt-2">Anda bukan mahasiswa aktif. Segera lakukan registrasi untuk membuat IRS</p>
    </div>
@endif
</div>
<!-- Modal Konfirmasi -->
<!-- Modal Konfirmasi (diletakkan di luar loop) -->
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeModal()">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                    <form id="add-jadwal-form" method="POST" action="{{ route('isi.irs') }}">
                        @csrf
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Script untuk Mengelola Pilihan Mata Kuliah dan Notifikasi -->
<script>
    $(document).ready(function() {
        // Ketika checkbox berubah status (checked/unchecked)
        $('.course-checkbox').change(function () {
            var selectedCourses = [];
            // Ambil NIM mahasiswa dari data attribute atau elemen lain yang sesuai
            var nim = '{{ $mhs->nim }}'; // Pastikan NIM tersedia di sini

            // Ambil semua kode mata kuliah yang dipilih (checked)
            $('.course-checkbox:checked').each(function () {
                selectedCourses.push($(this).val());
            });
        
            // Update tampilan mata kuliah yang dipilih
            var html = '';
            if (selectedCourses.length === 0) {
                html = '<p class="text-xs text-gray-500">Tidak ada mata kuliah yang dipilih.</p>';
            } else {
                // Loop untuk menampilkan mata kuliah yang dipilih
                selectedCourses.forEach(function(kodeMk) {
                    var mataKuliah = $('#checkbox-' + kodeMk).parent().find('label').text();
                    html += '<div id="selected-' + kodeMk + '" class="p-4 bg-gray-50 rounded-lg shadow mb-3">' + // Tambahkan '>'
                                '<div class="flex items-center gap-2">' +
                                    '<i class="fas fa-check text-green-500"></i>' +
                                        '<div>' +
                                            '<h4 class="font-semibold text-sm">' + mataKuliah + '</h4>' +
                                        '</div>' +
                                    '</div>' +
                            '</div>';
                });
            }

            // Update konten #displayedCourses dengan HTML yang baru
            $('#displayedCourses').html(html);
            // Kirim data ke server untuk disimpan

            console.log({
                nim: nim,
                mk: selectedCourses
            });

            $.ajax({
                url: '/simpan-mk',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    nim: nim,
                    mk: selectedCourses
                },
                success: function(response) {
                    console.log('Mata kuliah berhasil disimpan');
                    // Tampilkan SweetAlert2 sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Mata kuliah berhasil disimpan.',
                        confirmButtonText: 'OK'
                    });
                },
                error: function(error) {
                    console.error('Error:', error);
                    // Tampilkan SweetAlert2 error
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menyimpan mata kuliah.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        // Filter dropdown berdasarkan pencarian
        $('#input-group-search').on('input', function() {
            var query = $(this).val().toLowerCase();
            $('#dropdownSearchList li').each(function() {
                var text = $(this).find('label').text().toLowerCase();
                $(this).toggle(text.includes(query)); // Tampilkan atau sembunyikan item
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const jadwalItems = document.querySelectorAll('.jadwal-item');
        const modal = document.getElementById('popup-modal');
        const modalMkName = document.getElementById('modal-mk-name');
        const jadwalIdInput = document.getElementById('jadwal_id');

        jadwalItems.forEach(function(item) {
            item.addEventListener('click', function() {
                // Cek apakah jadwal bentrok
                if (this.classList.contains('pointer-events-none')) {
                    return;
                }
                const jadwalId = this.getAttribute('data-jadwal-id');
                const namaMk = this.getAttribute('data-nama-mk');

                // Set nilai di modal
                modalMkName.textContent = namaMk;
                jadwalIdInput.value = jadwalId;

                // Tampilkan modal
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });
    });

    function closeModal() {
        const modal = document.getElementById('popup-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // SweetAlert2 untuk flash messages
    @if(session('status'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('status') }}',
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
            confirmButtonText: 'OK'
        });
    @endif
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.course-checkbox');
        const jadwalBody = document.getElementById('jadwalBody');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const kodeMk = this.value;
                const isChecked = this.checked;

                if (isChecked) {
                    // Ambil jadwal mata kuliah melalui AJAX
                    fetch(`/get-jadwal/${kodeMk}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                alert(data.error);
                                this.checked = false;
                                return;
                            }

                            data.forEach(item => {
                                addJadwalToTable(item);
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat mengambil jadwal.');
                            this.checked = false;
                        });
                } else {
                    // Hapus jadwal mata kuliah dari tabel
                    removeJadwalFromTable(kodeMk);
                }
            });
        });

        function addJadwalToTable(jadwal) {
            // Cari row berdasarkan jam mulai
            const row = Array.from(jadwalBody.querySelectorAll('tr')).find(tr => {
                const firstCell = tr.querySelector('td');
                return firstCell && firstCell.textContent.trim() === jadwal.jam_mulai;
            });

            if (row) {
                // Cari kolom berdasarkan hari
                const dayIndex = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT'].indexOf(jadwal.hari);
                if (dayIndex === -1) return;

                const cell = row.querySelectorAll('td')[dayIndex + 1]; // +1 karena kolom pertama adalah waktu

                // Cek apakah jadwal sudah ada di dalam cell
                const existingJadwal = cell.querySelector(`[data-jadwal-id="${jadwal.id_jadwal}"]`);
                if (existingJadwal) return;

                // Buat elemen jadwal baru
                const jadwalDiv = document.createElement('div');
                jadwalDiv.classList.add(
                    'w-full', 'p-2', 'bg-white', 'border-l-4', 'rounded-lg', 'shadow-lg', 'mb-2',
                    'cursor-pointer', 'jadwal-item', 'border-yellow-300'
                );
                jadwalDiv.setAttribute('data-jadwal-id', jadwal.id_jadwal);
                jadwalDiv.setAttribute('data-kode-mk', jadwal.kode_mk);

                // Tambahkan konten jadwal
                jadwalDiv.innerHTML = `
                    <div>
                        <h5 class="mb-2 text-xs font-bold text-gray-900">${jadwal.nama_mk}</h5>
                        <p class="text-xs text-red-500 font-semibold">${jadwal.jenis_mk.toUpperCase()} (${jadwal.kode_mk})</p>
                        <p class="text-xs text-gray-700">(SMT ${jadwal.semester}) (${jadwal.sks} SKS)</p>
                        <p class="text-xs text-gray-700">Kelas: ${jadwal.kelas}</p>
                        <p class="text-xs text-gray-700">Ruangan: ${jadwal.ruangan}</p>
                        <div class="flex justify-between">
                            <div class="flex items-center mt-2 text-xs text-gray-600">
                                <i class="fas fa-clock mr-1"></i>
                                ${jadwal.jam_mulai}-${jadwal.jam_selesai}
                            </div>
                            <div class="flex items-center mt-2 text-xs text-gray-500">${jadwal.slot_tersisa}/${jadwal.kapasitas}</div>
                        </div>
                        <button class="text-xs mt-2 bg-blue-500 text-white px-2 py-1 rounded" onclick="selectJadwal('${jadwal.id_jadwal}', '${jadwal.kode_mk}')">Pilih Jadwal</button>
                    </div>
                `;

                // Tambahkan jadwal ke dalam cell
                cell.appendChild(jadwalDiv);
            }
        }

        function removeJadwalFromTable(kodeMk) {
            // Cari semua jadwal yang memiliki kode_mk tersebut dan hapus dari tabel
            const jadwalDivs = jadwalBody.querySelectorAll(`[data-kode-mk="${kodeMk}"]`);
            jadwalDivs.forEach(div => div.remove());

            // Hapus dari IRS jika ada yang belum memiliki jadwal
            fetch(`/update-mk`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ mata_kuliah: [kodeMk] }) // Hanya hapus mata kuliah yang tidak dipilih
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log('Mata kuliah dihapus dari IRS.');
                } else {
                    console.log('Tidak ada perubahan pada IRS.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        // Fungsi untuk memilih jadwal dan memasukkan ke IRS
        window.selectJadwal = function(jadwalId, kodeMk) {
            fetch(`/isi-irs`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ jadwal_id: jadwalId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Jadwal berhasil dipilih dan diupdate di IRS.');
                    // Update tampilan jadwal
                    location.reload(); // Reload halaman untuk menampilkan perubahan
                } else {
                    alert(data.message || 'Terjadi kesalahan saat memilih jadwal.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memilih jadwal.');
            });
        }
    });
</script>


<!-- <script>
    $(document).ready(function() {
    // Ketika checkbox berubah status (checked/unchecked)
        $('.course-checkbox').change(function () {
            var selectedCourses = [];
            var nim = $('#nim').val(); // Ambil NIM mahasiswa dari input

            // Ambil semua kode mata kuliah yang dipilih (checked)
            $('.course-checkbox:checked').each(function () {
                selectedCourses.push($(this).val());
            });
        
            // Update tampilan mata kuliah yang dipilih
            var html = '';
            if (selectedCourses.length === 0) {
                html = '<p class="text-xs text-gray-500">Tidak ada mata kuliah yang dipilih.</p>';
            } else {
                // Loop untuk menampilkan mata kuliah yang dipilih
                selectedCourses.forEach(function(kodeMk) {
                    var mataKuliah = $('#checkbox-' + kodeMk).parent().find('label').text();
                    html += '<div id="selected-' + kodeMk + '" class="p-4 bg-gray-50 rounded-lg shadow mb-3"' +
                                '<div class="flex items-center gap-2">' +
                                    '<i class="fas fa-check text-green-500"></i>' +
                                        '<div>' +
                                            '<h4 class="font-semibold text-sm">' + mataKuliah + '</h4>' +
                                        '</div>' +
                                    '</div>' +
                            '</div>';
                });
            }

            // Update konten #displayedCourses dengan HTML yang baru
            $('#displayedCourses').html(html);
            // Kirim data ke server untuk disimpan

            console.log({
            nim: nim,
            mk: selectedCourses
        });

            $.ajax({
                url: '/simpan-mk',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    nim: nim,
                    mk: selectedCourses
                },
                success: function(response) {
                    console.log('Mata kuliah berhasil disimpan');
                    // Feedback sukses
                },
                error: function(error) {
                    console.error('Error:', error);
                    // Feedback error
                }
            });
        });

        // Filter dropdown berdasarkan pencarian
        $('#input-group-search').on('input', function() {
            var query = $(this).val().toLowerCase();
            $('#dropdownSearchList li').each(function() {
                var text = $(this).find('label').text().toLowerCase();
                $(this).toggle(text.includes(query)); // Tampilkan atau sembunyikan item
            });
        });
        
    });
    
</script> -->
<!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const jadwalItems = document.querySelectorAll('.jadwal-item');
            const modal = document.getElementById('popup-modal');
            const modalMkName = document.getElementById('modal-mk-name');
            const jadwalIdInput = document.getElementById('jadwal_id');

            jadwalItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    // Cek apakah jadwal sudah dipilih
                    if (this.classList.contains('cursor-not-allowed')) {
                        return;
                    }
                    const jadwalId = this.getAttribute('data-jadwal-id');
                    const namaMk = this.getAttribute('data-nama-mk');

                    // Set nilai di modal
                    modalMkName.textContent = namaMk;
                    jadwalIdInput.value = jadwalId;

                    // Tampilkan modal
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });
        });

        function closeModal() {
            const modal = document.getElementById('popup-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // SweetAlert2 untuk flash messages
        @if(session('status'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('status') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        @endif
    </script> -->
    // Fungsi untuk menambahkan jadwal ke tabel
        // function addJadwalToTable(jadwal) {
        //     console.log('Menambahkan jadwal:', jadwal);

        //     // Pastikan semua properti yang diperlukan ada
        //     const requiredProps = ['id_jadwal', 'kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk', 'hari', 'jam_mulai', 'jam_selesai', 'kelas', 'ruangan', 'slot_tersisa', 'kapasitas'];
        //     const missingProps = requiredProps.filter(prop => !jadwal.hasOwnProperty(prop) || jadwal[prop] === null);
        //     if (missingProps.length > 0) {
        //         console.error('Jadwal memiliki properti yang hilang:', missingProps, 'Jadwal:', jadwal);
        //         return;
        //     }

        //     // Pastikan jam_mulai dan hari ada
        //     if (!jadwal.jam_mulai || !jadwal.hari) {
        //         console.error('Jadwal tidak memiliki jam_mulai atau hari:', jadwal);
        //         return;
        //     }

        //     // Pastikan jam_mulai adalah string dan memiliki panjang minimal 5 karakter
        //     if (typeof jadwal.jam_mulai !== 'string' || jadwal.jam_mulai.length < 5) {
        //         console.error('jam_mulai tidak valid:', jadwal.jam_mulai);
        //         return;
        //     }

        //     // Format jam_mulai menjadi 'HH:MM'
        //     let jamMulaiFormatted = jadwal.jam_mulai.substring(0,5); // '07:00:00' menjadi '07:00'

        //     // Pad jamMulaiFormatted jika diperlukan (contoh: '7:00' menjadi '07:00')
        //     if (jamMulaiFormatted.length === 4) { // '7:00'
        //         jamMulaiFormatted = '0' + jamMulaiFormatted; // '07:00'
        //     }

        //     console.log('Jam Mulai Formatted:', jamMulaiFormatted);

        //     // Temukan timeslot yang cocok
        //     const matchedSlot = findMatchedSlot(jamMulaiFormatted, timeslots);
        //     console.log('Matched Slot:', matchedSlot);

        //     if (!matchedSlot) {
        //         console.error('Tidak ada timeslot yang cocok untuk jam_mulai:', jamMulaiFormatted);
        //         return;
        //     }

        //     // Cari row berdasarkan matchedSlot
        //     const row = $('#jadwalBody tr').filter(function() {
        //         const tableTime = $(this).find('td:first').text().trim();
        //         const match = tableTime === matchedSlot;
        //         console.log('Comparing tableTime:', tableTime, 'with matchedSlot:', matchedSlot, 'Match:', match);
        //         return match;
        //     });

        //     console.log('Row ditemukan:', row.length > 0);

        //     if (row.length > 0) {
        //         // Cari kolom berdasarkan hari
        //         const dayMap = {
        //             'SENIN': 1,
        //             'SELASA': 2,
        //             'RABU': 3,
        //             'KAMIS': 4,
        //             'JUMAT': 5
        //         };
        //         const dayIndex = dayMap[jadwal.hari.toUpperCase()];
        //         console.log('Day Index:', dayIndex);

        //         if (dayIndex === undefined) {
        //             console.error('Hari tidak valid:', jadwal.hari);
        //             return;
        //         }

        //         const cell = row.find('td').eq(dayIndex);
        //         console.log('Cell ditemukan pada index:', dayIndex);

        //         // Cek apakah jadwal sudah ada di dalam cell
        //         if (cell.find(`[data-jadwal-id="${jadwal.id_jadwal}"]`).length > 0) {
        //             console.log('Jadwal sudah ada di dalam cell.');
        //             return;
        //         }

        //         // Buat elemen jadwal baru
        //         const jamSelesaiFormatted = jadwal.jam_selesai.substring(0,5);
        //         const jadwalDiv = $(`
        //             <div class="w-full p-2 bg-white border-l-4 rounded-lg shadow-lg mb-2 cursor-pointer jadwal-item border-yellow-300" data-jadwal-id="${jadwal.id_jadwal}" data-kode-mk="${jadwal.kode_mk}" data-nama-mk="${jadwal.nama_mk}">
        //                 <div>
        //                     <h5 class="mb-2 text-xs font-bold text-gray-900">${jadwal.nama_mk}</h5>
        //                     <p class="text-xs text-red-500 font-semibold">${jadwal.jenis_mk ? jadwal.jenis_mk.toUpperCase() : 'UNKNOWN'} (${jadwal.kode_mk})</p>
        //                     <p class="text-xs text-gray-700">(SMT ${jadwal.semester}) (${jadwal.sks} SKS)</p>
        //                     <p class="text-xs text-gray-700">Kelas: ${jadwal.kelas}</p>
        //                     <p class="text-xs text-gray-700">Ruangan: ${jadwal.ruangan}</p>
        //                     <div class="flex justify-between">
        //                         <div class="flex items-center mt-2 text-xs text-gray-600">
        //                             <i class="fas fa-clock mr-1"></i>
        //                             ${jamMulaiFormatted}-${jamSelesaiFormatted}
        //                         </div>
        //                         <div class="flex items-center mt-2 text-xs text-gray-500">${jadwal.slot_tersisa}/${jadwal.kapasitas}</div>
        //                     </div>
        //                     <button class="text-xs mt-2 bg-blue-500 text-white px-2 py-1 rounded" onclick="selectJadwal('${jadwal.id_jadwal}', '${jadwal.kode_mk}')">Pilih Jadwal</button>
        //                 </div>
        //             </div>
        //         `);

        //         // Tambahkan jadwal ke dalam cell
        //         cell.append(jadwalDiv);
        //         console.log('Jadwal berhasil ditambahkan ke dalam cell.');
        //     } else {
        //         console.error('Row untuk timeslot tidak ditemukan:', matchedSlot);
        //     }
        // }
       // Fungsi untuk membulatkan waktu ke jam terdekat
// Optional: If you need to round times to the nearest hour, you can keep this function.
// If not needed, you can remove it or comment it out.
  <!-- // $(document).ready(function() {
    //     // Setup CSRF Token untuk semua permintaan AJAX
    //     $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
        
    // });

    //     // Ketika checkbox berubah status (checked/unchecked)
    //     $('.course-checkbox').change(function () {
    //         var checkbox = $(this);
    //         var kodeMk = checkbox.val();
    //         var isChecked = checkbox.is(':checked');
    //         var nim = '{{ $mhs->nim }}'; // Pastikan NIM tersedia di sini
    //         var timeslots = @json($timeslots);
    //         var days = @json($days);

    //         if (isChecked) {
    //             // Ambil jadwal mata kuliah melalui AJAX
    //             $.ajax({
    //                 url: '/get-jadwal/' + kodeMk,
    //                 method: 'GET',
    //                 dataType: 'json',
    //                 success: function(data) {
    //                     if (data.error) {
    //                         Swal.fire({
    //                             icon: 'error',
    //                             title: 'Gagal',
    //                             text: data.error,
    //                             confirmButtonText: 'OK'
    //                         });
    //                         checkbox.prop('checked', false);
    //                         return;
    //                     }

    //                     // Tambahkan setiap jadwal ke tabel
    //                     data.forEach(function(jadwal) {
    //                         addJadwalToTable(jadwal);
    //                     });

    //                     // Tampilkan SweetAlert sukses
    //                     Swal.fire({
    //                         icon: 'success',
    //                         title: 'Berhasil',
    //                         text: 'Jadwal mata kuliah berhasil ditambahkan ke timetable.',
    //                         confirmButtonText: 'OK'
    //                     });
    //                 },
    //                 error: function(xhr, status, error) {
    //                     console.error('Error:', error);
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'Gagal',
    //                         text: 'Terjadi kesalahan saat mengambil jadwal.',
    //                         confirmButtonText: 'OK'
    //                     });
    //                     checkbox.prop('checked', false);
    //                 }
    //             });

    //             // Simpan mata kuliah yang dipilih ke server
    //             $.ajax({
    //                 url: '/simpan-mk',
    //                 method: 'POST',
    //                 data: {
    //                     nim: nim,
    //                     mk: [kodeMk]
    //                 },
    //                 success: function(response) {
    //                     console.log('Mata kuliah berhasil disimpan');
    //                     // Optional: Anda dapat menambahkan notifikasi tambahan di sini
    //                 },
    //                 error: function(error) {
    //                     console.error('Error:', error);
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'Gagal',
    //                         text: 'Terjadi kesalahan saat menyimpan mata kuliah.',
    //                         confirmButtonText: 'OK'
    //                     });
    //                     checkbox.prop('checked', false);
    //                 }
    //             });
    //         } else {
    //             // Hapus jadwal mata kuliah dari tabel
    //             removeJadwalFromTable(kodeMk);

    //             // Hapus mata kuliah yang dipilih dari server
    //             $.ajax({
    //                 url: '/update-mk',
    //                 method: 'POST',
    //                 data: {
    //                     mata_kuliah: [kodeMk] // Hanya hapus mata kuliah yang tidak dipilih
    //                 },
    //                 success: function(data) {
    //                     if (data.status === 'success') {
    //                         console.log('Mata kuliah dihapus dari IRS.');
    //                     } else {
    //                         console.log('Tidak ada perubahan pada IRS.');
    //                     }
    //                 },
    //                 error: function(error) {
    //                     console.error('Error:', error);
    //                 }
    //             });
    //         }
    //     });

    //     // Filter dropdown berdasarkan pencarian
    //     $('#input-group-search').on('input', function() {
    //         var query = $(this).val().toLowerCase();
    //         $('#dropdownSearchList li').each(function() {
    //             var text = $(this).find('label').text().toLowerCase();
    //             $(this).toggle(text.includes(query)); // Tampilkan atau sembunyikan item
    //         });
    //     });

    //     // Fungsi untuk menambahkan jadwal ke tabel
    //     function addJadwalToTable(jadwal) {
          
    //         console.log('Menambahkan jadwal:', jadwal);

    //         // Pastikan jam_mulai dan hari ada
    //         if (!jadwal.jam_mulai || !jadwal.hari) {
    //             console.error('Jadwal tidak memiliki jam_mulai atau hari:', jadwal);
    //             return;
    //         }

    //         // Pastikan jam_mulai adalah string dan memiliki panjang minimal 5 karakter
    //         if (typeof jadwal.jam_mulai !== 'string' || jadwal.jam_mulai.length < 5) {
    //             console.error('jam_mulai tidak valid:', jadwal.jam_mulai);
    //             return;
    //         }

    //         // Format jam_mulai menjadi 'HH:MM'
    //         let jamMulaiFormatted = jadwal.jam_mulai.substring(0,5); // '07:00:00' menjadi '07:00'

    //         // Pad jamMulaiFormatted jika diperlukan (contoh: '7:00' menjadi '07:00')
    //         if (jamMulaiFormatted.length === 4) { // '7:00'
    //             jamMulaiFormatted = '0' + jamMulaiFormatted; // '07:00'
    //         }

    //     console.log('Jam Mulai Formatted:', jamMulaiFormatted);
    // // Cari row berdasarkan jam mulai yang sudah diformat
    // const row = $('#jadwalBody tr').filter(function() {
    //     const tableTime = $(this).find('td:first').text().trim();
    //     const match = tableTime === jamMulaiFormatted;
    //     console.log('Comparing tableTime:', tableTime, 'with jamMulaiFormatted:', jamMulaiFormatted, 'Match:', match);
    //     return match;
    // });

    // console.log('Row ditemukan:', row.length > 0);

    //         if (row.length > 0) {
    //             // Cari kolom berdasarkan hari
    //             const dayMap = {
    //                 'SENIN': 1,
    //                 'SELASA': 2,
    //                 'RABU': 3,
    //                 'KAMIS': 4,
    //                 'JUMAT': 5
    //             };
    //             const dayIndex = dayMap[jadwal.hari.toUpperCase()];
    //             if (!dayIndex) return;

    //             const cell = row.find('td').eq(dayIndex);

    //             // Cek apakah jadwal sudah ada di dalam cell
    //             if (cell.find(`[data-jadwal-id="${jadwal.id_jadwal}"]`).length > 0) return;

    //             // Buat elemen jadwal baru
    //             const jadwalDiv = $(`
    //                 <div class="w-full p-2 bg-white border-l-4 rounded-lg shadow-lg mb-2 cursor-pointer jadwal-item border-yellow-300" data-jadwal-id="${jadwal.id_jadwal}" data-kode-mk="${jadwal.kode_mk}" data-nama-mk="${jadwal.nama_mk}">
    //                     <div>
    //                         <h5 class="mb-2 text-xs font-bold text-gray-900">${jadwal.nama_mk}</h5>
    //                         <p class="text-xs text-red-500 font-semibold">${jadwal.jenis_mk.toUpperCase()} (${jadwal.kode_mk})</p>
    //                         <p class="text-xs text-gray-700">(SMT ${jadwal.semester}) (${jadwal.sks} SKS)</p>
    //                         <p class="text-xs text-gray-700">Kelas: ${jadwal.kelas}</p>
    //                         <p class="text-xs text-gray-700">Ruangan: ${jadwal.ruangan}</p>
    //                         <div class="flex justify-between">
    //                             <div class="flex items-center mt-2 text-xs text-gray-600">
    //                                 <i class="fas fa-clock mr-1"></i>
    //                                 ${jadwal.jam_mulai}-${jadwal.jam_selesai}
    //                             </div>
    //                             <div class="flex items-center mt-2 text-xs text-gray-500">${jadwal.slot_tersisa}/${jadwal.kapasitas}</div>
    //                         </div>
    //                         <button class="text-xs mt-2 bg-blue-500 text-white px-2 py-1 rounded" onclick="selectJadwal('${jadwal.id_jadwal}', '${jadwal.kode_mk}')">Pilih Jadwal</button>
    //                     </div>
    //                 </div>
    //             `);

    //             // Tambahkan jadwal ke dalam cell
    //             cell.append(jadwalDiv);
    //         }
    //     }

    //     // Fungsi untuk menghapus jadwal dari tabel
    //     function removeJadwalFromTable(kodeMk) {
    //         // Cari semua jadwal yang memiliki kode_mk tersebut dan hapus dari tabel
    //         $('#jadwalBody').find(`[data-kode-mk="${kodeMk}"]`).remove();
    //     }

    //     // Fungsi untuk memilih jadwal dan memasukkan ke IRS melalui konfirmasi SweetAlert2
    //     window.selectJadwal = function(jadwalId, kodeMk) {
    //         // Tampilkan konfirmasi sebelum memilih jadwal
    //         Swal.fire({
    //             title: 'Konfirmasi Pilih Jadwal',
    //             text: "Apakah Anda yakin ingin memilih jadwal ini?",
    //             icon: 'question',
    //             showCancelButton: true,
    //             confirmButtonText: 'Ya, pilih',
    //             cancelButtonText: 'Batal'
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 // Kirim permintaan AJAX untuk mengonfirmasi pemilihan jadwal
    //                 $.ajax({
    //                     url: '/isi-irs',
    //                     method: 'POST',
    //                     contentType: 'application/json',
    //                     data: JSON.stringify({ jadwal_id: jadwalId }),
    //                     success: function(data) {
    //                         if (data.status === 'success') {
    //                             Swal.fire({
    //                                 icon: 'success',
    //                                 title: 'Berhasil',
    //                                 text: 'Jadwal berhasil dipilih dan diupdate di IRS.',
    //                                 confirmButtonText: 'OK'
    //                             }).then(() => {
    //                                 location.reload(); // Reload halaman untuk memperbarui tampilan
    //                             });
    //                         } else {
    //                             Swal.fire({
    //                                 icon: 'error',
    //                                 title: 'Gagal',
    //                                 text: data.message || 'Terjadi kesalahan saat memilih jadwal.',
    //                                 confirmButtonText: 'OK'
    //                             });
    //                         }
    //                     },
    //                     error: function(error) {
    //                         console.error('Error:', error);
    //                         Swal.fire({
    //                             icon: 'error',
    //                             title: 'Gagal',
    //                             text: 'Terjadi kesalahan saat memilih jadwal.',
    //                             confirmButtonText: 'OK'
    //                         });
    //                     }
    //                 });
    //             }
    //         });
    //     }
    // });
    
    // // Fungsi untuk menutup modal jika masih diperlukan
    // function closeModal() {
    //     const modal = document.getElementById('popup-modal');
    //     modal.classList.add('hidden');
    //     modal.classList.remove('flex');
    // }

    // // SweetAlert2 untuk flash messages
    // @if(session('status'))
    //     Swal.fire({
    //         icon: 'success',
    //         title: 'Berhasil',
    //         text: '{{ session('status') }}',
    //         confirmButtonText: 'OK'
    //     });
    // @endif

    // @if(session('error'))
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Gagal',
    //         text: '{{ session('error') }}',
    //         confirmButtonText: 'OK'
    //     });
    // @endif
    // $('#input-group-search').on('input', function() {
    //         var query = $(this).val().toLowerCase();
    //         $('#dropdownSearchList li').each(function() {
    //             var text = $(this).find('label').text().toLowerCase();
    //             $(this).toggle(text.includes(query)); // Tampilkan atau sembunyikan item
    //         });
    //     });
         -->
