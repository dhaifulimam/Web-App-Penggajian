<?php

require '../functions.php';

session_start();

if (!isset($_SESSION["adm"])) {
    header("Location: ../../login/login.php");
    exit;
}

$id = $_GET["id"];

$update = query("SELECT * FROM jabatan WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if (ubahjbt($_POST) > 0) {
        echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href = '../../admin/datajabatan/datajabatan.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('data gagal diubah');
                    document.location.href = '../../admin/datajabatan/datajabatan.php';
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
    <link rel="stylesheet" href="../css/StyleUbah.css">
    <title>ubah page</title>
</head>

<body>
    <!-- Nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <img src="../../logodinascilegon/logousaha.png" alt="logo">
            <a class="navbar-brand" href="../home/index.php">PT. Assiv Jaya Makmur </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="../../admin/admin-page.php">Home</a>
                    <a class="nav-item btn btn-success tombol" href="../../admin/logout.php">logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir nav bar -->

    <!-- form tambah -->
    <div class="container content">
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $update["id"]; ?>">
            <div class="form-group">
                <label for="id_jabatan">kode jabatan</label>
                <input type="number" name="id_jabatan" class="form-control" id="id_jabatan" autocomplete="off" value="<?= $update["id_jabatan"]; ?>">
            </div>
            <div class="form-group">
                <label for="nama_jbt">nama jabatan</label>
                <input type="text" name="nama_jbt" class="form-control" id="nama_jbt" autocomplete="off" value="<?= $update["nama_jbt"]; ?>">
            </div>
            <div class="form-group">
                <label for="gaji_jabatan">gaji jabatan</label>
                <input type="number" name="gaji_jabatan" class="form-control" id="gaji_jabatan" autocomplete="off" value="<?= $update["gaji_jabatan"]; ?>">
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-success add">ubah data</button>
            </div>
        </form>
    </div>
    <!-- akhir form tambah -->


    <!-- Optional JavaScript -->
    <script src=""></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>