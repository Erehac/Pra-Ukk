<?php
include_once '../Config/Koneksi.php';

$id_distribusi = $_GET['id_distribusi'] ?? 0;
$conn = (new Koneksi())->getConnection();

$query = "SELECT d.*, t.nama_toko FROM tb_distribusi d
          JOIN tb_toko t ON d.id_toko = t.id_toko
          WHERE d.id_distribusi = $id_distribusi";
$result = $conn->query($query);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Distribusi</title>
    <link rel="stylesheet" href="../Views/Layout/style11.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Detail Distribusi</h2>

        <?php if ($data): ?>
        <form action="../Controller/c_detail.php" method="POST">
            <input type="hidden" name="id_distribusi" value="<?= $data['id_distribusi'] ?>">

            <p><strong>Nama Motor:</strong> <?= $data['nama_motor'] ?></p>
            <p><strong>Jumlah:</strong> <?= $data['jumlah'] ?></p>
            <p><strong>Total Harga:</strong> Rp <?= number_format($data['total_harga'], 0, ',', '.') ?></p>
            <p><strong>Dealer:</strong> <?= $data['nama_toko'] ?></p>
            <p><strong>Tanggal Kirim:</strong> <?= $data['tanggal_kirim'] ?></p>

            <label for="keterangan"><strong>Status Distribusi:</strong></label>
            <select name="keterangan" required>
                <option value="">-- Pilih Status --</option>
                <option value="Dikembalikan">Dikembalikan</option>
                <option value="Diperjalanan">Diperjalanan</option>
                <option value="Terkirim">Terkirim</option>
            </select><br><br>

            <div class="back-btn-container">
            <button type="submit" class="btn-add">Simpan</button>
            <a href="V_distribusi.php" class="btn-back">Kembali</a>
            </div>
        </form>
        <?php else: ?>
            <p>Data tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</body>
</html>
