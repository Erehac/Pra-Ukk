<?php
include_once '../Controller/crud_motor.php';

$barangController = new BarangController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_motor = $_POST['nama_motor'];
    $jumlah_motor = $_POST['jumlah_motor'];
    $harga = $_POST['harga'];
    $tanggal_masuk = $_POST['tanggal_masuk']; 
    $id_supplier = $_POST['id_supplier'];

    if (empty($nama_motor) || empty($jumlah_motor) || empty($harga) || empty($tanggal_masuk) || empty($tanggal_masuk) || empty($id_supplier)) {
        echo "Semua kolom harus diisi.";
        exit;
    }

    $barangController->create($nama_motor, $jumlah_motor, $harga, $tanggal_masuk, $id_supplier);

    header("Location: tampil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        button {
            background-color:rgb(8, 159, 48);
            color: white;
            cursor: pointer;
            font-size: 16px;
            border: 2px solid #4CAF50; /* Border to ensure the button is visible */
            transition: background-color 0.3s, border-color 0.3s;
            text-align: center;
        }

        button:hover {
            background-color: #45a049;
            border-color: #45a049; /* Border color change on hover */
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            form {
                padding: 15px;
                max-width: 100%;
            }

            h1 {
                font-size: 1.5em;
            }
        }

        @media (max-width: 480px) {
            form {
                padding: 10px;
                max-width: 100%;
            }

            h1 {
                font-size: 1.2em;
            }

            label, input, select {
                font-size: 14px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h1>Tambah Barang</h1>
    <form method="POST" action="">
        <label for="nama_motor">NAMA MOTOR</label>
        <input type="text" id="nama_motor" name="nama_motor" required><br>

        <label for="jumlah_motor">JUMLAH MOTOR</label>
        <input type="number" id="jumlah_motor" name="jumlah_motor" required><br>

        <label for="harga">HARGA</label>
        <input type="number" id="harga" name="harga" required><br>

        <label for="id_supplierr">ID SUPPPLIER</label>
        <input type="number" id="id_supplier" name="id_supplier" required><br>

        <label for="tanggal_masuk">TANGGAL MASUK</label>
        <input type="date" id="tanggal_masuk" name="tanggal_masuk" required><br>

        <button type="submit">Submit</button>
        <button type="submit"><a href="tampil.php">Batal</a></button>
    </form>
</body>
</html>
