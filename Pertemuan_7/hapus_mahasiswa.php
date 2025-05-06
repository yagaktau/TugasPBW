<?php
include 'koneksi.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $sql = "DELETE FROM mahasiswa WHERE npm = '$npm'";
    if ($conn->query($sql) === TRUE) {
        echo "Mahasiswa berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
