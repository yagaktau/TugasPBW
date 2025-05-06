<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];

    $sql = "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES ('$kodemk', '$nama', '$jumlah_sks')";
    if ($conn->query($sql) === TRUE) {
        echo "Matakuliah berhasil ditambahkan!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="POST">
    <input type="text" name="kodemk" placeholder="Kode MK">
    <input type="text" name="nama" placeholder="Nama Matakuliah">
    <input type="number" name="jumlah_sks" placeholder="SKS">
    <button type="submit">Tambah</button>
</form>
