<?php
include_once '../Model/Detail.php';

class DetailController {
    private $model;

    public function __construct() {
        $this->model = new ModelDetail();
    }

    public function detail($id) {
        return $this->model->getById($id);
    }

    public function simpanStatus($id, $keterangan) {
        return $this->model->simpanKeterangan($id, $keterangan);
    }

    public function semuaDetail() {
        return $this->model->getAll();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_distribusi = $_POST['id_distribusi'] ?? null;
    $keterangan = $_POST['keterangan'] ?? '';

    if ($id_distribusi && $keterangan) {
        $controller = new DetailController();
        $result = $controller->simpanStatus($id_distribusi, $keterangan);

        if ($result) {
            header("Location: ../Views/V_distribusi.php");
            exit();
        } else {
            echo "❌ Gagal menyimpan keterangan ke detail distribusi.";
        }
    } else {
        echo "❗ Data tidak lengkap.";
    }
}
