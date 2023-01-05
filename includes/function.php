<?php
function message($type, $title, $pesan){
    $_SESSION['message'] = "<script>Swal.fire({title: '$title',text: '$pesan',icon: '$type',confirmButtonText: 'OK'})</script>";
}
?>