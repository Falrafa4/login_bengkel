<?php

session_start();
session_destroy();
?>

<script>
    alert('Anda berhasil logout. Selamat Tinggal!');
    location.href = "login.php";
</script>