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

// Get Data
$query = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE average > 60");
$pegawai = mysqli_num_rows($query);

$query2 = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE average < 60");
$pegawai2 = mysqli_num_rows($query2);
// End Get Data

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SI-PP</title>
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
        .container {
            height: 90vh;
            padding: 30px;
        }
        .welcome {
            width: 100%;
            box-shadow: 18px 22px 40px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 18px 22px 40px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 18px 22px 40px 0px rgba(0,0,0,0.75);
            border-radius: 25px;
        }
        .shadow-card {
            box-shadow: 10px 10px 0px 0px rgba(13,110,253,0.84);
-webkit-box-shadow: 10px 10px 0px 0px rgba(13,110,253,0.84);
-moz-box-shadow: 10px 10px 0px 0px rgba(13,110,253,0.84);
        }
        .jam {
            margin-left: 94%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php include 'includes/navigasi.php'; ?>

    <div class="container d-flex justify-content-center align-items-center align-content-center">
        <div class="welcome p-5">
            <h1 class="fw-bold">Selamat Datang Kembali <?= $_SESSION['nama']; ?></h1>
            <h5 class="text-muted">Selamat Bertugas Kembali </h5>
            <h5 class="pt-2 fw-bold">Grafik Total Nilai Bulan Ini</h5>
            <div class="row pt-2">
                <div class="col-12 mb-3">
                    <canvas id="myChart"></canvas>
                </div>
                <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card shadow-card bg-primary text-light">
                    <div class="card-body">
                        <h5 class="card-title">Pegawai Lanjut Kontrak</h5>
                        <p class="card-text"> Pegawai.</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow-card bg-primary text-light">
                    <div class="card-body">
                        <h5 class="card-title">Pegawai Dalam Pembinaan</h5>
                        <p class="card-text"> Pegawai.</p>
                    </div>
                    </div>
                </div> -->
            </div>
        </div> 
    </div>
    <?php include 'includes/footer.php'; ?>
    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [
                <?php
                $nowMonth = date('m');

                $query = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE bulan='$nowMonth'");
                $data = mysqli_fetch_all($query);
                $nums = mysqli_num_rows($query);
                $arr = array();

                for($i = 0; $i < $nums; $i++){
                    array_push($arr, $data[$i][8]);
                }

                rsort($arr);

                $arrlength = count($arr);
                for($x = 0; $x < $arrlength; $x++){
                    $query = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE total='$arr[$x]'");
                    $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
                ?>
                "<?= $data['namaPegawai']; ?>", <?php } ?>],
			datasets: [{
				label: '',
				data: [
                    <?php
                $nowMonth = date('m');

                $query = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE bulan='$nowMonth'");
                $data = mysqli_fetch_all($query);
                $nums = mysqli_num_rows($query);
                $arr = array();

                for($i = 0; $i < $nums; $i++){
                    array_push($arr, $data[$i][8]);
                }

                rsort($arr);

                $arrlength = count($arr);
                for($x = 0; $x < $arrlength; $x++){
                    $query = mysqli_query($koneksi, "SELECT * FROM kinerja_pegawai WHERE total='$arr[$x]' AND bulan='1'");
                    $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
                ?>
                "<?= $data['total']; ?>", <?php } ?>
				],
				backgroundColor: [
				'rgba(255, 201, 60, 1)',
				'rgba(134, 229, 255, 1)',
				'rgba(91, 192, 248, 1)',
				'rgba(0, 129, 201, 1)'
				 ],
				// borderColor: [
				// 'rgba(255,99,132,1)',
				// 'rgba(54, 162, 235, 1)',
				// 'rgba(255, 206, 86, 1)',
				// 'rgba(75, 192, 192, 1)'
				// ],
				// borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>