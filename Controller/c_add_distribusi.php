<?php
include_once '../Controller/crud_distribusi.php'; 
include_once "../Config/Koneksi.php";  

$distribusiController = new Distribusi();

$koneksi = new Koneksi();
$conn = $koneksi->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_motor = $_POST['nama_motor']; 
    $jumlah = $_POST['jumlah'];  
    $id_toko = $_POST['id_toko'];  
    $tanggal_kirim = $_POST['tanggal_kirim']; 

    if (empty($nama_motor) || empty($jumlah) || empty($id_toko) || empty($tanggal_kirim)) {
        echo "Semua kolom harus diisi.";
        exit;
    }

    // Perbaikan: Ambil juga harga
    $sql_check = "SELECT jumlah_motor, harga FROM tb_barang WHERE nama_motor = '$nama_motor'";
    $result = $conn->query($sql_check);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stok_tersedia = $row['jumlah_motor'];
        $harga = $row['harga']; // Ambil harga
        $total_harga = $harga * $jumlah;

        if ($jumlah > $stok_tersedia) {
            echo "<script type='text/javascript'>
                    alert('Jumlah barang yang diminta melebihi stok yang tersedia!');
                    setTimeout(function() { location.href='../Views/V_add_distribusi.php'; }, 1000);
                  </script>";
            exit();
        }

        $new_jumlah_motor = $stok_tersedia - $jumlah;
        $sql_update = "UPDATE tb_barang SET jumlah_motor = $new_jumlah_motor WHERE nama_motor = '$nama_motor'";

        if ($conn->query($sql_update) === TRUE) {
            if ($new_jumlah_motor == 0) {
                $sql_delete = "DELETE FROM tb_barang WHERE nama_motor = '$nama_motor'";
                if ($conn->query($sql_delete) !== TRUE) {
                    echo "Error deleting motor data: " . $conn->error;
                    exit();
                }
            }

            // Panggil fungsi create dengan total_harga
            $distribusiController->create($nama_motor, $jumlah, $tanggal_kirim, $id_toko, $total_harga);

            header("Location: ../Views/V_distribusi.php");
            exit();
        } else {
            echo "Error updating stock: " . $conn->error;
            exit();
        }
    } else {
        echo "<script type='text/javascript'>
                alert('Motor yang diminta tidak ditemukan dalam stok!');
                setTimeout(function() { location.href='../Views/V_add_distribusi.php'; }, 1000);
              </script>";
        exit();
    }
}
?>
