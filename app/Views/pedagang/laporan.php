<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pedagang</title>
    <style>
        .text-center {
            text-align: center;
        }

        .table {
            border: 1px solid #000;
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            padding: 8px;
            vertical-align: top;
            border: 1px solid #ddd;
        }

        .table thead th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        .table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .table .text-center {
            text-align: center;
        }

        .table .table-bordered {
            border: 1px solid #ddd;
        }

        .table .table-bordered th,
        .table .table-bordered td {
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Laporan Data Pedagang</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pasar</th>
                <th>Blok</th>
                <th>Klasifikasi</th>
                <th>Nama Pedagang</th>
                <th>Jk</th>
                <th>Ukuran</th>
                <th>Alamat</th>
                <th>Jenis Usaha</th>
                <th>Sertifikat</th>
                <th>Keterangan</th>
            </tr>
        <tbody>
            <?php
            $no = 1;
            foreach ($content as $p) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['nama_pasar'] ?></td>
                    <td><?= $p['nama_blok'] . '-' . 'NO.' . $p['no_blok'] ?></td>
                    <td><?= $p['klasifikasi'] ?></td>
                    <td><?= $p['nama_pedagang'] ?></td>
                    <td><?= $p['jk'] ?></td>
                    <td><?= $p['ukuran'] ?></td>
                    <td><?= $p['alamat'] ?></td>
                    <td><?= $p['jenis_usaha'] ?></td>
                    <td><?= $p['no_sertifikat'] ?></td>
                    <td><?= $p['keterangan'] ?></td>
                </tr>
            <?php endforeach ?>

        </tbody>
        </thead>
    </table>

    <!-- Tempusdominus Bootstrap 4 -->
</body>

</html>