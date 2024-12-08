<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Jadwal</title>
    <link rel="icon" href="{{ asset('img/fix.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- <div class="antialiased bg-gray-50 dark:bg-gray-900"> --}}
        {{-- <x-header /> --}}
        {{-- <x-sidebar /> --}}

        {{-- <main class="md:ml-64 h-auto pt-20"> --}}
            {{-- <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased"> --}}
                {{-- <div x-data="{open : false}"> --}}
                    
                    {{-- Tambah jadwal --}}
                    <div id="edit-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full h-auto max-w-md max-h-full">
                            <div class="relative bg-white p-6 w-full max-w-lg rounded-lg shadow " >
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400" data-modal-toggle="add-modal">✖</button>
                                <form id="form-edit" method="POST" action="{{ route('kaprodi.jadwal.update', $jadwal->id_jadwal) }}">
                                        @csrf
                                        @method('PUT')
                                        <h4 class="text-center text-2xl mb-6">Edit Jadwal</h4>
                                        
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
                                    
                                        <div class="flex items-center space-x-4 mt-4">
                                            <button type="submit" class="text-white bg-green-600 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                Simpan perubahan
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
                                                            @foreach ($ruang as $ru)
                                                                <option value="{{ $ru->id }}">{{ $ru->gedung }}{{ $ru->nama }}</option>
                                                            @endforeach
                                                        </select>

                                                        <!-- Jam Mulai -->
                                                        <label for="kelas[${i}][id_waktu]" class="block text-sm font-medium mt-2">Jam Mulai</label>
                                                        <select name="kelas[${i}][id_waktu]" id="jam_mulai_${i}" class="form-select bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5 jam-mulai" data-index="${i}" required>
                                                            @foreach ($waktu as $wt)
                                                                <option value="{{ $wt->id }}" data-jam="{{ $wt->jam_mulai }}">{{ $wt->jam_mulai }}</option>
                                                            @endforeach
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
                {{-- </div>   --}}
            {{-- </section> --}}
           
        {{-- </main> --}}

    {{-- <x-footerdosen /> --}}
    {{-- </div> --}}
</body>

</html>