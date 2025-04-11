<!-- navbar.php -->
<style>
/* Navbar Styling */
.navbar {
    background: linear-gradient(to right, #ff0000, #ff4d4d); /* Merah menyala */
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    font-family: 'Poppins', sans-serif;
}

.navbar .logo {
    color: #fff;
    font-size: 26px;
    font-weight: 600;
    letter-spacing: 1px;
    transition: transform 0.3s ease;
}

.navbar .logo:hover {
    transform: scale(1.05);
}

.navbar ul {
    list-style-type: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar ul li {
    margin: 0 15px;
}

.navbar ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    font-weight: 500;
    padding: 8px 14px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.navbar ul li a:hover {
    background-color: rgba(255, 255, 255, 0.15);
    transform: scale(1.05);
}

/* Responsive */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
        padding: 20px;
    }

    .navbar ul {
        flex-direction: column;
        width: 100%;
        margin-top: 10px;
    }

    .navbar ul li {
        width: 100%;
        margin: 5px 0;
    }

    .navbar ul li a {
        width: 100%;
        display: block;
    }
}
</style>

 <br>
 <br>
<div class="navbar" id="navbar">
    <div class="logo">Honda</div>
    <ul>
        <li><a href="Views/tampil.php">Data Motor</a></li>
        <li><a href="Views/V_supplier.php">Data Supplier</a></li>
        <li><a href="Views/V_distribusi.php">Distribusi</a></li>
        <li><a href="Views/V_toko.php">Toko</a></li>
        <li><a href="Views/V_data_detail.php">Details</a></li>
        <li><a href="#" onclick="konfirmasiLogout()">Logout</a></li>
    </ul>
</div>

<script>
function konfirmasiLogout() {
    const konfirmasi = confirm("Apakah Anda yakin ingin logout?");
    if (konfirmasi) {
        window.location.href = "Controller/AuthController.php?aksi=logout";
    }
}
</script>