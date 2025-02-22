<?php
include_once '../Controller/crud_distribusi.php'; 
include_once "../Config/Koneksi.php";  

$distribusiController = new Distribusi();

$koneksi = new Koneksi();
$conn = $koneksi->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_motor = $_POST['nama_motor']; 
    $jumlah = $_POST['jumlah'];  
    $harga = $_POST['harga'];  
    $tujuan = $_POST['tujuan'];  
    $tanggal_kirim = $_POST['tanggal_kirim']; 
    $status = $_POST['status'];  

    if (empty($nama_motor) || empty($jumlah) || empty($harga) || empty($tujuan) || empty($tanggal_kirim) || empty($status)) {
        echo "Semua kolom harus diisi.";
        exit;
    }

    include_once "../Config/Koneksi.php";
    $koneksi = new Koneksi();
    $conn = $koneksi->getConnection();

    $sql_check = "SELECT jumlah_motor FROM tb_barang WHERE nama_motor = '$nama_motor'";
    $result = $conn->query($sql_check);
    $row = $result->fetch_assoc();

    if ($row && $jumlah <= $row['jumlah_motor']) {
        $new_jumlah_motor = $row['jumlah_motor'] - $jumlah;
        $sql_update = "UPDATE tb_barang SET jumlah_motor = $new_jumlah_motor WHERE nama_motor = '$nama_motor'";
        
        if ($conn->query($sql_update) === TRUE) {
            $distribusiController->create($nama_motor, $jumlah, $harga, $tujuan, $tanggal_kirim, $status);

            header("Location: ../Views/V_distribusi.php");
            exit();
        } else {
            echo "Error updating stock: " . $conn->error;
        }
    } else {
        echo "Jumlah barang yang diminta melebihi stok yang tersedia!";
        exit();
    }
}
?>
