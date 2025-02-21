<DOCTYPE html>
<html>
<head>
    <title>Login page</title>
</head>
<body>
    <form action="../Controller/AuthController.php" method="POST">
    <link href="../Views/Layout/style6.css" rel="stylesheet" type="text/css"/>
    <h1>Login</h1>
        <label>Username:</label>
        <input type="text" name="username" required><br>
        
        <label>Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="login" value="Login">
    </form>
    <p>Anda belum akun? <a href="V_registrasi.php">Registrasi</a></p>
</body>
</html>        