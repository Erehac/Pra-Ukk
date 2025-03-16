<?php
include_once '../Config/Koneksi.php';

class Distribusi {
    private $conn;
    private $table = "tb_distribusi";

    public function __construct() {
        $db = new Koneksi();
        $this->conn = $db->getConnection();
    }

    public function create($nama_motor, $jumlah, $tujuan, $tanggal_kirim,) {
        if (empty($nama_motor) || empty($jumlah) || empty($tujuan) || empty($tanggal_kirim)) {
            die('Semua kolom harus diisi.');
        }

        $query = "INSERT INTO $this->table (nama_motor, jumlah, tujuan, tanggal_kirim) 
                  VALUES ('$nama_motor', $jumlah, '$tujuan', '$tanggal_kirim')";

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

    public function update($id_distribusi, $tujuan, $tanggal_kirim) {
        $query = "UPDATE $this->table SET tujuan = '$tujuan', tanggal_kirim = '$tanggal_kirim' WHERE id_distribusi = $id_distribusi";

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
