<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: loginuser/login.php");
  exit;
}

$id = $_SESSION["login"];



require '../function/functions.php';

$data = query("SELECT * FROM gaji WHERE id_karyawan = $id");

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <!-- My Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/Home.css">
  <title>Home</title>
</head>

<body>
  <!-- Nav bar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <img src="../logodinascilegon/logousaha.png" alt="logo">
      <a class="navbar-brand" href="">PT. Assiv Jaya Makmur </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item btn btn-success tombol" href="logout.php">logout</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Akhir nav bar -->

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <?php foreach ($data as $dt) : ?>
        <h1 class="display-4">Selamat Datang <br><span><?= $dt["nama_karyawan"]; ?></span></h1>
        <h1 class="display-5">Gaji anda bulan ini <br><span>Rp. <?= $dt["gaji_total"]; ?></span></h1>
      <?php endforeach; ?>
      <a class="nav-item btn btn-primary add" href="cetak.php?id=<?= $dt["id_karyawan"]; ?>" target="_blank">cetak slip gaji</a>
    </div>
  </div>
  <!-- Akhir Jumbotron -->






  <!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>