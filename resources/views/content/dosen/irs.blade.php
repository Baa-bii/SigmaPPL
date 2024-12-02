<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak IRS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>IRS Semester {{ $semester->semester }} - Tahun Akademik {{ $semester->tahun_akademik }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>Kelas</th>
                <th>SKS</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Ruang</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($irsData as $index => $ir)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $ir->matakuliah->kode_mk }}</td>
                <td>{{ $ir->matakuliah->nama_mk }}</td>
                <td>{{ $ir->jadwal->kelas ?? 'N/A' }}</td>
                <td>{{ $ir->matakuliah->sks }}</td>
                <td>{{ $ir->jadwal->hari ?? 'N/A' }}</td>
                <td>
                    @php
                        $jamMulai = \Carbon\Carbon::createFromFormat('H:i', $ir->jadwal->waktu->jam_mulai);
                        $jamSelesai = $jamMulai->copy()->addMinutes($ir->matakuliah->sks * 50);
                    @endphp
                    {{ $jamMulai->format('H:i') }} - {{ $jamSelesai->format('H:i') }}
                </td>
                <td>{{ $ir->jadwal->ruang->nama ?? 'N/A' }}</td>
                <td>{{ $ir->status_mata_kuliah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
