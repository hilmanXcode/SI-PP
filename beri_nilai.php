<?php
session_start();
error_reporting(0);
include 'config/koneksi.php';
include 'includes/function.php';

if(!isset($_SESSION['id']) && !isset($_SESSION['username'])){
  message('error', 'Error!', 'Kamu harus login terlebih dahulu!');
  header("Location: login.php");
  die();
}
$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$check = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE id_pegawai='$id'");
$datacheck = mysqli_fetch_array($check, MYSQLI_ASSOC);

if($datacheck['rajin'] != ""){
    message('error', 'Error!', 'Pegawai ini sudah mempunyai nilai');
    header("Location: daftar_pegawai.php");
    die();
}

$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id='$id'");
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beri Nilai Pegawai | SI-PP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <style>
      body {
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
      }
      .container {
        height: 50vh;
      }
      .wrap {
        box-shadow: 18px 22px 40px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 18px 22px 40px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 18px 22px 40px 0px rgba(0,0,0,0.75);
        border-radius: 25px;
      }
    </style>
  </head>
  <body>
    <?php include 'includes/navigasi.php'; ?>
    <div class="container p-5">
      <div class="wrap p-5">
        <h1 class="mb-3">Beri Nilai Pegawai</h1>
        <form action="proses.php" method="post">
            <input type="hidden" name="idpegawai" id="" value="<?= $data['id']; ?>">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nama" id="floatingPassword" placeholder="Password" value="<?= $data['namaLengkap']; ?>" readonly/>
            <label for="floatingPassword">Nama Pegawai</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="jabatan" id="floatingPassword" placeholder="Password" value="<?= $data['jabatan']; ?>" readonly/>
            <label for="floatingPassword">Jabatan</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" name="nilai_rajin" id="floatingPassword" placeholder="Password"/>
            <label for="floatingPassword">Rajin</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" name="nilai_disiplin" id="floatingPassword" placeholder="Password"/>
            <label for="floatingPassword">Disiplin</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" name="nilai_loyal" id="floatingPassword" placeholder="Password"/>
            <label for="floatingPassword">Loyal</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" name="nilai_kreatif" id="floatingPassword" placeholder="Password"/>
            <label for="floatingPassword">Kreatif</label>
          </div>
          <div class="form-floating">
            <input type="number" class="form-control" name="nilai_mandiri" id="floatingPassword" placeholder="Password"/>
            <label for="floatingPassword">Mandiri</label>
          </div>
          <button type="submit" name="beri_nilai" class="form-control btn btn-primary mt-2">Submit</button>
        </form>
      </div>
      
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
