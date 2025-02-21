<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun</title>
    <link rel="stylesheet" href="../Views/Layout/style7.css"> 
</head>
<body>
    <h2>Tambah Akun</h2>
    <form action="../Controller/AuthController.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" name="tambah_akun" value="Simpan Akun">
    </form> 

    <button onclick="window.location.href='../Views/V_login.php'">Kembali ke Login</button>
</body>
</html>
