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
    <link rel="stylesheet" href="daftar.css">
    <link rel="shortcut icon" href="favicon.png">
    <title>Daftar - Bengkel Wahyu Putra</title>
</head>
<body>

    <?php
        if(isset($_POST['daftar'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ulangi_pass = $_POST['ulangi_pass'];
            $nama_pelanggan = $_POST['nama'];
            $tgl_daftar = "CURRENT_TIMESTAMP()";
            $no_telp = $_POST['telp'];
            $jkel = $_POST['jkel'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $jenis_akun = $_POST['jenis_akun'];

            $select = mysqli_query($conn, "SELECT * FROM pelanggan WHERE username='$username';"); //periksa apakah username telah tersedia atau tidak

            if(mysqli_num_rows($select) > 0) {
                echo "<script>alert('Username yang didaftarkan telah ada! Silahkan masukkan yang lain.')</script>";
            } 
            elseif ($ulangi_pass != $password) {
                echo "<script>alert('Password yang Anda masukkan tidak sesuai! Pastikan kolom Password dan Ulangi Password sama.')</script>";
            }
            else {
                $insert = mysqli_query($conn, "INSERT INTO pelanggan (username, password, nama_pelanggan, tgl_daftar, no_telp, jenis_kelamin, tgl_lahir, jenis_akun) VALUES ('$username', md5('$password'), '$nama_pelanggan', CURRENT_TIMESTAMP(), '$no_telp', '$jkel', '$tgl_lahir', '$jenis_akun');"); //jika username tidak ada, maka boleh lanjut daftar

                if($insert){
                    echo "<script>alert('Selamat, Anda berhasil mendaftarkan akun Anda! Silahkan login.')</script>";
                } else {
                    echo "<script>alert('Terjadi kesalahan! Pendaftaran gagal.')</script>";
                }
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
        <form action="daftar.php" method="post">
            <h2>Daftar Akun</h2>
            <p>Silahkan daftar akun Bengkel Wahyu Putra Anda</p>
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" required><br>
            
            <label for="jkel" class="label">Jenis Kelamin: </label>
            <select name="jkel" id="jkel">
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
            
            <label for="date" class="label">Tanggal Lahir: </label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" required><br>
            
            <input type="tel" name="telp" id="telp" placeholder="Nomor Telepon" required>
            
            <label for="jenis_akun" class="label">Jenis Akun: </label>
            <select name="jenis_akun" id="jenis_akun">
                <option value="Pribadi">Pribadi</option>
                <option value="Perusahaan">Perusahaan</option>
            </select>

            <input type="text" name="username" id="username" placeholder="Buat Username" required>
            <br>

            <input type="password" name="password" id="password" placeholder="Buat Password" required><br>
            <input type="password" name="ulangi_pass" id="ulangi_pass" placeholder="Ulangi Password" required><br>

            <p>Sudah punya akun? <a href="login.php">Login di sini!</a></p>

            <button type="submit" name="daftar">Daftar</button>
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