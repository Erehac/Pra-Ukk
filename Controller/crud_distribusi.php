<?php
include_once '../Model/Distribusi.php';

class DistribusiController {
    private $model;

    public function __construct() {
        $this->model = new Distribusi();
    }

    public function create($nama_motor, $jumlah, $harga, $tujuan, $tanggal_kirim, $status) {
        return $this->model->create($nama_motor, $jumlah, $harga, $tujuan, $tanggal_kirim, $status);
    }

    public function read() {
        return $this->model->read();  
    }

    public function readOne($id_distribusi) {
        return $this->model->readOne($id_distribusi);
    }

    public function update($id_distribusi, $harga, $tujuan, $tanggal_kirim, $status) {
        return $this->model->update($id_distribusi, $harga, $tujuan, $tanggal_kirim, $status);
    }

    public function delete($id_distribusi) {
        return $this->model->delete($id_distribusi);
    }
}
?>
