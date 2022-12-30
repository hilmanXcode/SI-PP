<?php
session_start();
include 'config/koneksi.php';
include 'includes/function.php';


if(!isset($_SESSION['id']) && !isset($_SESSION['username'])){
    message('error', 'Error!', 'Kamu harus login terlebih dahulu!');
    header("Location: login.php");
    die();
}
elseif(isset($_POST['input_pegawai'])){
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);

    // $check = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE namaLengkap='$nama'");
    // $ncheck = mysqli_num_rows($check);

    // if($ncheck > 0){
    //     message('error', 'Error!', 'Nama tersebut sudah terdaftar di sistem ini');
    //     header("Location: input_pegawai.php");
    //     die();
    // }

    $query = mysqli_query($koneksi, "INSERT INTO pegawai (namaLengkap, jabatan) VALUES ('$nama', '$jabatan')");

    if($query){
        message('success', 'Berhasil', 'Kamu berhasil menambahkan pegawai');
        header("Location: daftar_pegawai.php");
        die();
    }
}
elseif(isset($_POST['beri_nilai'])){
    $id_pegawai = $_POST['idpegawai'];
    $nama = $_POST['nama'];
    $rajin = $_POST['nilai_rajin'];
    $disiplin = $_POST['nilai_disiplin'];
    $loyal = $_POST['nilai_loyal'];
    $kreatif = $_POST['nilai_kreatif'];
    $mandiri = $_POST['nilai_mandiri'];
    $total = $rajin + $disiplin + $loyal + $kreatif + $mandiri;
    $average = ($rajin + $disiplin + $loyal + $kreatif + $mandiri) / 5;

    $query = mysqli_query($koneksi, "INSERT INTO kinerja_pegawai (id_pegawai, namaPegawai, rajin, disiplin, loyal, kreatif, mandiri, total, average) VALUES ('$id_pegawai', '$nama', '$rajin', '$disiplin', '$loyal', '$kreatif', '$mandiri', '$total', '$average')");

    if($query){
        message('success', 'Berhasil', 'Kamu berhasil memberi nilai!');
        header("Location: daftar_pegawai.php");
        die();
    }
    else {
        echo "Gagal";
    }
}

?>