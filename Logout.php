<?php
session_start();

if(isset($_SESSION['email'])) {
    session_destroy();
    ?>
    <meta http-equiv="refresh" content="1; url=./Login.php"/>';
    
    <?php
} else {
    ?>
    <meta http-equiv="refresh" content="2; url=./Login.php"/>
    <center><h2>Gagal Logout</h2>Silahkan login terlebih dahulu<br/><br/>kamu akan dialihkan kembali ke halaman login dalam 2 detik</center>
    <?php
}
?>
