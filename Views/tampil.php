<?php
include_once '../Controller/crud_motor.php';

$barang = new BarangController();
$result = $barang->read();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Motor</title>
    <link rel="stylesheet" href="../Views/Layout/style2.css">
</head>
<body>

    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="header">
            <h2>Daftar Motor dan Supplier</h2>
            <a href="V_add.php" class="btn-add">Tambah Data</a>
        </div>
        <table class="motor-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA MOTOR</th>
                    <th>JUMLAH MOTOR</th>
                    <th>HARGA PERMOTOR</th>
                    <th>NAMA SUPPLIER</th>
                    <th>TANGGAL MASUK</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                <?php foreach ($result as $barang) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($barang['nama_motor']); ?></td>
                    <td><?= htmlspecialchars($barang['jumlah_motor']); ?></td>
                    <td><?= 'Rp ' . number_format($barang['harga'], 0, ',', '.'); ?></td>
                    <td><?= htmlspecialchars($barang['nama_supplier']); ?></td>
                    <td><?= htmlspecialchars($barang['tanggal_masuk']); ?></td>
                    <td>
                        <a href="V_edit.php?id=<?= $barang["id"]?>" class="btn-action">Edit</a>
                        <a href="delete.php?id=<?= $barang["id"]?>" class="btn-aksi">Delete</a>
                    </td>
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
