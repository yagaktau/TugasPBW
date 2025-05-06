<?php
$conn = new mysqli("localhost", "root", "", "db_kuliah");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
