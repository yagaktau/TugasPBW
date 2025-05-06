<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM krs WHERE id = '$id'");
    $data = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $mahasiswa_npm = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];

    $sql = "UPDATE krs SET mahasiswa_npm='$mahasiswa_npm', matakuliah_kodemk='$matakuliah_kodemk' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Data KRS berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Edit Data KRS</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    
    <label for="mahasiswa_npm">Mahasiswa:</label>
    <select name="mahasiswa_npm" required>
        <?php
        $result = $conn->query("SELECT npm, nama FROM mahasiswa");
        while ($row = $result->fetch_assoc()) {
            $selected = ($row['npm'] == $data['mahasiswa_npm']) ? 'selected' : '';
            echo "<option value='{$row['npm']}' $selected>{$row['nama']}</option>";
        }
        ?>
    </select>

    <label for="matakuliah_kodemk">Matakuliah:</label>
    <select name="matakuliah_kodemk" required>
        <?php
        $result = $conn->query("SELECT kodemk, nama FROM matakuliah");
        while ($row = $result->fetch_assoc()) {
            $selected = ($row['kodemk'] == $data['matakuliah_kodemk']) ? 'selected' : '';
            echo "<option value='{$row['kodemk']}' $selected>{$row['nama']}</option>";
        }
        ?>
    </select>

    <button type="submit">Simpan Perubahan</button>
</form>
