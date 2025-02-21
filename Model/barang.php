<?php
include_once '../Config/Koneksi.php';

class Barang {
    private $conn;

    public function __construct() {
        $db = new Koneksi();
        $this->conn = $db->getConnection();
    }

    public function create($nama_motor, $jumlah_motor, $harga, $tanggal_masuk, $id_supplier) {
        if (empty($nama_motor) || empty($jumlah_motor) || empty($harga) || empty($tanggal_masuk) || empty($id_supplier)) {
            die('Semua kolom harus diisi.');
        }
        
        $sql = "INSERT INTO tb_barang (nama_motor, jumlah_motor, harga, tanggal_masuk, id_supplier) 
                VALUES ('$nama_motor', '$jumlah_motor', '$harga', '$tanggal_masuk', '$id_supplier')";

        if ($this->conn->query($sql)) {
            return true;
        } else {
            die('Error executing query: ' . $this->conn->error);
        }
    }

    public function read() {
        $sql = "SELECT * FROM tb_barang, tb_supplier WHERE tb_barang.id_supplier = tb_supplier.id_supplier";
        return $this->conn->query($sql);
    }

    public function readOne($id) {
        $sql = "SELECT * FROM tb_barang WHERE id = $id";
        return $this->conn->query($sql)->fetch_assoc();
    }

    public function update($id, $nama_motor, $jumlah_motor, $harga, $tanggal_masuk, $id_supplier) {
        $sql = "UPDATE tb_barang 
                SET nama_motor = '$nama_motor', jumlah_motor = '$jumlah_motor', harga = '$harga', 
                    tanggal_masuk = '$tanggal_masuk', id_supplier = '$id_supplier'
                WHERE id = $id";
        
        if ($this->conn->query($sql)) {
            echo "Update berhasil!";
            return true;
        } else {
            echo "Error: " . $this->conn->error;
            return false;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM tb_barang WHERE id = $id";
        return $this->conn->query($sql);
    }
}
?>
