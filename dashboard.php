<?php
SESSION_START();

include_once 'Config/Koneksi.php';
$conn = (new Koneksi())->getConnection();

$jumlahBarang = $conn->query("SELECT COUNT(*) as total FROM tb_barang")->fetch_assoc()['total'];
$jumlahDistribusi = $conn->query("SELECT COUNT(*) as total FROM tb_distribusi")->fetch_assoc()['total'];


if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Motor</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Views/Layout/style3.css">
    <style>
        .dashboard-cards {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 40px;
    flex-wrap: wrap;
}

.card {
    background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    padding: 40px 30px;
    min-width: 250px;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

.card h2 {
    font-size: 20px;
    margin: 20px 0 10px;
    color: #333;
}

.card p {
    font-size: 32px;
    color: #3498db;
    font-weight: bold;
    margin: 0;
}

.card .icon {
    font-size: 40px;
    color: #666;
    transition: color 0.3s ease;
}

.card:hover .icon {
    color: #3498db;
}

.card-barang {
    background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
}

.card-distribusi {
    background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
}

    </style>
</head>
<body>

    <?php include 'Views/navbar2.php'; ?>

    <div class="content">
        <h1>Welcome to my website <strong><?php echo htmlspecialchars($username); ?>!</strong></h1>
        <p>Explore our services and more through the navigation menu.</p>

        <div class="dashboard-cards">
    <div class="card card-barang">
        <i class="fas fa-box-open icon"></i>
        <h2>Total Barang</h2>
        <p><?= $jumlahBarang ?></p>
    </div>
    <div class="card card-distribusi">
        <i class="fas fa-truck-moving icon"></i>
        <h2>Total Distribusi</h2>
        <p><?= $jumlahDistribusi ?></p>
    </div>
</div>

    </div>

    <script>
        function toggleMenu() {
            const navbar = document.getElementById("navbar");
            navbar.classList.toggle("active");
        }
    </script>

</body>
</html>
