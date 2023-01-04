<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "sipp";

$koneksi = mysqli_connect($host, $user, $pass, $db);

// My Logic
$queryx = mysqli_query($koneksi, "SELECT * FROM misc");
$numsx = mysqli_num_rows($queryx);
$Ynow = date('Y');
if($numsx == 0){
    $query2x = mysqli_query($koneksi, "INSERT INTO misc (tahun) VALUES ('$Ynow')");
}
else {
    $exec = false;
    foreach($queryx as $data){
        if($Ynow != $data['tahun']){
            $exec = true;
        }
    }
    if($exec === true){
        $query3x = mysqli_query($koneksi, "INSERT INTO misc (tahun) VALUES ('$Ynow')");
    }
}

?>