<?php

if($_SESSION['level'] == "admin"){
?>
<nav class="navbar navbar-expand-lg bg-black navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="./assets/img/logo.png" alt="Logo" width="24" height="24" class="d-inline-block align-text-top">
      SI-PP
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="input_pegawai.php">Input Pegawai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="daftar_pegawai.php">Daftar Pegawai</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto px-2">
        <li class="nav-item">
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </li>
      </ul>
      <hr class="text-light">
      <span class="navbar-text">
        <a href="https://github.com/hilmanXcode/SI-PP" target="_blank" class="btn btn-outline-info">Sistem Informasi Penilaian Pegawai v1</a>
      </span>
    </div>
  </div>
</nav>

<div class="container-fluid d-flex justify-content-end gap-2">
  <div class="btn btn-danger mt-2" >
  <span id="day">Loading</span> <span id="date">....</span>
  </div>
  <div class="btn btn-primary mt-2" id="time">
  Loading..
  </div>
</div>
<?php }
elseif($_SESSION['level'] == "pns"){
?>
<nav class="navbar navbar-expand-lg bg-black navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="./assets/img/logo.png" alt="Logo" width="24" height="24" class="d-inline-block align-text-top">
      SI-PP
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="daftar_pegawai.php">Daftar Pegawai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="daftar_nilai_pegawai.php">Daftar Nilai Pegawai</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto px-2">
        <li class="nav-item">
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </li>
      </ul>
      <hr class="text-light">
      <span class="navbar-text">
        <a href="https://github.com/hilmanXcode/SI-PP" target="_blank" class="btn btn-outline-info">Sistem Informasi Penilaian Pegawai v1</a>
      </span>
    </div>
  </div>
</nav>

<div class="container-fluid d-flex justify-content-end gap-2">
  <div class="btn btn-danger mt-2" >
  <span id="day">Loading</span> <span id="date">....</span>
  </div>
  <div class="btn btn-primary mt-2" id="time">
  Loading..
  </div>
</div>
<?php }
else {
  header("Location: ../login.php");
}?>