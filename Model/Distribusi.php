<?php
include_once '../Config/Koneksi.php';

class Distribusi {
    private $conn;
    private $table = "tb_distribusi";

    public function __construct() {
        $db = new Koneksi();
        $this->conn = $db->getConnection();
    }

    public function create($nama_motor, $jumlah, $tanggal_kirim, $id_toko, $total_harga) {
        if (empty($nama_motor) || empty($jumlah) || empty($tanggal_kirim) || empty($id_toko)) {
            die('Semua kolom harus diisi.');
        }

        $query = "INSERT INTO $this->table (nama_motor, jumlah, tanggal_kirim, id_toko, total_harga) 
                  VALUES ('$nama_motor', $jumlah, '$tanggal_kirim', '$id_toko', $total_harga)";

        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            die('Error executing query: ' . $this->conn->error);
        }
    }

    public function read() {
        $query = "SELECT * FROM tb_distribusi 
                  JOIN tb_toko ON tb_distribusi.id_toko = tb_toko.id_toko";
        return $this->conn->query($query);
    }

    public function readOne($id_distribusi) {
        $query = "SELECT * FROM $this->table WHERE id_distribusi = $id_distribusi";
        return $this->conn->query($query)->fetch_assoc();
    }

    public function update($id_distribusi, $tanggal_kirim, $id_toko) {
        $query = "UPDATE $this->table 
                  SET tanggal_kirim = '$tanggal_kirim', id_toko = '$id_toko' 
                  WHERE id_distribusi = $id_distribusi";

        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            die('Error executing query: ' . $this->conn->error);
        }
    }

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id_distribusi = $id";
        
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            die('Error executing delete: ' . $this->conn->error);
        }
    }
}
?>
