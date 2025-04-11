<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="Views/Layout/style6.css">
</head>
<body>
    <main class="container">
        <form action="Controller/AuthController.php" method="POST">
            <h1>Login</h1>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" name="login" value="Login">
        </form>

        <p>Belum punya akun? <a href="Views/V_registrasi.php">Registrasi</a></p>
    </main>
</body>
</html>
