<?php
include_once '../Controller/crud_distribusi.php';
include_once "../Config/Koneksi.php";  

$distribusiController = new DistribusiController();
$koneksi = new Koneksi();
$conn = $koneksi->getConnection();

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
    $tanggal_kirim = $_POST['tanggal_kirim'];
    $id_toko = $_POST['id_toko'];

    $distribusiController->update($id_distribusi, $tanggal_kirim, $id_toko);

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
        <label for="nama_motor">NAMA BARANG</label>
        <span id="nama_motor"><?= htmlspecialchars($distribusi['nama_motor']) ?></span><br><br>

        <label for="jumlah">JUMLAH</label>
        <span id="jumlah"><?= htmlspecialchars($distribusi['jumlah']) ?></span><br><br>

        <label for="id_toko">NAMA DEALER</label>
        <select name="id_toko">
            <option>-----</option>
        <?php
            include_once "../Config/Koneksi.php"; 

            $koneksi = new koneksi(); 
            $conn = $koneksi->getConnection();

            $sql = "SELECT * FROM tb_toko";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "  <option value=$row[id_toko]>$row[nama_toko]</option>";
            } 
        ?>
        </select><br>

        <label for="tanggal_kirim">TANGGAL KIRIM</label>
        <input type="date" id="tanggal_kirim" name="tanggal_kirim" value="<?= htmlspecialchars($distribusi['tanggal_kirim']) ?>" required><br>

        <button type="submit">Update</button>
    </form>

    <div class="back-btn-container">
        <a href="V_distribusi.php" class="btn-back">Kembali ke Daftar Motor</a>
    </div>
</div>

</body>
</html>
