<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
      <div class=""></div>
    </div>
    <div class="h-40 w-80 bg-white rounded-2xl shadow-lg border-2 border-yellow-300">
      <div class=""></div>
    </div>
    <div class="h-40 w-80 bg-white rounded-2xl shadow-lg border-2 border-yellow-300">
      <div class=""></div>
    </div>
  </div>
</body>
</html>