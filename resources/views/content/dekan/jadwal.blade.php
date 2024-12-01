<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <x-header></x-header>
        <x-sidebar></x-sidebar>
        <main>
        <!-- Main Content -->
        <main class="p-16 md:ml-64 h-auto pt-20">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 mt-4">Usulan Jadwal Kuliah</h1>
            <!-- Konten 1 -->
            <div class="container mx-auto my-3">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Statistik Belum Disetujui -->
                    <div class="bg-yellow-400 text-white rounded-lg shadow-md p-6 flex flex-col items-center">
                        <h3 class="text-4xl font-bold mb-1">{{ $belum_disetujui }}</h3>
                        <p class="text-sm font-semibold mb-2">Belum Disetujui</p>
                        <a class="bg-gray-300 text-gray-50 px-3 py-1 rounded-full mt-2 text-white text-sm font-bold">Baru saja</a>
                    </div>

                    <!-- Statistik Sudah Disetujui -->
                    <div class="bg-green-500 text-white rounded-lg shadow-md p-6 flex flex-col items-center">
                        <h3 class="text-4xl font-bold mb-1">{{ $sudah_disetujui }}</h3>
                        <p class="text-sm font-semibold mb-2">Sudah Disetujui</p>
                        <a class="bg-gray-300 text-gray-50 px-3 py-1 rounded-full mt-2 text-white text-sm font-bold">Baru saja</a>
                    </div>

                    <!-- Statistik Ditolak -->
                    <div class="bg-red-600 text-white rounded-lg shadow-md p-6 mr-4 flex flex-col items-center">
                        <h3 class="text-4xl font-bold mb-1">{{ $ditolak }}</h3>
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
                <form action="{{ route('dekan.jadwal.filter') }}" method="GET" class="space-y-4">
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
        
                <!-- Dropdown Semester -->
                <div>
                    <label for="semester" class="block font-semibold mb-1">Semester</label>
                    <select id="semester" name="semester" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Pilih Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                    </select>
                </div>
                <!-- Button Tampilkan -->
                <a href="{{ route('dekan.verifikasijadwal') }}" id="show-button" class="w-full bg-gray-200 text-black block font-semibold py-2 rounded-md hover:bg-gray-300 text-center" onclick="applyFilter()" type="submit">
                    Tampilkan
                </a>
                </form>
            </div>
        </div>
    </main>
        <x-footerdosen></x-footerdosen>
    </div>
        
<script>
document.addEventListener('DOMContentLoaded', function () {
    const showButton = document.getElementById('show-button');
    const programStudi = document.getElementById('program-studi');
    const semester = document.getElementById('semester');
    const errorMessage = document.getElementById('error-message');
    const tableBody = document.getElementById('data-tabel-jadwal');
    const emptyPlaceholder = document.getElementById('empty-placeholder');
    const loadingIndicator = document.getElementById('loading-indicator');

    showButton.addEventListener('click', function () {
        const prodi = programStudi.value;
        const sem = semester.value;

        // Validasi input
        if (!prodi || !sem) {
            errorMessage.textContent = 'Mohon pilih Program Studi dan Semester!';
            errorMessage.classList.remove('hidden');
            return;
        }

        errorMessage.classList.add('hidden'); // Sembunyikan pesan error
        loadingIndicator.classList.remove('hidden'); // Tampilkan loading

        // Kirim permintaan AJAX
        fetch(`/dekan/jadwal/filter?prodi=${prodi}&semester=${sem}`, {
            method: 'GET',
            headers: { 'Content-Type': 'application/json' },
        })
            .then(response => response.json())
            .then(data => {
                loadingIndicator.classList.add('hidden'); // Sembunyikan loading
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
                        <td>${item.matakuliah?.semester || 'N/A'}</td>
                        <td>${item.ruang?.nama || 'Tidak Ada Ruangan'}</td>
                        <td>${item.ruang?.gedung || 'N/A'}</td>
                        <td>${item.id_TA || 'N/A'}</td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.textContent = 'Terjadi kesalahan saat memuat data.';
                errorMessage.classList.remove('hidden');
                loadingIndicator.classList.add('hidden');
            });
    });
});

function applyFilter() {
        const prodi = document.getElementById('program-studi').value;
        const semester = document.getElementById('semester').value;

        if (!prodi || !semester) {
            alert('Silakan pilih Program Studi dan Semester!');
            return;
        }

        // Redirect ke filter route
        const url = `/dekan/jadwal/filter?prodi=${prodi}&semester=${semester}`;
        window.location.href = url;
    }

</script>

</body>
</html>