<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ruangan</title>
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
        <main class="p-16 md:ml-64 h-auto pt-20">
            <div class="font-sans font-semibold text-gray-600 m-5">
                <h2>Kelola Ruangan</h2>
            </div>

            <div></div>
            <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-500 bg-white shadow-md rounded-xl bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                    <tr>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-lg antialiased font-semibold leading-none text-blue-700 ">
                            Ruang
                        </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50" data-sort="gedung">
                        <p class="block font-sans text-lg antialiased font-semibold leading-none text-blue-700">
                            Gedung
                        </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50" data-sort="prodi">
                        <p class="block font-sans text-lg antialiased font-semibold leading-none text-blue-700 ">
                            Prodi
                        </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-lg antialiased font-semibold leading-none text-blue-700 ">Action</p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($ruangKelas as $ruang)
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="text-sm text-blue-gray-900">{{ $ruang->nama }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="text-sm text-blue-gray-900">{{ $ruang->gedung }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="text-sm text-blue-gray-900">{{ $ruang->program_studi->nama_prodi }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <button class="bg-green-400 w-10 rounded text-white hover:bg-green-500 shadow-md">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <a href="#">
                    <button class="bg-blue-500 w-auto h-auto m-4 p-2 rounded text-white hover:bg-blue-600 shadow-lg">Tambahkan Ruangan</button>
                </a>
            </div>
        </main>
        <x-footerdosen></x-footerdosen>
    </div>
</body>


</html>