<?php
session_start();
include 'config/koneksi.php';

// Validasi
if(!isset($_SESSION['id']) && !isset($_SESSION['username'])){
    message('error', 'Error!', 'Kamu harus login terlebih dahulu!');
    header("Location: login.php");
    die();
}
if($_SESSION['level'] != "pns"){
    message('error', 'Error', 'Maaf kamu tidak punya akses untuk halaman ini');
    header("Location: dashboard.php");
    die();
}
// End Validasi

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
</head>
<body>
    <?php
    if(isset($_GET['data_pegawai'])){
        $query = mysqli_query($koneksi, "SELECT * FROM pegawai");
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Pegawai.xls");
    }
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>No. </th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach($query as $data){
                $no++;
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['namaLengkap']; ?></td>
                <td><?= $data['jabatan']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>