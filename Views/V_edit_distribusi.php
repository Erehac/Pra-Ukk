<?php
include_once '../Controller/crud_distribusi.php';
include_once "../Config/Koneksi.php";  

$distribusiController = new DistribusiController();
$koneksi = new Koneksi();
$conn = $koneksi->getConnection();

$sql_enum = "SHOW COLUMNS FROM tb_distribusi LIKE 'status'";
$result_enum = $conn->query($sql_enum);  
$row_enum = $result_enum->fetch_assoc(); 

$enum_values = null;
if ($row_enum) {
    preg_match_all("/'([^']+)'/", $row_enum['Type'], $matches);
    $enum_values = $matches[1]; 
}

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
    $harga = $_POST['harga'];
    $tujuan = $_POST['tujuan'];
    $tanggal_kirim = $_POST['tanggal_kirim'];
    $status = $_POST['status'];

    $distribusiController->update($id_distribusi, $harga, $tujuan, $tanggal_kirim, $status);

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

        <label for="harga">HARGA</label>
        <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($distribusi['harga']) ?>" required><br>

        <label for="tujuan">TUJUAN</label>
        <input type="text" id="tujuan" name="tujuan" value="<?= htmlspecialchars($distribusi['tujuan']) ?>" required><br>

        <label for="tanggal_kirim">TANGGAL KIRIM</label>
        <input type="date" id="tanggal_kirim" name="tanggal_kirim" value="<?= htmlspecialchars($distribusi['tanggal_kirim']) ?>" required><br>

        <label for="status">STATUS</label>
        <select name="status" id="status" required>
        <option>-----</option>
            <?php
            if ($enum_values) {
                foreach ($enum_values as $value) {
                    echo "<option value='$value'>$value</option>";
                }
            }
            ?>
        </select><br>

        <button type="submit">Update</button>
    </form>

    <div class="back-btn-container">
        <a href="V_distribusi.php" class="btn-back">Kembali ke Daftar Motor</a>
    </div>
</div>

</body>
</html>
