<?php
SESSION_START();

if (!isset($_SESSION['username'])) {
    header("Location: ../Views/V_login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Motor</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Views/Layout/style3.css">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="content">
        <h1>Welcome to my website <strong><?php echo htmlspecialchars($username); ?>!</strong></h1>
        <p>Explore our services and more through the navigation menu.</p>
    </div>

    <script>
        function toggleMenu() {
            const navbar = document.getElementById("navbar");
            navbar.classList.toggle("active");
        }
    </script>

</body>
</html>
