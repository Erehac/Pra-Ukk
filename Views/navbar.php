<!-- navbar.php -->
 <style>
    /* Navbar Styling */
.navbar {
    background-color: #333;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
}

.navbar .logo {
    color: #fff;
    font-size: 24px;
    font-weight: bold;
    margin-left: 20px;
}

.navbar ul {
    list-style-type: none;
    display: flex;
    margin: 0;
}

.navbar ul li {
    padding: 10px 20px;
}

.navbar ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    display: block;
    transition: color 0.3s ease;
}

/* Hover Effect */
.navbar ul li a:hover {
    color: #6c63ff;
}
 </style>
 <br>
 <br>
<div class="navbar" id="navbar">
    <div class="logo">Honda</div>
    <ul>
        <li><a href="tampil.php">Data Motor</a></li>
        <li><a href="V_supplier.php">Data Supplier</a></li>
        <li><a href="V_distribusi.php">Distribusi</a></li>
        <li><a href="history.php">History</a></li>
        <li><a href="V_toko.php">Toko</a></li>
        <li><a href="../Controller/AuthController.php?aksi=logout">Logout</a></li>
    </ul>
</div>
