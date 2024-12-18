<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IRS Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { text-align: left; padding: 8px; }
        th { background-color: #f2f2f2; }
        .text-center { text-align: center; }
        .mt-4 { margin-top: 16px; }
    </style>
</head>
<body>
    <h2 class="text-center">Informasi IRS Mahasiswa</h2>
    <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
    <p><strong>Semester:</strong> {{ $filterSemester }}</p>
    <p><strong>Jumlah SKS:</strong> {{ $totalSKS }}</p>

    <h3 class="mt-4">Daftar IRS</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Kelas</th>
                <th>Ruang</th>
                <th>Status</th>
                <th>Jadwal</th>
                <th>Dosen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($irsData as $index => $irs)
            <tr>
                <td>{{ $loop->iteration }}</td>

                {{-- <td>{{ $irs->kode_mk }}</td>
                <td>{{ $irs->nama_mk }}</td>
                <td>{{ $irs->sks }}</td>
                <td>{{ $irs->kelas }}</td>
                <td>{{ $irs->ruang }}</td>
                <td>{{ $irs->status }}</td>
                <td>{{ $irs->jadwal }}</td>
                <td>{{ $irs->dosen }}</td> --}}
                <td>{{ $irs['kode_mk'] }}</td>
                <td>{{ $irs['nama_mk'] }}</td>
                <td>{{ $irs['sks'] }}</td>
                <td>{{ $irs['kelas'] }}</td>
                <td>{{ $irs['ruang'] }}</td>
                <td>{{ $irs['status'] }}</td>
                <td>{!! $irs['jadwal'] !!}</td> 
                <td>{!! $irs['dosen'] !!}</td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
