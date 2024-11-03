<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <x-headerdosen></x-headerdosen>
  <div class="container mt-1 mb-7">
      <div class="mt-4 p-2 text-white rounded-xl text-center bg-yellow-500 font-semibold">
        <h1>Selamat Datang {{ Auth::user()->name }}!</h1> 
      </div>
  </div>
  <div class="flex flex-wrap justify-center p-8 mx-4 space-x-4 rounded-md">
    <div class="h-40 w-80 bg-white rounded-2xl shadow-lg border-2 border-yellow-300 hover:cursor-pointer hover:scale-105 ease-in-out duration-300" href="#">
      <div class="flex flex-col p-4 h-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M6.012 18H21V4a2 2 0 0 0-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1zM8 6h9v2H8V6z"></path>
        </svg>
        <h2 class="font-bold text-wrap overflow-wrap mt-2">Jumlah Mahasiswa</h2>
        <div class="font-semibold text-lg mt-2">10</div>
      </div>
    </div>
    <div class="h-40 w-80 bg-white rounded-2xl shadow-lg border-2 border-green-300 hover:cursor-pointer hover:scale-105 ease-in-out duration-300" href="#">
      <div class="flex flex-col p-4 h-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.294-4.708-4.3 4.292-1.292-1.292-1.414 1.414 2.706 2.704 5.712-5.702z"></path>
        </svg>
        <h2 class="font-bold text-wrap overflow-wrap mt-2 text-green-500">Jumlah Mahasiswa Sudah Isi Irs</h2>
        <div class="font-semibold text-lg mt-2 text-green-500">10</div>
      </div>
    </div>
    <div class="h-40 w-80 bg-white rounded-2xl shadow-lg border-2 border-red-500 hover:cursor-pointer hover:scale-105 ease-in-out duration-300" href="#">
      <div class="flex flex-col p-4 h-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M3 20c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2h-2a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H5c-1.103 0-2 .897-2 2v15zM5 5h2v2h10V5h2v15H5V5z"></path><path d="M14.292 10.295 12 12.587l-2.292-2.292-1.414 1.414 2.292 2.292-2.292 2.292 1.414 1.414L12 15.415l2.292 2.292 1.414-1.414-2.292-2.292 2.292-2.292z"></path>
        </svg>
        <h2 class="font-bold text-wrap overflow-wrap mt-2 text-red-500">Irs Belum Disetujui</h2>
        <div class="font-semibold text-lg mt-2 text-red-500">10</div>
      </div>
    </div>
  </div>
</body>
</html>