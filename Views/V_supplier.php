<?php
include_once '../Model/Supplier.php';

$supplier = new Supplier();
$result = $supplier->getAllSuppliers();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Distribusi</title>
    <link rel="stylesheet" href="../Views/Layout/style2.css">
</head>
<body>

    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="header">
            <h2>Data Supplier</h2>
        </div>
        <table class="motor-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA SUPPPLIER</th>
                    <th>NO TELPON</th>
                    <th>ALAMAT</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                <?php foreach ($result as $barang) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($barang['nama_supplier']); ?></td>
                    <td><?= htmlspecialchars($barang['no_telpon']); ?></td>
                    <td><?= htmlspecialchars($barang['alamat']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="back-btn-container">
            <a href="../dashboard.php" class="btn-back">Kembali ke Halaman Utama</a>
        </div>
    </div>

</body>
</html>
