 <?php
session_start();
if (isset($_SESSION['email'])) {
    echo '<script>window.location.replace("./index.html");</script>';
} else {
    $email = "admin@email";
    $password = "010122";
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if ($_POST['email'] == $email && $_POST['password'] == $password) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            echo '<meta http-equiv="refresh" content="2; url=./index.html"/>';
            
        } elseif ($_POST['email'] != $email && $_POST['password'] == $password) {
            echo "<center><h1>Gagal!, Email Salah</h1></center>";
        } elseif ($_POST['email'] == $email && $_POST['password'] != $password) {
            echo "<center><h1>Gagal!, Password Salah</h1></center>";
        } elseif ($_POST['email'] != $email && $_POST['password'] != $password) {
            echo "<center><h1>Gagal!, Email & Password Salah</h1></center>";
        }
    } else {
        echo "<center><h1>Gagal!, jangan biarkan email & password kosong</h1></center>";
    }
}
?>
