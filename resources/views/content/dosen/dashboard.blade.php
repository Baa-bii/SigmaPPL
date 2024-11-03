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
      <div class="mt-4 p-2 text-white rounded text-center bg-yellow-500 font-semibold">
        <h1>Selamat Datang {{ Auth::user()->name }}!</h1> 
      </div>
  </div>
  <div class="flex flex-wrap justify-center p-8 mx-4 space-x-4 rounded-md">
    <div class="h-40 w-80 bg-white rounded-2xl shadow-lg border-2 border-yellow-300">
      <div class="flex flex-col p-4 h-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M6.012 18H21V4a2 2 0 0 0-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1zM8 6h9v2H8V6z"></path>
        </svg>
        <h2 class="font-bold text-wrap overflow-wrap mt-2">Jumlah Mahasiswa</h2>
        <div class="font-semibold text-lg mt-2">10</div>
      </div>
    </div>
    <div class="h-40 w-80 bg-white rounded-2xl shadow-lg border-2 border-yellow-300">
      <div class="flex flex-col p-4 h-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M6.012 18H21V4a2 2 0 0 0-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1zM8 6h9v2H8V6z"></path>
        </svg>
        <h2 class="font-bold text-wrap overflow-wrap mt-2">Jumlah Mahasiswa Sudah Isi Irs</h2>
        <div class="font-semibold text-lg mt-2">10</div>
      </div>
    </div>
    <div class="h-40 w-80 bg-white rounded-2xl shadow-lg border-2 border-yellow-300">
      <div class="flex flex-col p-4 h-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M6.012 18H21V4a2 2 0 0 0-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1zM8 6h9v2H8V6z"></path>
        </svg>
        <h2 class="font-bold text-wrap overflow-wrap mt-2">Irs Belum Disetujui</h2>
        <div class="font-semibold text-lg mt-2">10</div>
      </div>
    </div>
  </div>
</body>
</html>