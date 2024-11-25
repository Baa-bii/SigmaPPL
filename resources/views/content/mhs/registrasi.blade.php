<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Set CSRF token for Axios
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;
    </script>

    <title>Registrasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Libre Franklin', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <x-header></x-header>
    <x-sidebar></x-sidebar>
    
    <!-- Container Utama -->
    <main class="md:ml-64 h-auto pt-10">
        
        <div class="container max-w-7xl mx-auto p-6">
            <h1 class="mt-10 text-lg font-semibold text-gray-900 dark:text-white mb-4">Registrasi</h1>
            <!-- Pilih Status Akademik -->
            <div class="bg-white p-6 shadow-md">
                <h3 class="text-xl font-semibold mb-4">Pilih Status Akademik</h3>
                <div class="flex flex-col md:flex-row gap-6 mb-4">
                    <!-- Status Aktif -->
                    <div class="bg-gray-100 p-6 flex-1">
                        <h3 class="text-lg font-bold mb-2">Aktif</h3>
                        <p class="mb-4">Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).</p>
                        <button id="status-aktif" 
                            class="px-4 py-2 rounded-md text-sm transition
                                @if(isset($semesterAktif) && $semesterAktif->status !== 'Belum Registrasi') bg-gray-400 text-gray-700 cursor-not-allowed @else bg-yellow-300 hover:bg-yellow-600 @endif"
                            @if(isset($semesterAktif) && $semesterAktif->status !== 'Belum Registrasi') disabled @endif>
                            Pilih
                        </button>
                    </div>
                    <!-- Status Cuti -->
                    <div class="bg-gray-100 p-6 flex-1">
                        <h3 class="text-lg font-bold mb-2">Cuti</h3>
                        <p class="mb-4">Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa Undip.</p>
                        <button id="status-cuti" 
                            class="px-4 py-2 rounded-md text-sm transition
                                @if(isset($semesterAktif) && $semesterAktif->status !== 'Belum Registrasi') bg-gray-400 text-gray-700 cursor-not-allowed @else bg-yellow-300 hover:bg-yellow-600 @endif"
                            @if(isset($semesterAktif) && $semesterAktif->status !== 'Belum Registrasi') disabled @endif>
                            Pilih
                        </button>
                    </div>
                </div>
                <hr class="border-gray-300 mb-4">
                <div class="flex items-center">
                    <h3 class="text-lg font-semibold mr-4">Status Akademik:</h3>
                    <span id="status-akademik" 
                        class="px-4 py-2 rounded-md text-white text-sm
                            @if(isset($semesterAktif) && $semesterAktif->status === 'Aktif') bg-green-500
                            @elseif(isset($semesterAktif) && $semesterAktif->status === 'Cuti') bg-blue-500
                            @else bg-red-600 @endif">
                        {{ $semesterAktif->status ?? 'Belum Tersedia' }}
                    </span>
                </div>

            </div>
        </div>
    </main>
    <x-footerdosen></x-footerdosen>
</body>

<script>
    const nim = @json($mahasiswa->nim); // Ambil NIM dari mahasiswa yang dikirim ke view

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
            statusAkademik.classList.add('bg-blue-600'); // Tambahkan warna biru

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
