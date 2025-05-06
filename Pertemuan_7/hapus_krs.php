<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM krs WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Data KRS berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<a href="index.php">Kembali ke Daftar KRS</a>
