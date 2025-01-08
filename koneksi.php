<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "bengkel_wahyu_putra";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if(!$conn){
        echo "Koneksi Gagal";
    }