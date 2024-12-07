
{{-- <!DOCTYPE html>
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

<<<<<<< HEAD
</head> --}}
{{-- <body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Header -->
    <x-header></x-header>
    <x-sidebar></x-sidebar> --}}
    
    <!-- Container Utama -->
    {{-- <main class="md:ml-64 h-auto pt-10 flex-grow"> --}}
        <!-- resources/views/irs.blade.php -->
        {{-- @extends('layouts.app') --}}

        {{-- @section('content')

        @section('content')
        <div class="max-w-7xl mx-auto py-10">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900 mb-4">Daftar Mata Kuliah yang Diambil</h2>
                    <p>Max. Beban SKS: 24 SKS</p>
                    <p>IP. Semester (lalu): 4.00</p>
                    
                    <table class="min-w-full divide-y divide-gray-200 mt-4">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode MK</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SMT</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ruang</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($irsData as $index => $row)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $row->kode_mk }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $row->mata_kuliah }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $row->semester }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $row->kelas }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $row->ruang }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $row->sks }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <form action="{{ route('irs.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 3a1 1 0 011-1h6a1 1 0 110 2H5v11a2 2 0 002 2h6a2 2 0 002-2V6a1 1 0 112 0v9a4 4 0 01-4 4H7a4 4 0 01-4-4V4H3a1 1 0 010-2h6z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button class="mt-4 px-4 py-2 bg-red-500 text-white rounded shadow hover:bg-red-600">Ajukan</button>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        @endsection --}}

       
    {{-- </main>
    <x-footerdosen></x-footerdosen>
</body>
{{--  --}}
{{-- </html> --}}

      