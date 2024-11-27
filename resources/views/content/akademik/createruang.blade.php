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
        <form action="{{ route('akademik.ruang.store') }}" method="POST">
            @csrf
            <div class="m-6">
                <label for="nama" class="form-label font-sans font-medium">Nama Ruang: </label>
                <input type="text" name="nama" class="rounded-lg w-full" value="{{ old('nama', $ruangKelas->nama ?? '') }}" required>
            </div>
            <div class="m-6">
                <label for="gedung" class="form-label font-sans font-medium">Gedung: </label>
                <select name="gedung" id="gedung" class="rounded-lg w-full" required>
                    <option value="">Select Gedung</option>
                    @foreach (['A', 'B', 'C', 'D', 'E','F','G','H','I','J','K'] as $gedung)
                        <option value="{{ $gedung }}" {{ (old('gedung', $ruangKelas->gedung ?? '') == $gedung) ? 'selected' : '' }}>
                            {{ $gedung }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="m-6">
                <label for="kapasitas" class="form-label font-sans font-medium">Kapasitas: </label>
                <input type="number" name="kapasitas" id="kapasitas" class="rounded-lg w-full" min="1" value="{{ old('kapasitas', $ruangKelas->kapasitas ?? '') }}" required>
            </div>
            <div class="m-6">
                <label for="kode_prodi" class="form-label font-sans font-medium">Prodi: </label>
                <select id="kode_prodi" name="kode_prodi" class="rounded-lg w-full" required>
                    <option value="">Select Prodi</option>
                    @foreach ($programStudi as $prodi)
                        <option value="{{ $prodi->kode_prodi }}" {{ (old('kode_prodi', $ruangKelas->kode_prodi ?? '') == $prodi->kode_prodi) ? 'selected' : '' }}>
                            {{ $prodi->nama_prodi }}
                        </option>
                    @endforeach
                </select>
            </div>
        <div>
                <button class="bg-blue-500 p-2 text-white rounded hover:bg-blue-600" type="submit">
                Tambahkan
                </button>
        </div>
    </form>
    </main>
</body>
</html>