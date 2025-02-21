<?php
SESSION_START(); 
include "../Config/koneksi.php";

class Login extends koneksi {

    public function Login($username, $password) {
        $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";

        $eksekusi = $this->Query_Tampil($query);

        if ($eksekusi) {
            $_SESSION['username'] = $eksekusi['username']; 
            return true;
        } else {
            return false;
        }
    }

    public function tambah_akun($username, $password) {
        $query = "INSERT INTO tb_user (username, password) VALUES ('$username', '$password')";

        $eksekusi = $this->Query_Perintah($query);
        
        echo $query;

        return $eksekusi;
    }
}
?>
