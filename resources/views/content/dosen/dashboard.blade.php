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
  <div class="flex flex-wrap justify-self-center w-fit bg-gray-300 p-8 space-x-5 rounded-md">
    <div class="h-40 w-40 bg-white rounded-2xl"></div>
    <div class="h-40 w-40 bg-white rounded-2xl"></div>
    <div class="h-40 w-40 bg-white rounded-2xl"></div>
  </div>
</body>
</html>