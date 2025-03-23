<?php
include_once '../Config/Koneksi.php';

class Supplier {
    private $conn;

    public function __construct() {
        $db = new Koneksi();
        $this->conn = $db->getConnection();
    }

    public function getAllToko() {
        $sql = "SELECT * FROM tb_toko";

        $result = $this->conn->query($sql);
        
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
