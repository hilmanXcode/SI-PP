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

// Get data

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$query = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE id='$id'");
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);

// End Get data

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
            width: 75%;
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
        <div style="overflow-x: auto;" class="wrap">
        <!-- <div class="searchbar">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="search" id="floatingPassword" placeholder="Password" />
                <label for="floatingPassword">Cari Pegawai</label>
            </div>
        </div> -->
        <h1 class="fw-bold mx-1">Detail Nilai <?= htmlentities($data['namaPegawai']) ?></h1>
        <h2 class="text-muted mx-1">Pemberi Nilai : <?= htmlentities($data['penilai']) ?></h2>
        <table class="table text-center">
            <thead>
                <tr class="bg-info">
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Rajin</th>
                <th scope="col">Disiplin</th>
                <th scope="col">Loyal</th>
                <th scope="col">Kreatif</th>
                <th scope="col">Mandiri</th>
                </tr>
            </thead>
            <tbody class="fw-bold">
               <tr>
                <td><?= htmlentities($data['namaPegawai']); ?></td>
                <td><?= htmlentities($data['rajin']); ?></td>
                <td><?= htmlentities($data['disiplin']); ?></td>
                <td><?= htmlentities($data['loyal']); ?></td>
                <td><?= htmlentities($data['kreatif']); ?></td>
                <td><?= htmlentities($data['mandiri']); ?></td>
               </tr>
            </tbody>
        </table>
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