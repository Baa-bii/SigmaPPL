<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>IRS Sementara</title>
    <link rel="icon" href="{{ asset('img/fix.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Header -->
    <x-header></x-header>
    <x-sidebar></x-sidebar>
    
    <!-- Container Utama -->
    <main class="md:ml-64 h-auto pt-10 flex-grow">
        <div class="max-w-7xl m-10 py-10">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900 mb-4">Daftar Mata Kuliah yang Diambil</h2>
                    <p>Max. Beban SKS: {{ $maxSKS }} SKS</p>
                    <p>IP. Semester (lalu): {{ $ips }}</p>
                    <p>Total SKS dipilih: {{ $totalSKS }}</p>
                    
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
                                @foreach ($irsData as $index => $row)
                                <tr id="row-{{ $row->id }}">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $row->kode_mk }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $row->mata_kuliah }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $row->semester }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $row->kelas }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $row->status }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $row->ruang }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $row->sks }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <button type="button" 
                                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-xs px-5 py-2.5 text-center mb-2"
                                                onclick="handleDelete({{ $row->id }})">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <button class="ajukan mt-10 focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                        Ajukan
                    </button>
                </div>
            </div>
        </div>       
    </main>

    <x-footerdosen></x-footerdosen>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
   function handleDelete(jadwalID) {
    // Tampilkan konfirmasi sebelum menghapus
    Swal.fire({
        title: 'Konfirmasi Hapus',
        text: "Apakah Anda yakin ingin menghapus data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Kirim permintaan AJAX untuk menghapus data
            axios.post(`/irs/cancel/${jadwalID}`, {
                _token: '{{ csrf_token() }}'
            })
            .then((response) => {
                if (response.data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Hapus baris tabel yang sesuai
                        const row = document.getElementById(`row-${jadwalID}`);
                        if (row) {
                            row.remove();  // Hapus baris tabel terkait
                        }
                    });
                } else {
                    Swal.fire('Gagal', response.data.message, 'error');
                }
            })
            .catch((error) => {
                Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus data.', 'error');
            });
        }
    });
}


</script>