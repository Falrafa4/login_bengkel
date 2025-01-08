<?php 
    //inisialisasi session
    session_start();

    //mengecek apakah ada session user yang aktif, jika tidak maka diarahkan ke login.php
    if(!isset($_SESSION['user'])){
        header("location: login.php"); // arahkan ke login.php
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <link rel="shortcut icon" href="favicon.png">
    <title>Dashboard - Bengkel Wahyu Putra</title>
</head>

<style>
    main {
        width: 70%;
        margin: 50px auto;
        border: 1px solid #bbbbbb;
        padding: 20px 50px 50px 50px;
    }

    main h1 {
        font-size: 40px;
        font-weight: 400;
    }

    main h3 {
        font-weight: 400;
        margin: 15px auto;
    }

    .nav-dash a {
        color: #2b2b2b;
        display: inline-block;
        margin: 10px auto;
    }

    .nav-dash a:hover {
        text-decoration: underline;
    }
</style>

<body>
        <!-- NAVBAR -->
        <nav>
        <div class="logo">
            <a href="#"><img src="favicon.png" alt="logo"></a>
        </div>
        <div class="navbar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
        <!-- sidebar -->
        <a id="toggleSideBar" onclick="toggleClick()"><i class="fas fa-bars"></i></a>
        <div class="ham-bar">
                <a href="#">Home</a>
                <a href="#">Services</a>
                <a href="#">Gallery</a>
                <a href="#">Contact</a>
                <a href="#">About</a>
        </div>
    </nav>
    <!-- NAVBAR END -->
    
    <main>
        <h1>Halaman Dashboard</h1>
        <div class="nav-dash">
            <a href="index.php">Home</a> |
            <a href="logout.php">Logout</a> | 
            <a href="hapus_akun.php" onclick="return confirm('❗ Apakah Anda yakin ingin menghapus akun ini?')">Hapus Akun</a>
        </div>
        <hr>
        <h3>Selamat Datang, <?php echo $_SESSION['user']['nama_pelanggan']; ?>!</h3>
        <p style="font-style: italic;">Halaman ini akan tampil setelah user login.</p>
    </main><hr>

    <!-- FOOTER -->
    <footer>
        <section class="footer-top">
            <div class="footer-logo">
                <img src="favicon.png" alt="">
                <p>Bengkel Wahyu Putra</p>
                <p>Jl. Tropodo I Surya Citra Residence Blok J No.3 Waru - Sidoarjo 61256</p>
            </div>
            <div class="footer-nav">
                <p>Lihat Juga</p>
                <a href="services/">Layanan Kami</a>
                <a href="#">Tentang Kami</a>
                <a href="wip.html">Galeri Kerja</a>
                <a href="wip.html">Informasi Lowongan</a>
            </div>
        </section>
        <section class="footer-bottom">
            <p>&copy; 2024 Bengkel Wahyu Putra. All Rights Reserved</p>
            <div class="footer-sosmed">
                <a href="mailto:jasabengkelwahyuputra@gmail.com"><i class="fas fa-envelope"></i></a>
                <a href="http://wa.me/6281216977427"><i class="fab fa-square-whatsapp"></i></a>
                <a href="#"><i class="fab fa-square-facebook"></i></a>
                <a href="#"><i class="fab fa-square-instagram"></i></a>
            </div>
        </section>
    </footer>
    <!-- FOOTER END -->
    <script src="https://kit.fontawesome.com/ed13b1bb03.js" crossorigin="anonymous"></script>
</body>
</html>