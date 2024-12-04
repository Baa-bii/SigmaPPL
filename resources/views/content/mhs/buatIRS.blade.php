<!-- BUAT IRS -->
<div class="tab-content flex flex-col lg:flex-row gap-6" id="buat-irs">
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
                <p class="text-gray-600 mb-1 text-xs">IPK (kumulatif): <span class="font-normal">4.0</span></p>
                <p class="text-gray-600 mb-1 text-xs">IPS (semester lalu): <span class="font-normal">4.0</span></p>
                <p class="text-gray-600 mb-1 text-xs">Max. Beban SKS: <span class="font-normal">24 SKS</span></p>
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
            <!-- <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" data-dropdown-placement="bottom" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-64" type="button">Daftar Mata Kuliah Lain <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                <div class="p-3">
                    <label for="input-group-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-auto">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="input-group-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mata Kuliah">
                    </div>
                </div>
                <ul id="dropdownSearchList" class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                    @foreach ($mataKuliah as $mk)
                        <li>
                            <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input type="checkbox" id="checkbox-{{ $mk->kode_mk }}" 
                                    value="{{ $mk->kode_mk }}" 
                                    class="course-checkbox" 
                                    {{ $mataKuliahDitampilkan->contains('kode_mk', $mk->kode_mk) ? 'checked' : '' }} />
                                <label for="checkbox-{{ $mk->kode_mk }}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">
                                    {{ $mk->nama_mk }} - {{ $mk->sks }}  SKS (Semester {{ $mk->semester }}) - {{ strtoupper($mk->jenis_mk) }} - ({{ $mk->kode_mk }})
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div> -->
            <form method="POST" action="/update-mk">
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
                                    class="course-checkbox" 
                                    {{ $mataKuliahDitampilkan->contains('kode_mk', $mk->kode_mk) ? 'checked' : '' }} />
                                <label for="checkbox-{{ $mk->kode_mk }}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">
                                    {{ $mk->nama_mk }} - {{ $mk->sks }}  SKS (Semester {{ $mk->semester }}) - {{ strtoupper($mk->jenis_mk) }} - ({{ $mk->kode_mk }})
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <button type="submit" class="m-2 focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Pilih</button>
                
            </form>


        </div>
        <!-- Mata Kuliah Ditampilkan -->
        <div class="mt-6">
            <h3 class="font-semibold text-sm mb-2">Mata Kuliah Ditampilkan</h3>
            <div id="displayedCourses" class="space-y-3">
                @if ($mataKuliahDitampilkan->isEmpty())
                    <p class="text-xs text-gray-500">Tidak ada mata kuliah untuk semester ini.</p>
                @else
                    @foreach ($mataKuliahDitampilkan as $matkul)
                        <div id="selected-{{ $matkul->kode_mk }}"class="p-4 bg-gray-50 rounded-lg shadow mb-3">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-check text-green-500"></i>
                                <div>
                                    <!-- <h4 class="font-semibold text-sm">{{ $matkul->nama_mk }}</h4>
                                    <p class="text-xs">{{ strtoupper($matkul->jenis_mk) }} ({{ $mk->kode_mk }})</p>
                                    <p class="text-xs">Semester {{ $matkul->semester }}</p>
                                    <p class="text-xs">{{ $matkul->sks }} SKS</p> -->
                                    <h4 class="font-semibold text-sm">{{ $matkul->nama_mk }} - {{ $matkul->sks }}  SKS (Semester {{ $matkul->semester }}) - {{ strtoupper($matkul->jenis_mk) }} - ({{ $matkul->kode_mk }})</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>            
        </div>
    </div>
    
    <!-- Jadwal Mata Kuliah -->
    <div class="w-full lg:w-2/3 scroll-smooth">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 bg-white">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2">WAKTU<br><span class="italic text-sm font-medium">TIME</span></th>
                        <th class="border border-gray-300 p-2">SENIN<br><span class="italic text-sm font-medium">MONDAY</span></th>
                        <th class="border border-gray-300 p-2">SELASA<br><span class="italic text-sm font-medium">TUESDAY</span></th>
                        <th class="border border-gray-300 p-2">RABU<br><span class="italic text-sm font-medium">WEDNESDAY</span></th>
                        <th class="border border-gray-300 p-2">KAMIS<br><span class="italic text-sm font-medium">THURSDAY</span></th>
                        <th class="border border-gray-300 p-2">JUMAT<br><span class="italic text-sm font-medium">FRIDAY</span></th>
                    </tr>
                </thead>

                <tbody>
                @php
                    $timeslots = ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'];
                    $days = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT'];
                @endphp

                @foreach ($timeslots as $slot)
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ $slot }}</td>
                    @foreach ($days as $day)
                        <td class="border border-gray-300 p-2 text-center">
                            @php
                                $currentJadwal = $jadwal->filter(function ($j) use ($day, $slot) {
                                    return strtoupper($j->hari) === $day && $j->jam_mulai === $slot;
                                });
                            @endphp

                            @if ($currentJadwal->isNotEmpty())
                                @foreach ($currentJadwal as $item)
                                    <div class="w-40 h-auto p-2 bg-white border-l-4 border-blue-500 rounded-lg shadow-lg mb-2">
                                        <h5 class="mb-2 text-xs font-bold text-gray-900">{{$item->nama_mk }}</h5>
                                        <p class="text-xs text-red-500 font-semibold"> {{ strtoupper($item->jenis_mk) }} ({{ $item->kode_mk }})</p>
                                        <p class="text-xs text-gray-700">(SMT {{ $item->semester }}) ({{ $item->sks }} SKS)</p>
                                        <p class="text-xs text-gray-700">Kelas: {{ $item->kelas }}</p>
                                        <div class="flex items-center mt-2 text-xs text-gray-600">{{ $item->jam_mulai }}</div>
                                    </div>
                                @endforeach
                            @else
                                <span class="text-gray-400 text-xs">-</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-2">Simpan</button>
            <button type="button" class="focus:outline-none text-white bg-purple-800 hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Lihat</button>
        </div>
    </div>
