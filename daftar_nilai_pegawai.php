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
// End validasi

// Pagination

$batas = 10;
$halaman = isset($_GET['halaman'])? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1 ) ? ($halaman * $batas) - $batas : 0;	

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi,"SELECT * FROM kinerja_pegawai");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
$datas = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai LIMIT $halaman_awal, $batas") or die(mysqli_error($koneksi));
$no = $halaman_awal + 1;

// End Pagination


// Sorting max to min
$datax = mysqli_fetch_all($data);
$nums = mysqli_num_rows($datas);
$arr = array();

for($i = 0; $i < $nums; $i++){
    array_push($arr, $datax[$i][9]);
}
// End Sorting

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
            padding: 10px;
            width: 70%;
            border-radius: 25px;
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
        <a class="btn btn-success mb-2" href="rekap_bulanan.php">Rekap Nilai Bulanan</a>
        <a class="btn btn-success mb-2" href="#">Rekap Nilai Tahunan</a>
        <table class="table text-center">
            <thead>
                <tr class="bg-info">
                <th scope="col">No.</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Total Nilai</th>
                <th scope="col">Nilai Rata Rata</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="fw-bold">
                <?php
                rsort($arr);

                $arrlength = count($arr);
                for($x = 0; $x < $arrlength; $x++){
                    $query = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE average='$arr[$x]'");
                    $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
                ?>
                <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= htmlentities($data['namaPegawai']); ?></td>
                <td><?= htmlentities($data['total']); ?></td>
                <td><?= htmlentities($data['average']); ?></td>
                <td>
                    <?php
                    if($data['average'] > 60){
                    ?>
                    <a href="detail_nilai.php?id=<?php echo $data['id']; ?>" class="btn btn-success">Kontrak++</a>
                    <?php }
                    else {
                    ?>
                    <a href="detail_nilai.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Pembinaan</a>
                    <?php } ?>
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav>
        <ul class="pagination justify-content-center">
          <?php 
            if($halaman != 1) {
          ?>
          <li class="page-item">
            <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
          </li>
          <?php } else {

          } ?>
          <?php 
          for($x= 1; $x <= $total_halaman; $x++){
            if($x != 1) {
            ?>
            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php
            } else {
              
            }
          }
          ?>
          <?php
            if($halaman != 1) {
          ?>
          <li class="page-item">
            <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
          </li>
          <?php } else {

          } ?>

        </ul>
      </nav>
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