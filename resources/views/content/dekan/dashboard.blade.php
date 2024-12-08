<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Dekan</title>
    <link rel="icon" href="{{ asset('img/fix.png') }}" type="image/png">
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
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 mt-4">Dashboard</h1>
            <!-- Konten 1 -->
            <div class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-48 mb-8">
                <div class="relative bg-gray-800 rounded-lg border-gray-300 dark:border-gray-600 h-28 flex items-center">
                <!-- Nama Dosen -->
                <h1 class="text-xl font-semibold text-yellow-400 dark:text-white text-center mt-8 pl-64">
                    {{ $user->name ?? 'Nama tidak ditemukan' }}
                </h1>
                </div>
            <div class="relative flex items-center">
                <!-- NIP dan Email -->
                <h1 class="text-l text-black dark:text-white text-center mt-4 pl-64">
                    NIP : 198120450823691 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->email }}
                </h1>
                <!-- Foto Profil -->
                <img 
                    class="absolute -bottom-6 left-12 w-36 h-36 rounded-full" 
                    src="{{ asset('img/USERFIX.jpg') }}" 
                    alt="photo profile"
                />
            </div>
        </div>
            <div class="relative max-w-screen-lg mx-auto p-4 bg-white shadow mb-8">
            <!-- Tabel dengan Wrapper -->
            <h3 class="text-lg font-semibold mb-4">Informasi Persetujuan Usulan Jadwal Kuliah</h3>
            <div class="overflow-x-auto border border-gray-200">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-200 text-black">
                            <th scope="col" class="p-4 whitespace-nowrap text-center">NO</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">MATA KULIAH</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">WAKTU</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">DOSEN</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">SEMESTER</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">RUANGAN</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">GEDUNG</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">TAHUN AKADEMIK</th>
                            <th scope="col" class="p-4 whitespace-nowrap text-center">STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-transparent">
                    @php $index = ($jadwal->currentPage() - 1) * $jadwal->perPage() + 1; @endphp
                    @foreach ($jadwal as $item)
                        <tr class="bg-white text-black dark:bg-gray-800">
                            <td class="p-4 whitespace-nowrap text-sm text-center">{{ $index }}</td> <!-- Nomor urut yang memperhitungkan pagination -->
                            <td class="p-4 whitespace-nowrap text-sm text-left">{{ $item->matakuliah->nama_mk }}</td>
                            <td class="p-4 whitespace-nowrap text-sm text-left">{{ $item->waktu->jam_mulai }} - {{ $item->waktu->jam_selesai }}</td>
                            <td class="p-4 whitespace-nowrap text-sm">{{ $item->matakuliah->dosenmatkul->first()->dosen->nama_dosen ?? 'Belum tersedia' }}</td>
                            <td class="p-4 whitespace-nowrap text-sm text-center">{{ $item->semesterAktif->semester }}</td>
                            <td class="p-4 whitespace-nowrap text-sm text-center">{{ $item->ruang->nama }}</td>
                            <td class="p-4 whitespace-nowrap text-sm text-center">{{ $item->ruang->gedung }}</td> 
                            <td class="p-4 whitespace-nowrap text-sm text-center">{{ $item->semesterAktif->tahun_akademik }}</td>
                            <td class="p-4 whitespace-nowrap">
                                <span 
                                    class="statusCell rounded-full px-4 py-1 text-sm inline-flex justify-center items-center w-full
                                    {{ $item->status === 'disetujui' ? 'bg-green-200 text-green-600' : '' }}
                                    {{ $item->status === 'ditolak' ? 'bg-red-200 text-red-600' : '' }}
                                    {{ $item->status === 'diajukan' ? 'bg-yellow-200 text-yellow-600' : '' }} ">
                                    {{ $item->status }}
                                </span>
                            </td>
                        </tr>
                        @php $index++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="relative max-w-screen-lg mx-auto p-4 bg-white shadow">
    <!-- Tabel dengan Wrapper -->
    <h3 class="text-lg font-semibold mb-4">Informasi Persetujuan Usulan Ruang Kuliah</h3>
    <div class="overflow-x-auto border border-gray-200">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-200 text-black">
                    <th scope="col" class="p-4 whitespace-nowrap text-center">NO</th>
                    
                    <th scope="col" class="p-4 whitespace-nowrap text-center">GEDUNG</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">RUANGAN</th>
                    <th scope="col" class="p-4 whitespace-nowrap text-center">KAPASITAS</th>
                    
                    <th scope="col" class="p-4 whitespace-nowrap text-center">STATUS</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-transparent">
            <!-- Loop untuk menampilkan data jadwal -->
            @foreach($ruang as $index => $data)
                <tr class="bg-white text-black dark:bg-gray-800">
                    <td class="p-4 whitespace-nowrap text-sm text-center">{{ $index + 1 }}</td>
                    <td class="p-4 whitespace-nowrap text-sm text-center">{{ $data->gedung ?? 'N/A' }}</td>
                    <td class="p-4 whitespace-nowrap text-sm text-center">{{ $data->nama ?? 'N/A' }}</td>
                    <td class="p-4 whitespace-nowrap text-sm text-center">{{ $data->kapasitas ?? 'N/A' }}</td>
                    
                    <td class="p-4 whitespace-nowrap">
                        <span 
                            class="statusCell rounded-full px-4 py-1 text-sm inline-flex justify-center items-center w-full
                            {{ $data->status === 'disetujui' ? 'bg-green-200 text-green-600' : '' }}
                            {{ $data->status === 'ditolak' ? 'bg-red-200 text-red-600' : '' }}
                            {{ $data->status === 'menunggu' ? 'bg-yellow-200 text-yellow-600' : '' }} ">
                            {{ $data->status }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>        
    </main>
        <x-footerdosen></x-footerdosen>
    </div>
</body>
</html>