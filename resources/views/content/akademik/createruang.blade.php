<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Ruang</title>
</head>
<body>
    <x-header></x-header>
    <x-sidebar></x-sidebar>

    <main class="p-16 md:ml-64 h-auto pt-20">
        <div class="m-6">
            <label for="nama" class="form-label font-sans font-medium">Nama Ruang: </label>
            <input type="text" class="rounded-lg w-full" required>
        </div>
        <div class="m-6">
            <label for="gedung" class="form-label font-sans font-medium">Gedung: </label>
            <select name="gedung" id="gedung" class="rounded-lg w-full" required>
                <option value="">Select Gedung</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
        </div>
        <div class="m-6">
            <label for="kapasitas" class="form-label font-sans font-medium">Kapasitas: </label>
            <input type="number" id="kapasitas" name="kapasitas" class="rounded-lg w-full" min="1" required>
        </div>
        <div class="m-6">
            <label for="prodi" class="form-label font-sans font-medium">Prodi: </label>
            <select id="prodi" name="prodi" class="rounded-lg w-full" required>
                <option value="">Select Prodi</option>
                @foreach ($programStudi as $prodi)
                <option value="prodi1">{{$prodi->nama_prodi}}</option>
                @endforeach
                
            </select>
        </div>
        
        <div>
            <a href="#">
                <button class="bg-blue-500 p-2 text-white rounded hover:bg-blue-600" type="submit">
                Tambahkan
                </button>
            </a>
        </div>
    </main>
</body>
</html>