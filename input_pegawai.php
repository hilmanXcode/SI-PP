<?php
session_start();
include 'includes/function.php';

if(!isset($_SESSION['id']) && !isset($_SESSION['username'])){
  message('error', 'Error!', 'Kamu harus login terlebih dahulu!');
  header("Location: login.php");
  die();
}
if($_SESSION['level'] != "admin"){
  message('error', 'Error', 'Maaf kamu tidak punya akses untuk halaman ini');
  header("Location: dashboard.php");
  die();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Input Pegawai | SI-PP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <style>
      body {
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
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
        border-radius: 25px;
      }
    </style>
  </head>
  <body>
    <?php include 'includes/navigasi.php'; ?>
    <div class="container p-5">
      <div class="wrap p-5">
        <h1 class="mb-3">Input Pegawai</h1>
        <form action="proses.php" method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nama" id="floatingPassword" placeholder="Password" />
            <label for="floatingPassword">Nama Lengkap Pegawai</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" name="jabatan" id="floatingPassword" placeholder="Password" />
            <label for="floatingPassword">Jabatan</label>
          </div>
          <button type="submit" name="input_pegawai" class="form-control btn btn-primary mt-2">Submit</button>
        </form>
      </div>
      
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
