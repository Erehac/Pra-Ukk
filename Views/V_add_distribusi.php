<?php
include_once "../Config/Koneksi.php";  

$koneksi = new Koneksi();
$conn = $koneksi->getConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribusi Barang</title>
    <link rel="stylesheet" href="../Views/Layout/style10.css">
</head>
<body>
    <h1>Tambah Distribusi Barang</h1>
    <form method="POST" action="../Controller/c_add_distribusi.php">
        <label for="nama_motor">Nama Barang</label>
        <select name="nama_motor">
            <option>-----</option>
        <?php
            include_once "../Config/Koneksi.php"; 

            $koneksi = new koneksi(); 
            $conn = $koneksi->getConnection();

            $sql = "SELECT * FROM tb_barang";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "  <option>$row[nama_motor]</option>";
            } 
        ?>
        </select>

        <label for="jumlah">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" required><br>

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
        </select>

        <label for="tanggal_kirim">Tanggal Kirim</label>
        <input type="date" id="tanggal_kirim" name="tanggal_kirim" required><br>

        <button type="submit">Submit</button>
        <button type="button" onclick="window.location.href='V_distribusi.php';">Batal</button>

    </form>
</body>
</html>
