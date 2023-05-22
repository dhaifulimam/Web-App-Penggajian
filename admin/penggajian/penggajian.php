<?php


require '../../function/functions.php';
session_start();

if (!isset($_SESSION["adm"])) {
  header("Location: ../../login/login.php");
  exit;
}

$data = query("SELECT * FROM karyawan, jabatan, absensi WHERE karyawan.jbt_karyawan = jabatan.nama_jbt AND karyawan.id_karyawan = absensi.Id_karyawan");

if (isset($_POST["submit"])) {

  if (tambahdtgaji($_POST) > 0) {
    echo "
              <script>
                  alert('data berhasil diupload');
                  document.location.href = 'penggajian.php';
              </script>
          ";
  } else {
    echo "
            <script>
                alert('data gagal diupload');
                document.location.href = 'penggajian.php';
            </script>
        ";
  }
}


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
  <link rel="stylesheet" href="../css/penggajian.css">
  <title>gaji karyawan</title>
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
  <div class="kotak" style="margin: 20px 40px 20px 40px;">

    <h1 class="header">gaji karyawan</h1>



    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">id karyawan</th>
          <th scope="col">Nama</th>
          <th scope="col">No.Hp</th>
          <th scope="col">Jabatan</th>
          <th scope="col">gaji perhari</th>
          <th scope="col">lembur perjam</th>
          <th scope="col">absensi</th>
          <th scope="col">lembur</th>
          <th scope="col">gaji total</th>
        </tr>
      </thead>
      <tbody>
        <form action="" method="POST">
          <?php $i = 1 ?>
          <?php foreach ($data as $dt) : ?>

            <tr>
              <td><input type="number" name="no" class="form-control" id="no" autocomplete="off" value="<?= $i; ?>" readonly style="width:50px ;"></td>

              <td><input type="number" name="id_karyawan[]" class="form-control" id="id_karyawan" autocomplete="off" value="<?= $dt["id_karyawan"]; ?>" readonly>
              </td>

              <td><input type="text" name="nama_karyawan[]" class="form-control" id="nama_karyawan" autocomplete="off" value="<?= $dt["nama_karyawan"]; ?>" readonly></td>

              <td><input type="number" name="no_hp_karyawan[]" class="form-control" id="no_hp_karyawan" autocomplete="off" value="<?= $dt["no_hp_karyawan"]; ?>" readonly></td>

              <td><input type="text" name="jbt_karyawan[]" class="form-control" id="jbt_karyawan" autocomplete="off" value="<?= $dt["jbt_karyawan"]; ?>" readonly></td>

              <td><input type="text" name="gaji_jabatan[]" class="form-control" id="gaji_jabatan" autocomplete="off" value="<?= $dt["gaji_jabatan"]; ?>" readonly></td>

              <td><input type="text" name="lemburhari[]" class="form-control" id="lemburhari" autocomplete="off" value="15000" readonly></td>

              <td><input type="text" name="absen[]" class="form-control" id="absen" autocomplete="off" value="<?= $dt["absen"]; ?>" readonly style="width: 60px;"></td>

              <td><input type="text" name="lembur[]" class="form-control" id="lembur" autocomplete="off" value="<?= $dt["lembur"]; ?>" readonly style="width: 60px;"></td>

              <td><input type="number" name="gatot[]" class="form-control" id="gatot" autocomplete="off" value="<?= ($dt["absen"] * $dt["gaji_jabatan"]) + ($dt["lembur"] * 15000); ?>" readonly style="width: 150px;"></td>

            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>

      </tbody>

    </table>
    <div class="row d-flex justify-content-center">
      <button type="submit" name="submit" class="btn btn-success add">Upload</button>
      <a class="nav-item btn btn-danger add" href="delete.php">clear data</a>
      <input type="button" value="print data" onclick="window.open('cetak.php', 'blank')" class="nav-item btn btn-primary add">
    </div>

    </form>


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