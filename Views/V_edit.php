<?php
include_once '../controller/crud_motor.php';

$barangController = new BarangController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $barang = $barangController->readOne($id);

    if (!$barang) {
        die("Data tidak ditemukan");
    }
} else {
    die("ID tidak diberikan");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_motor = $_POST['nama_motor'];
    $jumlah_motor = $_POST['jumlah_motor'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $id_supplier = $_POST['id_supplier'];

    $barangController->update($id, $nama_motor, $jumlah_motor, $tanggal_masuk, $id_supplier);

    header("Location: tampil.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Motor</title>
    <link rel="stylesheet" href="../Views/Layout/style5.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Edit Data Motor</h2>
    </div>
    
    <form method="POST" action="">
        <label for="nama_motor">NAMA MOTOR</label>
        <input type="text" id="nama_motor" name="nama_motor" value="<?= htmlspecialchars($barang['nama_motor']) ?>" required><br>

        <label for="jumlah_motor">JUMLAH MOTOR</label>
        <input type="number" id="jumlah_motor" name="jumlah_motor" value="<?= htmlspecialchars($barang['jumlah_motor']) ?>" required><br>
        
        <label for="tanggal_masuk">TANGGAL MASUK</label>
        <input type="Date" id="tanggal_masuk" name="tanggal_masuk" value="<?= htmlspecialchars($barang['tanggal_masuk']) ?>" required><br>
        
        <label for="id_supplierr">NAMA SUPPPLIER</label>
        <select name="id_supplier">
            <option>-----</option>
        <?php
            include_once "../Config/Koneksi.php"; 

            $koneksi = new koneksi(); 
            $conn = $koneksi->getConnection();

            $sql = "SELECT * FROM tb_supplier";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "  <option value=$row[id_supplier]>$row[nama_supplier]</option>";
            } 
        ?>
        </select>
        <br>
        <br>

        <button type="submit">Update</button>
    </form>

    <div class="back-btn-container">
        <a href="tampil.php" class="btn-back">Kembali ke Daftar Motor</a>
    </div>
</div>

</body>
</html>
