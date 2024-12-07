<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Mahasiswa</title>
    <link rel="icon" href="{{ asset('img/fix.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Header Sigma -->
    <x-header></x-header>
    <x-sidebar></x-sidebar>
    <!-- Container Utama -->
    <main class="md:ml-64 h-auto relative flex-grow">
    
        <div class="container max-w-7xl mx-auto p-6">
        <h1 class="pt-20 text-lg font-semibold text-gray-900 dark:text-white mb-4">Akademik</h1>
            <!-- Tabs -->
            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 mb-8">
                <ul class="flex justify-center space-x-8">
                    <li>
                        @if(isset($status) && $status === 'Aktif')
                        <a href="#" onclick="showTabContent(event, 'buat-irs')" 
                        class="inline-flex items-center p-2 text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500 hover:text-gray-600 hover:border-gray-300">
                            Buat IRS
                        </a>
                        @else
                        <a href="#" onclick="showTabContent(event, 'buat-irs')" 
                        class="inline-flex items-center p-2 text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500 hover:text-gray-600 hover:border-gray-300">
                            Buat IRS
                        </a>
                        @endif
                    </li>
                    <li>
                        <a href="#" onclick="showTabContent(event, 'irs')" class="inline-flex items-center p-2 text-gray-500 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">
                            IRS
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#"  onclick="showTabContent(event, 'khs')" class="inline-flex items-center p-2 text-gray-500 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">
                            KHS
                        </a>
                    </li> -->
                </ul>
            </div>

            <!-- Buat IRS -->
            <!-- @if($status === 'Aktif')
                


            @else
                <div class="w-full bg-white p-6 text-center border border-gray-300">
                    <h2 class="text-red-500 text-xl font-semibold">Tidak Dapat Membuat IRS</h2>
                    <p class="text-gray-500 mt-2">Status akademik Anda saat ini tidak memungkinkan untuk membuat IRS.</p>
                </div>
            @endif -->
            @include('content.mhs.buatIrs')
            <!-- Tab Contents Lainnya -->
            @include('content.mhs.irs')
            <!-- @include('content.mhs.khs') -->

         
        </div>
    </main>


    

    <!-- <script>
        function showTabContent(event, targetId) {
            event.preventDefault();
            
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            
            // Remove active class from all nav items
            document.querySelectorAll('.text-blue-600').forEach(item => {
                item.classList.remove('text-blue-600', 'border-blue-600');
                item.classList.add('text-gray-500', 'border-transparent');
            });

            // Show the targeted tab content
            document.getElementById(targetId).classList.remove('hidden');

            // Set the clicked nav item as active
            event.currentTarget.classList.add('text-blue-600', 'border-blue-600');
            event.currentTarget.classList.remove('text-gray-500', 'border-transparent');
        }

    </script> -->
    <!-- <script>
        const status = @json($status); // Ambil status dari backend

        function showTabContent(event, targetId) {
            event.preventDefault();

            if (targetId === 'buat-irs' && status !== 'Aktif') {
                alert('Anda tidak dapat membuat IRS karena status Anda belum Aktif.');
                return;
            }
            // Remove active class from all nav items
            document.querySelectorAll('.text-blue-600').forEach(item => {
                item.classList.remove('text-blue-600', 'border-blue-600');
                item.classList.add('text-gray-500', 'border-transparent');
            });
            // Set the clicked nav item as active
            event.currentTarget.classList.add('text-blue-600', 'border-blue-600');
            event.currentTarget.classList.remove('text-gray-500', 'border-transparent');

            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));

            // Show the targeted tab content
            document.getElementById(targetId).classList.remove('hidden');
        }
    </script> -->
    <script>
    function showTabContent(event, targetId) {
        event.preventDefault();

        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));

        // Remove active class from all nav items
        document.querySelectorAll('.text-blue-600').forEach(item => {
            item.classList.remove('text-blue-600', 'border-blue-600');
            item.classList.add('text-gray-500', 'border-transparent');
        });

        // Show the targeted tab content
        document.getElementById(targetId).classList.remove('hidden');

        // Set the clicked nav item as active
        event.currentTarget.classList.add('text-blue-600', 'border-blue-600');
        event.currentTarget.classList.remove('text-gray-500', 'border-transparent');
    }
</script>

    

</body>
</html>
<x-footerdosen></x-footerdosen>