@else
    <div class="w-full bg-white p-6 text-center border border-gray-300">
        <h2 class="text-red-500 text-xl font-semibold">Tidak Dapat Membuat IRS</h2>
        <p class="text-gray-500 mt-2">Anda bukan mahasiswa aktif. Segera lakukan registrasi untuk membuat IRS</p>
    </div>
@endif
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
    
</script>

<!-- <script>
$('.course-checkbox').change(function () {
    var selectedCourses = [];
    var nim = $('#nim').val(); // Ambil NIM mahasiswa dari input

    // Ambil semua kode mata kuliah yang dipilih (checked)
    $('.course-checkbox:checked').each(function () {
        selectedCourses.push($(this).val());
    });

    // Kirim data ke server untuk disimpan
    $.ajax({
        url: /simpan-mk, // Endpoint untuk menyimpan data IRS
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            nim: nim,
            courses: selectedCourses
        },
        success: function(response) {
            if(response.success) {
                    alert('Mata kuliah berhasil disimpan!');
                } else {
                    alert('Gagal menyimpan mata kuliah.');
                }
        },
        error: function(xhr, status, error) {
                console.log(error);
                alert('Terjadi kesalahan saat menyimpan data.');
            }
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
});
// function updateJadwal(selectedCourses) {
//     // Dapatkan data jadwal dari server untuk mata kuliah yang dipilih
//     $.ajax({
//         url: '/get-jadwal',  // Endpoint untuk mengambil jadwal berdasarkan mata kuliah yang dipilih
//         method: 'GET',
//         data: {
//             courses: selectedCourses
//         },
//         success: function(response) {
//             // Tampilkan jadwal di UI
//             var jadwalHTML = '';
//             response.jadwal.forEach(function(jadwal) {
//                 jadwalHTML += '<div class="jadwal-item" data-id="'+ jadwal.id +'" data-mk="'+ jadwal.kode_mk +'">' +
//                                 '<h4>' + jadwal.hari + ' - ' + jadwal.jam_mulai + '</h4>' +
//                                 '<p>' + jadwal.tempat + '</p>' +
//                               '</div>';
//             });
//             $('#jadwalDisplay').html(jadwalHTML);
//         },
//         error: function(error) {
//             console.error('Error fetching jadwal:', error);
//         }
//     });
// }
// $(document).on('click', '.jadwal-item', function() {
//     var jadwalId = $(this).data('id');
//     var kodeMk = $(this).data('mk');
//     var nim = $('#nim').val(); // Ambil NIM mahasiswa

//     // Kirim request untuk memperbarui jadwal di IRS
//     $.ajax({
//         url: '/update-jadwal', // Endpoint untuk update jadwal di IRS
//         method: 'POST',
//         data: {
//             _token: '{{ csrf_token() }}',
//             nim: nim,
//             kode_mk: kodeMk,
//             id_jadwal: jadwalId
//         },
//         success: function(response) {
//             console.log('Jadwal berhasil diperbarui');
//         },
//         error: function(error) {
//             console.error('Error:', error);
//         }
//     });
// });

</script> -->
