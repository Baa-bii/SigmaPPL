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

            <div>
                <form method="GET" action="{{ route('akademik.ruang.index') }}">
                    <label for="filter_gedung" class="form-label font-sans font-medium">Filter by Gedung</label>
                    <select name="filter_gedung" id="filter_gedung" class="rounded-lg text-sm" onchange="this.form.submit()">
                        <option value="">All Gedung</option>
                        <option value="A" {{ request('filter_gedung') == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ request('filter_gedung') == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ request('filter_gedung') == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ request('filter_gedung') == 'D' ? 'selected' : '' }}>D</option>
                        <option value="E" {{ request('filter_gedung') == 'E' ? 'selected' : '' }}>E</option>
                        <option value="F" {{ request('filter_gedung') == 'F' ? 'selected' : '' }}>F</option>
                        <option value="G" {{ request('filter_gedung') == 'G' ? 'selected' : '' }}>G</option>
                        <option value="H" {{ request('filter_gedung') == 'H' ? 'selected' : '' }}>H</option>
                        <option value="I" {{ request('filter_gedung') == 'I' ? 'selected' : '' }}>I</option>
                        <option value="J" {{ request('filter_gedung') == 'J' ? 'selected' : '' }}>J</option>
                        <option value="K" {{ request('filter_gedung') == 'K' ? 'selected' : '' }}>K</option>
                    </select>
            
                    <label for="filter_prodi" class="form-label font-sans font-medium">Filter by Prodi</label>
                    <select name="filter_prodi" id="filter_prodi" class="rounded-lg text-sm" onchange="this.form.submit()">
                        <option value="">All Prodi</option>
                        @foreach ($programStudi as $prodi)
                            <option value="{{ $prodi->kode_prodi }}" {{ request('filter_prodi') == $prodi->kode_prodi ? 'selected' : '' }}>
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
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
                                <a href="{{ route('akademik.ruang.edit', $ruang->id) }}">
                                <button class="bg-green-400 w-auto p-1 rounded text-white hover:bg-green-500 shadow-md">
                                    Edit
                                </button>
                                <form action="{{ route('akademik.ruang.destroy', $ruang->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 w-auto p-1 rounded text-white hover:bg-red-600 shadow-md">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <a href="{{ route('akademik.ruang.create') }}">
                    <button class="bg-blue-500 w-auto h-auto m-4 p-2 rounded text-white hover:bg-blue-600 shadow-lg" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ruangKelasModal">
                        Tambahkan Ruangan
                    </button>
                </a>
            </div>
            
    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class=" m-4 p-2 text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Ajukan
        </button>
        
        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda yakin ingin mengajukan?</h3>
                        <button data-modal-hide="popup-modal" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
    
        </main>
        <x-footerdosen></x-footerdosen>
    </div>
</body>


</html>