<?php
include_once '../Controller/crud_distribusi.php';

$distribusiController = new DistribusiController();

if (isset($_GET['id_distribusi'])) {
    $id_distribusi = $_GET['id_distribusi'];
    $distribusi = $distribusiController->readOne($id_distribusi);

    if (!$distribusi) {
        die("Data tidak ditemukan");
    }
} else {
    die("ID tidak diberikan");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tujuan = $_POST['tujuan'];
    $tanggal_kirim = $_POST['tanggal_kirim'];
    $status = $_POST['status'];

    $distribusiController->update($id_distribusi, $nama_barang, $jumlah, $harga, $tujuan, $tanggal_kirim, $status);

    header("Location: V_distribusi.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Distribusi</title>
    <link rel="stylesheet" href="../Views/Layout/style9.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Edit Data Distribusi</h2>
    </div>
    
    <form method="POST" action="">
        <label for="nama_barang">NAMA BARANG</label>
        <input type="text" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($distribusi['nama_barang']) ?>" required><br>

        <label for="jumlah">JUMLAH</label>
        <input type="number" id="jumlah" name="jumlah" value="<?= htmlspecialchars($distribusi['jumlah']) ?>" required><br>

        <label for="harga">HARGA</label>
        <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($distribusi['harga']) ?>" required><br>

        <label for="tujuan">TUJUAN</label>
        <input type="text" id="tujuan" name="tujuan" value="<?= htmlspecialchars($distribusi['tujuan']) ?>" required><br>

        <label for="tanggal_kirim">TANGGAL KIRIM</label>
        <input type="date" id="tanggal_kirim" name="tanggal_kirim" value="<?= htmlspecialchars($distribusi['tanggal_kirim']) ?>" required><br>

        <label for="status">STATUS</label>
        <input type="text" id="status" name="status" value="<?= htmlspecialchars($distribusi['status']) ?>" required><br>

        <button type="submit">Update</button>
    </form>
    <div class="back-btn-container">
        <a href=".php" class="btn-back">Kembali ke Daftar Motor</a>
    </div>
</div>

</body>
</html>
