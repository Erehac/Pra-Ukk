<?php
include_once '../Model/Distribusi.php';

class DistribusiController {
    private $model;

    public function __construct() {
        $this->model = new Distribusi();
    }

    public function create($nama_motor, $jumlah, $tujuan, $tanggal_kirim, $id_toko) {
        return $this->model->create($nama_motor, $jumlah, $tujuan, $tanggal_kirim, $id_toko);
    }

    public function read() {
        return $this->model->read();  
    }

    public function readOne($id_distribusi) {
        return $this->model->readOne($id_distribusi);
    }

    public function update($id_distribusi, $tujuan, $tanggal_kirim) {
        return $this->model->update($id_distribusi, $tujuan, $tanggal_kirim);
    }

    public function delete($id_distribusi) {
        return $this->model->delete($id_distribusi);
    }

    public function deleteAndRestore($id, $conn) {
        $sql_get = "SELECT * FROM tb_distribusi WHERE id_distribusi = '$id'";
        $result = $conn->query($sql_get);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama_motor = $row['nama_motor'];
            $jumlah = $row['jumlah'];
    
            $sql_check = "SELECT jumlah_motor FROM tb_barang WHERE nama_motor = '$nama_motor'";
            $result_check = $conn->query($sql_check);
    
            if ($result_check->num_rows > 0) {
                $stok_tersedia = $result_check->fetch_assoc()['jumlah_motor'];
                $new_stok = $stok_tersedia + $jumlah;
                $conn->query("UPDATE tb_barang SET jumlah_motor = $new_stok WHERE nama_motor = '$nama_motor'");
            } else {
                $conn->query("INSERT INTO tb_barang (nama_motor, jumlah_motor) VALUES ('$nama_motor', $jumlah)");
            }
    
            $conn->query("DELETE FROM tb_distribusi WHERE id_distribusi = '$id'");
        }
    }
    
}
?>
