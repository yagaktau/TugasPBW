<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar KRS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Daftar KRS</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT 
                        mahasiswa.npm, 
                        mahasiswa.nama AS nama_mahasiswa, 
                        matakuliah.nama AS nama_matakuliah, 
                        matakuliah.jumlah_sks 
                    FROM krs
                    JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
                    JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
                    ORDER BY mahasiswa.npm ASC"; // Mengurutkan berdasarkan NPM
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    $keterangan = "{$row['nama_mahasiswa']} mengambil mata kuliah {$row['nama_matakuliah']} ({$row['jumlah_sks']} SKS)";
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama_mahasiswa']}</td>
                            <td>{$row['nama_matakuliah']}</td>
                            <td>{$keterangan}</td>
                          </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='4'>Belum ada data KRS.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <a href="mahasiswa/tambah.php">Tambah Mahasiswa</a> | 
        <a href="matakuliah/tambah.php">Tambah Mata Kuliah</a> | 
        <a href="krs/tambah.php">Tambah KRS</a>
    </div>
</body>
</html>
