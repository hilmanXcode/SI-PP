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

// Pagination

$batas = 10;
$halaman = isset($_GET['halaman'])? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1 ) ? ($halaman * $batas) - $batas : 0;	

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi,"SELECT * FROM pegawai");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
$datas = mysqli_query($koneksi, "SELECT * FROM pegawai LIMIT $halaman_awal, $batas") or die(mysqli_error($koneksi));
$no = $halaman_awal + 1;

// End Pagination

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
        table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
    </style>
</head>
<body>
<?php include 'includes/navigasi.php'; ?>
    <div class="container-fluid d-flex justify-content-center p-4">
        <div style="overflow-x: auto;" class="wrap">
        <!-- <div class="searchbar">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="search" id="floatingPassword" placeholder="Password" />
                <label for="floatingPassword">Cari Pegawai</label>
            </div>
        </div> -->
        
        <a href="export_excel.php?data_pegawai" class="btn btn-success mb-2">Export To Excel</a>
        <table class="table text-center">
            <thead>
                <tr class="bg-info">
                <th scope="col">No.</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="fw-bold">
                <?php
                $no = 0;
                foreach($datas as $data){
                    $no++;
                ?>
                <tr>
                <th scope="row"><?= $no; ?></th>
                <td data-label="Nama Lengkap"><?= htmlentities($data['namaLengkap']); ?></td>
                <td data-label="Jabatan"><?= htmlentities($data['jabatan']); ?></td>
                <td data-label="Aksi">
                    <?php
                    $idx = $data['id'];
                    $nowMonth = date('m');
                    $query = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE id_pegawai='$idx' AND bulan='$nowMonth'");
                    $num = mysqli_num_rows($query);
                    if($num < 1){
                    ?>
                    <?php
                    if($_SESSION['level'] == "pns"){
                    ?>
                    <a href="beri_nilai.php?id=<?= $data['id']; ?>" class="btn btn-outline-success">Beri Nilai</a>
                    <?php }
                    elseif($_SESSION['level'] == "admin"){
                    ?>
                    <a href="hapus_pegawai.php?id=<?= $data['id']; ?>" class="btn btn-danger alert-notif">Hapus</a>
                    <?php } ?>
                    <?php }
                    else {
                    ?>
                    <a href="#" class="btn btn-success">Sudah Diberi Nilai</a>
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