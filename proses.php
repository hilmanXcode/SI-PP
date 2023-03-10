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
    if($_SESSION['level'] != "admin"){
        message('error', 'Error', 'Maaf kamu tidak punya akses.');
        die();
    }
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
    if($_SESSION['level'] != "pns"){
        message('error', 'Error', 'Maaf kamu tidak punya akses.');
        die();
    }
    $id_pegawai = $_POST['idpegawai'];
    $nama = $_POST['nama'];
    $rajin = $_POST['nilai_rajin'];
    $disiplin = $_POST['nilai_disiplin'];
    $loyal = $_POST['nilai_loyal'];
    $kreatif = $_POST['nilai_kreatif'];
    $mandiri = $_POST['nilai_mandiri'];
    
    if(is_numeric($rajin) && is_numeric($disiplin) && is_numeric($loyal) && is_numeric($kreatif) && is_numeric($mandiri)){
        $penilai = $_SESSION['nama'];
        $now = date('Y-m-d');
        $tahun = date('Y');
        $bulan = date('m');
        $total = $rajin + $disiplin + $loyal + $kreatif + $mandiri;
        $average = ($rajin + $disiplin + $loyal + $kreatif + $mandiri) / 5;
        $query = mysqli_query($koneksi, "INSERT INTO kinerja_pegawai (id_pegawai, namaPegawai, rajin, disiplin, loyal, kreatif, mandiri, total, average, penilai, tanggal, tahun, bulan) VALUES ('$id_pegawai', '$nama', '$rajin', '$disiplin', '$loyal', '$kreatif', '$mandiri', '$total', '$average', '$penilai', '$now', '$tahun', '$bulan')");
    
        if($query){
            message('success', 'Berhasil', 'Kamu berhasil memberi nilai!');
            header("Location: daftar_pegawai.php");
            die();
        }
        else {
            echo "Gagal";
        }
    }
    else {
        message('error', 'Developer Message', 'Pliss Jangan Macem Macem Yaaa :( ');
        header("Location: beri_nilai.php?id=$id_pegawai");
        die();
    }

}

?>