<?php
include_once '../Config/Koneksi.php';
$koneksi = new Koneksi();
$conn = $koneksi->getConnection();

// Ambil data history
$data = $conn->query("SELECT * FROM tb_history ORDER BY id_history DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Distribusi (CRUD)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .table thead { background-color: #0d6efd; color: white; }
        .badge-create { background-color: #198754; }
        .badge-update { background-color: #ffc107; color: #000; }
        .badge-delete { background-color: #dc3545; }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-5">
    <h2 class="mb-4 text-center">History Distribusi & CRUD Log</h2>
    <div class="card shadow p-4 mb-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Motor</th>
                        <th>Jumlah</th>
                        <th>Tujuan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while($row = $data->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nama_motor']); ?></td>
                        <td><?= $row['jumlah']; ?></td>
                        <td><?= $row['tujuan'] ?: '-'; ?></td>
                        <td><?= $row['tanggal']; ?></td>
                        <td>
                            <?php if ($row['aksi'] == 'Create'): ?>
                                <span class="badge badge-create">Create</span>
                            <?php elseif ($row['aksi'] == 'Update'): ?>
                                <span class="badge badge-update">Update</span>
                            <?php elseif ($row['aksi'] == 'Delete'): ?>
                                <span class="badge badge-delete">Delete</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <a href="V_distribusi.php" class="btn btn-primary mt-3">Kembali ke Distribusi</a>
    </div>
</div>
</body>
</html>
