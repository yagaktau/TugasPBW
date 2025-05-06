<?php
include 'koneksi.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $result = $conn->query("SELECT * FROM mahasiswa WHERE npm = '$npm'");
    $data = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'";
    if ($conn->query($sql) === TRUE) {
        echo "Mahasiswa berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="POST">
    <input type="hidden" name="npm" value="<?php echo $data['npm']; ?>">
    <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
    <select name="jurusan">
        <option value="Teknik Informatika" <?php echo ($data['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
        <option value="Sistem Operasi" <?php echo ($data['jurusan'] == 'Sistem Operasi') ? 'selected' : ''; ?>>Sistem Operasi</option>
    </select>
    <textarea name="alamat"><?php echo $data['alamat']; ?></textarea>
    <button type="submit">Edit</button>
</form>
