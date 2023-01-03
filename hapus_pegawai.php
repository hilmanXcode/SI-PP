<?php
session_start();
include 'config/koneksi.php';
include 'includes/function.php';
// Validasi
if(!isset($_SESSION['id']) && !isset($_SESSION['username'])){
    message('error', 'Error!', 'Kamu harus login terlebih dahulu!');
    header("Location: login.php");
    die();
}
// End Validasi

$id = $_GET['id'];

if(isset($id)){
    if($id != ""){
        $query = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id='$id'");
        if($query){
            message('success', 'Berhasil', 'Kamu berhasil menghapus data ini');
            header("Location: daftar_pegawai.php");
            die();
        }
        else {
            echo "Gagal";
        }
    }
    else {
        header("Location: daftar_pegawai.php");
    }
}
else {
    header("Location: daftar_pegawai.php");
}

?>