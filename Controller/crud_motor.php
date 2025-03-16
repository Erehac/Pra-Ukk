<?php
include_once '../Model/barang.php';

class BarangController {
    private $barang;

    public function __construct() {
        $this->barang = new Barang();
    } 

    public function create($nama_motor, $jumlah_motor, $tanggal_masuk, $id_supplier) {
        return $this->barang->create($nama_motor, $jumlah_motor, $tanggal_masuk, $id_supplier);
    }

    public function read() {
        return $this->barang->read();
    }

    public function readOne($id) {
        return $this->barang->readOne($id);
    }

    public function update($id, $nama_motor, $jumlah_motor, $tanggal_masuk, $id_supplier) {
        return $this->barang->update($id, $nama_motor, $jumlah_motor, $tanggal_masuk, $id_supplier);
    }

    public function delete($id) {
        return $this->barang->delete($id);
    }
}
?>