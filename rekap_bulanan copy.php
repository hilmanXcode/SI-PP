<?php
// Inisialisasi
session_start();
include 'config/koneksi.php';
include 'includes/function.php';
// End Inisialisasi

// Validasi
if(!isset($_SESSION['id']) && !isset($_SESSION['username'])){
    message('error', 'Error!', 'Kamu harus login terlebih dahulu!');
    header("Location: login.php");
    die();
}
// End Validasi

$months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai | SI-PP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            /* background-image: url('./assets/img/bg-3.jpeg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh; */
        }
        .wrap {
            box-shadow: 18px 22px 40px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 18px 22px 40px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 18px 22px 40px 0px rgba(0,0,0,0.75);
            padding: 20px;
            border-radius: 25px;
            width: 70%;
        }
        table {
            border-collapse: collapse;
            border-radius: 1em;
            overflow: hidden;
        }
        .bg-custom1 {
            background-color: #82AAE3;
        }
        .bg-custom2 {
            background-color: #91D8E4;
        }
        .btn {
            vertical-align: center;
        }
    </style>
</head>
<body>
<?php include 'includes/navigasi.php'; ?>
    <div class="container-fluid d-flex justify-content-center p-4">
        <div class="wrap">
        <!-- <div class="searchbar">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="search" id="floatingPassword" placeholder="Password" />
                <label for="floatingPassword">Cari Pegawai</label>
            </div>
        </div> -->
        <?php
        if(isset($_GET['bulan'])){
            if($_GET['bulan'] != ""){
            $bulan = mysqli_real_escape_string($koneksi, $_GET['bulan']);
            $query = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE bulan='$bulan'");
            // Sorting max to min
            $datax = mysqli_fetch_all($query);
            $nums = mysqli_num_rows($query);
            $arr = array();

            for($i = 0; $i < $nums; $i++){
                array_push($arr, $datax[$i][9]);
            }
            // End Sorting
            ?>
            <h1 class="text-center fw-bold">Rekap Nilai Bulan <?= $months[$bulan-1] ?></h1>

            <table class="table text-center">
                <thead>
                    <tr class="bg-info">
                    <th scope="col">No.</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Total Nilai</th>
                    <th scope="col">Nilai Rata-Rata</th>
                    <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="fw-bold">
                    <?php
                    $no = 1;
                    foreach($query as $data){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlentities($data['namaPegawai']); ?></td>
                        <td><?= htmlentities($data['total']); ?></td>
                        <td><?php
                        if($data['average'] > 59){
                        ?>
                        <a class="btn btn-success" href="#"><?= htmlentities($data['average']); ?></a>
                        <?php }
                        else {
                        ?>
                        <a class="btn btn-warning" href="#"><?= htmlentities($data['average']); ?></a>
                        <?php } ?>
                        </td>
                        <td><?= htmlentities($data['tanggal']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } 
            else {
                header("Location: rekap_bulanan.php");
            }
            ?>
        <?php }
        else { ?>
        <div class="row">
            <h1 class="text-center fw-bold mb-3">Mau Ngambil Bulan Apa Nich ?</h1>
        <?php
        $bulan = 1;
        foreach($months as $month){
        ?>
        <div class="col-6">
            <a class="btn btn-outline-primary d-flex mb-2 justify-content-center" href="rekap_bulanan.php?bulan=<?= $bulan++; ?>"><?= $month; ?></a>
        </div>
       <?php } ?>
       </div>
       <?php } ?>
        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> -->
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>