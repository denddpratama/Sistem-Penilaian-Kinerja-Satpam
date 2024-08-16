<!DOCTYPE html>
<html>
<head>
    <title>Rekap Peringkat Satpam</title>
    <style>
        /* Styling untuk halaman cetak */
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Rekap Peringkat Satpam Periode {{ $selectedPeriode }}</h2>

<table>
    <thead>
        <tr>
            <th>Peringkat</th>
            <th>Nama | NRP</th>
            <th>Score</th>
            <th>Peringatan</th>
            <th>Rasio</th>
            <th>Rekomendasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $item)
            <tr>
                <td>{{ $item['rank'] }}</td>
                <td>{{ $item['nama'] }} | {{ $item['nrp_satpam'] }}</td>
                <td>{{ $item['score'] }}</td>
                <td>{{ $item['surat_peringatan'] }}</td>
                <td>{{ $item['rasio_kehadiran'] }}%</td>
                <td>{{ $item['recommendation'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
