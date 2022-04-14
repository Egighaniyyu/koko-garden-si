<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak PDF</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid rgb(20, 20, 20);
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        table tr td,
        table tr th{
            font-size: 9pt;
        }

        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>
<body>
    <center>
        <h3>Report Penjualan Tanaman</h3>
    </center>
    <table>
        <tr>
            <th>No.</th>
            <th>ID Penjualan</th>
            <th>ID Costumer</th>
            <th>ID Tanaman</th>
            <th>Nama Tanaman</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($penjualan_tanaman as $no => $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data -> id_transaksi}}</td>
            <td>{{$data -> id_costumer}}</td>
            <td>{{$data -> id_tanaman}}</td>
            <td>{{$data -> nama_tanaman}}</td>
            <td>{{$data -> jumlah}}</td>
            <td>{{$data -> total}}</td>
            <td>{{$data -> tanggal}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>

