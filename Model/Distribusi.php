<?php
include_once '../Config/Koneksi.php';

class Distribusi {
    private $conn;
    private $table = "tb_distribusi";

    public function __construct() {
        $db = new Koneksi();
        $this->conn = $db->getConnection();
    }

    public function create($nama_barang, $jumlah, $harga, $tujuan, $tanggal_kirim, $status) {
        if (empty($nama_barang) || empty($jumlah) || empty($harga) || empty($tujuan) || empty($tanggal_kirim) || empty($status)) {
            die('Semua kolom harus diisi.');
        }

        $query = "INSERT INTO $this->table (nama_barang, jumlah, harga, tujuan, tanggal_kirim, status) 
                  VALUES ('$nama_barang', $jumlah, $harga, '$tujuan', '$tanggal_kirim', '$status')";

        if ($this->conn->query($query)) {
            return true;
        } else {
            die('Error executing query: ' . $this->conn->error);
        }
    }

    public function read() {
        $query = "SELECT * FROM $this->table";
        return $this->conn->query($query);
    }

    public function readOne($id_distribusi) {
        $query = "SELECT * FROM $this->table WHERE id_distribusi = $id_distribusi";
        return $this->conn->query($query)->fetch_assoc();
    }

    public function update($id_distribusi, $nama_barang, $jumlah, $harga, $tujuan, $tanggal_kirim, $status) {
        $query = "UPDATE $this->table SET 
                  nama_barang = '$nama_barang', jumlah = $jumlah, harga = $harga, tujuan = '$tujuan', 
                  tanggal_kirim = '$tanggal_kirim', status = '$status' WHERE id_distribusi = $id_distribusi";

        if ($this->conn->query($query)) {
            return true;
        } else {
            die('Error executing query: ' . $this->conn->error);
        }
    }

    public function delete($id_distribusi) {
        $query = "DELETE FROM $this->table WHERE id_distribusi = $id_distribusi";
        return $this->conn->query($query);
    }
}
?>
