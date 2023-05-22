<?php

require '../functions.php';

session_start();

if (!isset($_SESSION["adm"])) {
    header("Location: ../../login/login.php");
    exit;
}

$id = $_GET["id"];

$update = query("SELECT * FROM absensi WHERE Id_karyawan = $id")[0];

if (isset($_POST["submit"])) {

    if (ubahabsen($_POST) > 0) {
        echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href = '../../admin/absensi/absensi.php';
                </script>
            ";
    } else {

        echo "
                <script>
                    alert('data gagal diubah');
                    document.location.href = '../../admin/absensi/absensi.php';
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
            <input type="hidden" name="id" value="<?= $update["id_absensi"]; ?>">
            <div class="form-group">
                <label for="id_karyawan">id karyawan</label>
                <input type="number" name="id_karyawan" class="form-control" id="id_karyawan" autocomplete="off" value="<?= $update["Id_karyawan"]; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama_karyawan">nama karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" autocomplete="off" value="<?= $update["nama_karyawan"]; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="absensi">absensi</label>
                <input type="number" name="absensi" class="form-control" id="absensi" autocomplete="off" value="<?= $update["absen"]; ?>">
            </div>
            <div class="form-group">
                <label for="lembur">lembur</label>
                <input type="number" name="lembur" class="form-control" id="lembur" autocomplete="off" value="<?= $update["lembur"]; ?>">
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