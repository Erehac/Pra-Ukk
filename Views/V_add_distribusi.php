<?php
include_once "../Config/Koneksi.php";  

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

        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" required><br>

        <label for="tujuan">Tujuan</label>
        <input type="text" id="tujuan" name="tujuan" required><br>

        <label for="tanggal_kirim">Tanggal Kirim</label>
        <input type="date" id="tanggal_kirim" name="tanggal_kirim" required><br>

        <label for="status">Status</label>
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

        <button type="submit">Submit</button>
        <button type="button" onclick="window.location.href='V_distribusi.php';">Batal</button>

    </form>
</body>
</html>
