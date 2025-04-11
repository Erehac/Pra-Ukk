<?php
include_once '../Controller/c_detail.php';

$controller = new DetailController();
$dataDetail = $controller->semuaDetail();
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
        <div class="header">
            <h2>Data Details</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Detail</th>
                    <th>Id Distribusi</th>
                    <th>Nama Motor</th>
                    <th>Total harga</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dataDetail)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($dataDetail as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['id_detail']); ?></td>
                            <td><?= htmlspecialchars($row['id_distribusi']); ?></td>
                            <td><?= htmlspecialchars($row['nama_motor']); ?></td>
                            <td><?= htmlspecialchars($row['total_harga']); ?></td>
                            <td><?= htmlspecialchars($row['keterangan']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Tidak ada data detail distribusi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="back-btn-container">
            <a href="../dashboard.php" class="btn-back">Kembali ke Halaman Utama</a>
        </div>
    </div>

</body>
</html>