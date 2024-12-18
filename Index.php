<?php
session_start();
if (isset($_SESSION['email'])) {
    // ----------------------CONTENT HERE--------------------------//
    echo '<center><h1>Selamat Datang ;)</h1><br/><a href="./logout.php">Logout</a></center>';

    // -----------------------CONTENT HERE -----------------------//
} else {
    echo '<script>window.location.replace("./login.php");</script>';
}
?>
