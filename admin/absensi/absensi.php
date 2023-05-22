<?php


require '../../function/functions.php';

session_start();

if (!isset($_SESSION["adm"])) {
  header("Location: ../../login/login.php");
  exit;
}

// $data = query("SELECT * FROM karyawan, absensi WHERE karyawan.id_karyawan = absensi.Id_karyawan");

$data = query("SELECT * FROM karyawan, absensi WHERE karyawan.id_karyawan = absensi.Id_karyawan");


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

  <!-- My Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <!-- My CSS -->
  <link rel="stylesheet" href="../css/Absensi.css">
  <title>Data absensi</title>
</head>

<body>
  <!-- Nav bar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <img src="../../logodinascilegon/logousaha.png" alt="logo">
      <a class="navbar-brand">PT. Assiv Jaya Makmur </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="../admin-page.php">Home</a>
          <a class="nav-item btn btn-success tombol" href="../logout.php">logout</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Akhir nav bar -->

  <!-- content -->
  <div class="container">

    <h1 class="header">absen</h1>


    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">id karyawan</th>
          <th scope="col">Nama karyawan</th>
          <th scope="col">absen</th>
          <th scope="col">lembur</th>
          <th scope="col">aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $dt) : ?>
          <tr>
            <td><?= $dt["id_karyawan"]; ?></td>
            <td><?= $dt["nama_karyawan"]; ?></td>
            <td><?= $dt["absen"]; ?></td>
            <td><?= $dt["lembur"]; ?></td>
            <td>
              <a class="nav-item btn btn-success admin" href="tambah.php?id=<?= $dt["id_karyawan"]; ?>">isi absen</a>
              <a class="nav-item btn btn-warning admin" href="../../function/absensi/ubahFunction.php?id=<?= $dt["id_karyawan"]; ?>">ubah</a>
            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>

  </div>
  <!-- akhir content -->

  <!-- footer -->

  <!-- akhir footer -->


  <!-- Optional JavaScript -->
  <script src=""></script>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../../bootstrap/js/jquery-3.5.1.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>