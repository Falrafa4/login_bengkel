<?php 
    session_start();
    include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="favicon.png">
    <title>Login - Bengkel Wahyu Putra</title>
</head>
<body>

    <?php
        if(isset($_POST['masuk'])){ //jika ada aksi method POST dengan name=masuk
            $username = $_POST['username']; //simpan username
            $password = md5($_POST['password']); //simpan password

            //cek di database dengan query sql
            $query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE username='$username' AND password='$password'");
            
            if(mysqli_num_rows($query) > 0){
                $data = mysqli_fetch_array($query);

                $_SESSION['user'] = $data; //memberikan nilai pada variabel session user
                echo '<script>alert("Selamat Datang! '.$data['nama_pelanggan'].'"); location.href="index.php";</script>';
            } else {
                echo '<script>alert("Username/Password yang dimasukkan tidak sesuai.");</script>';
            }
        }
    ?>

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
        <form action="login.php" method="post">
            <h2>Selamat Datang!</h2>
            <p>Masuk ke akun Bengkel Wahyu Putra Anda.</p>
            <input type="text" name="username" id="username" placeholder="Username" required><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>

            <p>Belum punya akun? <a href="daftar.php">Daftar di sini!</a></p>

            <button type="submit" name="masuk">Masuk</button>
        </form>
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