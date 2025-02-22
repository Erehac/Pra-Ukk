<?php
include_once '../Controller/crud_distribusi.php';

$distribusiController = new DistribusiController();

$distribusi = $distribusiController->read();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Distribusi</title>
    <link rel="stylesheet" href="../Views/Layout/style8.css">
</head>
<body>
    
    <?php include 'navbar.php'; ?>
    <div class="container">

        <h2>Data Distribusi</h2>

        <div class="add-button-container">
            <a href="V_add_distribusi.php" class="btn-add">Tambah Data</a>
        </div>

        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Tujuan</th>
                    <th>Tanggal Kirim</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($distribusi->num_rows > 0): ?>
                    <?php $no = 1; ?>
                    <?php while ($row = $distribusi->fetch_assoc()): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama_motor']); ?></td>
                            <td><?= htmlspecialchars($row['jumlah']); ?></td>
                            <td>Rp. <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td><?= htmlspecialchars($row['tujuan']); ?></td>
                            <td><?= htmlspecialchars($row['tanggal_kirim']); ?></td>
                            <td><?= htmlspecialchars($row['status']); ?></td>
                            <td>
                                <a href="V_edit_distribusi.php?id_distribusi=<?= $row['id_distribusi']?>" class="btn-action">Edit</a>
                                <a href="V_delete.php?id_distribusi=<?= $row['id_distribusi']?>" class="btn-aksi">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Data tidak ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="back-btn-container">
            <a href="dashboard.php" class="btn-back">Kembali ke Halaman Utama</a>
        </div>
    </div>

</body>
</html>
