<?php
include 'koneksi.php';

if (isset($_GET['kodemk'])) {
    $kodemk = $_GET['kodemk'];
    $sql = "DELETE FROM matakuliah WHERE kodemk = '$kodemk'";
    if ($conn->query($sql) === TRUE) {
        echo "Matakuliah berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
