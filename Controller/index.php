<?php
// index.php

// Memasukkan kelas koneksi
include_once '../Config/Koneksi.php'; // Koneksi database
include_once '../controller/crud_motor.php'; // Controller untuk barang

// Membuat objek koneksi
$db = new koneksi();
$conn = $db->getConnection(); // Mendapatkan koneksi database

// Inisialisasi controller
$barangController = new BarangController($conn);

// Cek apakah ID diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Menangani logika edit data motor
    $barangController->update($id, $nama_motor, $jumlah_motor, $harga, $tanggal_masuk, $id_distributor);
} else {
    die("ID tidak diberikan");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_motor = $_POST['nama_motor'];
    $jumlah_motor = $_POST['jumlah_motor'];
    $harga = $_POST['harga'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tanggal_keluar = $_POST['tanggal_keluar'];

    $barangController->update($id, $nama_motor, $jumlah_motor, $harga, $tanggal_masuk, $tanggal_keluar);

    header("Location: tampil.php");
    exit(); 
}
?>
