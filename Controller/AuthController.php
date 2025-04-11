<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
   require_once __DIR__ . '/../Model/User.php';

    $user = new Login();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $aksi = $user->login($username, $password);

        if ($aksi) {
            $_SESSION['username'] = $username;
            ?>
            <script type="text/javascript">
                alert('Anda Berhasil Login');
                setTimeout("location.href='../dashboard.php'", 1000); 
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert('Username dan Password salah');
                setTimeout("location.href='../index.php'", 1000);
            </script>
            <?php
        }
    }

    if (isset($_GET['aksi']) && $_GET['aksi'] == 'logout') {
        session_destroy();
        ?>
        <script type="text/javascript">
            alert('Anda telah keluar dari system');
            setTimeout("location.href='../index.php'", 1000);
        </script>
        <?php
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_akun'])) {
        $username = $_POST['username'];
        $password = $_POST['password']; 
    
        $aksi = $user->tambah_akun($username, $password);
    
        if ($aksi) {
            ?>
            <script type="text/javascript">
                alert('Akun berhasil ditambahkan');
                setTimeout("location.href='../Views/V_login.php'", 1000);
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert('Username sudah terdaftar, silakan pilih username lain.');
                setTimeout("location.href='../Views/V_registrasi.php'", 1000);
            </script>
            <?php     
        }
    }
?>
