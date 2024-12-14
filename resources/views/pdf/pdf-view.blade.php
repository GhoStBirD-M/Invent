<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .text-bold-500 {
            font-weight: bold;
        }

        .table-responsive {
            overflow: auto;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <h2 style="text-align: center;">Laporan Barang</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Pemasok</th>
                            <th>Gudang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $index => $barang)
                            <tr>
                                <td>{{ $index + 1 }}.</td>
                                <td><img src="{{ asset('storage/' . $barang->img) }}" alt="Gambar Barang"
                                    style="width: 150px; height: auto;"></td>
                                <td class="text-bold-500">{{ $barang->nama }}</td>
                                <td>{{ $barang->harga }}</td>
                                <td>{{ $barang->deskripsi }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>{{ $barang->kategori->nama }}</td>
                                <td>{{ $barang->pemasok->nama }}</td>
                                <td>{{ $barang->gudang->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>