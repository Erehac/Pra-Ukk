<?php
include_once '../Controller/crud_distribusi.php';
include_once '../Config/Koneksi.php';

$distribusiController = new DistribusiController();
$koneksi = new Koneksi();
$conn = $koneksi->getConnection();

if (isset($_GET['id_distribusi'])) {
    $id = $_GET['id_distribusi'];

    // Hapus data distribusi dan restore stok
    $distribusiController->deleteAndRestore($id, $conn);

    // Redirect setelah penghapusan
    header("Location: ../Views/V_distribusi.php");
    exit();
} else {
    echo "ID tidak ditemukan.";
}
?>