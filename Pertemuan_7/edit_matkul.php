<?php
include 'koneksi.php';

if (isset($_GET['kodemk'])) {
    $kodemk = $_GET['kodemk'];
    $result = $conn->query("SELECT * FROM matakuliah WHERE kodemk = '$kodemk'");
    $data = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];

    $sql = "UPDATE matakuliah SET nama='$nama', jumlah_sks='$jumlah_sks' WHERE kodemk='$kodemk'";
    if ($conn->query($sql) === TRUE) {
        echo "Matakuliah berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="POST">
    <input type="hidden" name="kodemk" value="<?php echo $data['kodemk']; ?>">
    <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
    <input type="number" name="jumlah_sks" value="<?php echo $data['jumlah_sks']; ?>" required>
    <button type="submit">Edit</button>
</form>
