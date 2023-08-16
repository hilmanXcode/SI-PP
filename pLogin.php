<?php
session_start();
include 'config/koneksi.php';
include 'includes/function.php';

if(isset($_POST['login_submit'])){
    $uname = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$uname' AND password='$pass'");
    $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $num = mysqli_num_rows($query);

    if($num > 0){
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['nama'] = $data['namaLengkap'];
        $level = $_SESSION['level'];
        message('success', 'Berhasil', "Kamu berhasil login sebagai $level");
        header("Location: dashboard.php");
        die();
    }
    else {
        message('error', 'Error!', 'Username Atau Password yang anda masukkan salah');
        header("Location: login.php");
        die();
    }
}

?>