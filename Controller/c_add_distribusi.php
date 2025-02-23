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

    // Koneksi ke database untuk cek stok motor
    $sql_check = "SELECT jumlah_motor FROM tb_barang WHERE nama_motor = '$nama_motor'";
    $result = $conn->query($sql_check);
    
    // Jika motor ditemukan di database
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stok_tersedia = $row['jumlah_motor'];

        // Cek apakah jumlah yang diminta lebih dari stok yang tersedia
        if ($jumlah > $stok_tersedia) {
            echo "<script type='text/javascript'>
                    alert('Jumlah barang yang diminta melebihi stok yang tersedia!');
                    setTimeout(function() { location.href='../Views/V_add_distribusi.php'; }, 1000);
                  </script>";
            exit();
        }

        // Update jumlah stok setelah distribusi
        $new_jumlah_motor = $stok_tersedia - $jumlah;
        $sql_update = "UPDATE tb_barang SET jumlah_motor = $new_jumlah_motor WHERE nama_motor = '$nama_motor'";

        if ($conn->query($sql_update) === TRUE) {
            // Jika jumlah_motor menjadi 0, hapus data motor tersebut
            if ($new_jumlah_motor == 0) {
                $sql_delete = "DELETE FROM tb_barang WHERE nama_motor = '$nama_motor'";
                if ($conn->query($sql_delete) !== TRUE) {
                    echo "Error deleting motor data: " . $conn->error;
                    exit();
                }
            }

            // Proses distribusi barang (tetap input ke tabel tb_distribusi)
            $distribusiController->create($nama_motor, $jumlah, $harga, $tujuan, $tanggal_kirim, $status);

            // Redirect ke halaman distribusi
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
