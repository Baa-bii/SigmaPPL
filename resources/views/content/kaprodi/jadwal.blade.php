<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <x-header />
        <x-sidebar />

        <main class="md:ml-64 h-auto pt-20">
            <!-- Container Utama -->
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="mb-6 pl-4">
                    <h2 class="text-2xl font-bold">Daftar Jadwal</h2>
                    <p>Tahun Ajaran Aktif: {{ $tahunAjaran->tahun_akademik }} - Semester {{ $tahunAjaran->semester }}</p>
                    <p>Program Studi: {{ $programStudi->nama_prodi }}</p>
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
                        
                        {{-- Tambah jadwal --}}
                        <div id="add-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full h-auto max-w-md max-h-full">
                                <div class="relative bg-white p-6 w-full max-w-lg rounded-lg shadow " >
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400" data-modal-toggle="add-modal">✖</button>
                                        <form id="form-primer" method="POST" action="{{ route('kaprodi.jadwal.store') }}">
                                            <h4 class="text-center text-2xl mb-6">Tambah Jadwal</h4>
                                            @csrf
                                            <!-- Dropdown Mata Kuliah -->
                                            <div class="mb-4 pl-4">
                                                <label for="kode_mk" class="block text-sm font-medium">Mata Kuliah</label>
                                                <select name="kode_mk" id="kode_mk" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 w-full p-2.5" required>
                                                    @foreach ($matakuliah as $mk)
                                                        <option value="{{ $mk->kode_mk }}" data-sks="{{ $mk->sks }}">{{ $mk->nama_mk }}</option>
                                                    @endforeach
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
                                            <!-- Dropdown Rombel Kelas -->
                                            
                                            <script>
                                                document.getElementById('jumlah_kelas').addEventListener('input', function () {
                                                const container = document.getElementById('jadwal-kelas-container');
                                                const jumlahKelas = parseInt(this.value) || 0;

                                                // Hapus elemen sebelumnya
                                                container.innerHTML = '';

                                                for (let i = 1; i <= jumlahKelas; i++) {
                                                    const jadwalHtml = `
                                                        <div class="mb-4">
                                                            <h5 class="text-lg font-bold">Jadwal Kelas ${String.fromCharCode(64 + i)}</h5>
                                                            
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
                                                                @foreach ($ruang as $ru)
                                                                    <option value="{{ $ru->id }}">{{ $ru->gedung }}{{ $ru->nama }}</option>
                                                                @endforeach
                                                            </select>

                                                            <!-- Jam Mulai -->
                                                            <label for="kelas[${i}][jam_mulai]" class="block text-sm font-medium mt-2">Jam Mulai</label>
                                                            <select name="kelas[${i}][jam_mulai]" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5 jam-mulai" data-index="${i}" required>
                                                                @foreach ($waktu as $wt)
                                                                    <option value="{{ $wt->id }}" data-jam="{{ $wt->jam_mulai }}">{{ $wt->jam_mulai }}</option>
                                                                @endforeach
                                                            </select>

                                                            <!-- Jam Selesai -->
                                                            <label for="kelas[${i}][jam_selesai]" class="block text-sm font-medium mt-2">Jam Selesai</label>
                                                            <input type="text" name="kelas[${i}][jam_selesai]" class="form-input bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5 jam-selesai" readonly required>
                                                        </div>
                                                    `;
                                                    container.insertAdjacentHTML('beforeend', jadwalHtml);
                                                }
                                                });
                                            </script>
                                            
                                            <div class="flex items-center space-x-4 mt-4">
                                                <button type="submit" class="text-white bg-green-600 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Simpan dan tambahkan
                                                </button>
                                            
                                            </div>
                                        </form>
                                        <script>
                                            document.getElementById('jumlah_kelas').addEventListener('input', function () {
                                                const jumlah = parseInt(this.value);
                                                const rombelSelect = document.getElementById('rombel_kelas');
                                                rombelSelect.innerHTML = ''; // Kosongkan dropdown sebelumnya
                                            
                                                if (!isNaN(jumlah) && jumlah > 0) {
                                                    for (let i = 0; i < jumlah; i++) {
                                                        const option = document.createElement('option');
                                                        option.value = String.fromCharCode(65 + i); // A, B, C, ...
                                                        option.textContent = option.value;
                                                        rombelSelect.appendChild(option);
                                                    }
                                                }
                                            });
                                        </script>
                                       <script>
                                        document.getElementById('jadwal-kelas-container').addEventListener('change', function (e) {
                                            if (e.target && e.target.id.startsWith('jam_mulai_')) {
                                                const id = e.target.id.split('_')[2]; // Ambil nomor kelas
                                                const jamMulai = e.target.options[e.target.selectedIndex].text; // Ambil teks dropdown waktu mulai
                                    
                                                // Ambil jumlah SKS dari dropdown Mata Kuliah
                                                const sksDropdown = document.getElementById('kode_mk');
                                                const sks = sksDropdown.options[sksDropdown.selectedIndex].getAttribute('data-sks');
                                    
                                                if (!sks || isNaN(sks)) {
                                                    console.error("Jumlah SKS tidak valid:", sks);
                                                    return;
                                                }
                                    
                                                // Konversi waktu mulai ke menit total
                                                const waktuMulai = jamMulai.split(':');
                                                if (waktuMulai.length < 2) {
                                                    console.error("Format waktu tidak valid:", jamMulai);
                                                    return;
                                                }
                                    
                                                const totalMenitMulai = parseInt(waktuMulai[0]) * 60 + parseInt(waktuMulai[1]);
                                    
                                                // Hitung durasi berdasarkan jumlah SKS
                                                const durasi = parseInt(sks) * 50;
                                    
                                                // Hitung waktu selesai
                                                const totalMenitSelesai = totalMenitMulai + durasi;
                                                const jamSelesai = `${String(Math.floor(totalMenitSelesai / 60)).padStart(2, '0')}:${String(totalMenitSelesai % 60).padStart(2, '0')}`;
                                    
                                                // Set jam selesai ke input terkait
                                                document.getElementById(`jam_selesai_${id}`).value = jamSelesai;
                                            }
                                        });
                                    </script>
  
                                </div>
                            </div>
                        </div>    
                    </div>  
                </div>  
                    <!-- Tabel Jadwal -->
                <div class="overflow-x-auto pl-4">
                        <table class="table-auto w-full border-collapse border border-green-500">
                            <thead class="text-xs text-gray-700 uppercase bg-green-500 dark:bg-gray-700 dark:text-gray-400">>
                                <tr class="bg-green-500">
                                    <th class="px-4 py-2 border">Hari</th>
                                    <th class="px-4 py-2 border">Mata Kuliah</th>
                                    <th class="px-4 py-2 border">Kelas</th>
                                    <th class="px-4 py-2 border">Ruang</th>
                                    <th class="px-4 py-2 border">Jam Mulai</th>
                                    <th class="px-4 py-2 border">Jam Selesai</th>
                                    <th class="px-4 py-2 border">Program Studi</th>
                                    <th class="px-4 py-2 border">Tahun Akademik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwal as $item)
                                    <tr class="text-center">
                                        <td class="px-4 py-2 border">{{ $item->hari }}</td>
                                        <td class="px-4 py-2 border">
                                            {{ $item->matakuliah->nama_mk}}
                                        </td>
                                        <td class="px-4 py-2 border">{{ $item->kelas }}</td>
                                        <td class="px-4 py-2 border">
                                            {{ $item->ruang->gedung}}
                                            {{ $item->ruang->nama}}
                                        </td>
                                        <td class="px-4 py-2 border">
                                            {{ $item->waktu->jam_mulai}}
                                           
                                        </td> 
                                        <td class="px-4 py-2 border">
                                            {{ $item->waktu->jam_mulai?? 'Tidak tersedia'}}
                                        </td>                                  
                                        <td class="px-4 py-2 border">
                                            {{ $item->programStudi->nama_prodi}}
                                        </td>
                                        <td class="px-4 py-2 border">
                                            {{ $tahunAjaran->tahun_akademik }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-gray-500">
                                            Tidak ada jadwal yang tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
           
        </main>

        <x-footerdosen />
    </div>
</body>

</html>
