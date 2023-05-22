<?php
$conn = mysqli_connect("localhost", "root", "", "penggajian");


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $idkaryawan = htmlspecialchars($data["id_karyawan"]);
    $namakaryawan = htmlspecialchars($data["nama_karyawan"]);
    $ttlkaryawan = $data["ttl_karyawan"];
    $alamatkaryawan = htmlspecialchars($data["alamat_karyawan"]);
    $nohpkaryawan = htmlspecialchars($data["no_hp_karyawan"]);
    $jbtkaryawan = htmlspecialchars($data["jbt_karyawan"]);
    $jkkaryawan = htmlspecialchars($data["jk_karyawan"]);
    $passkaryawan = htmlspecialchars($data["pass_karyawan"]);


    $result = mysqli_query($conn, "SELECT id_karyawan FROM karyawan WHERE id_karyawan = '$idkaryawan'");


    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('nama koperasi telah terdaftar');
                  </script>";
        return false;
    }

    $query = "INSERT INTO absensi (Id_karyawan, nama_karyawan)
                    VALUES
                 ('$idkaryawan', '$namakaryawan')";

    mysqli_query($conn, $query);

    $query = "INSERT INTO karyawan
                    VALUES
                 ('', '$idkaryawan', '$namakaryawan', '$ttlkaryawan', '$alamatkaryawan', '$nohpkaryawan', '$jbtkaryawan', '$jkkaryawan', '$passkaryawan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM absensi WHERE Id_karyawan = $id");

    mysqli_query($conn, "DELETE FROM karyawan WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $idkaryawan = htmlspecialchars($data["id_karyawan"]);
    $namakaryawan = htmlspecialchars($data["nama_karyawan"]);
    $ttlkaryawan = $data["ttl_karyawan"];
    $alamatkaryawan = htmlspecialchars($data["alamat_karyawan"]);
    $nohpkaryawan = htmlspecialchars($data["no_hp_karyawan"]);
    $jbtkaryawan = htmlspecialchars($data["jbt_karyawan"]);
    $jkkaryawan = htmlspecialchars($data["jk_karyawan"]);
    $passkaryawan = htmlspecialchars($data["pass_karyawan"]);

    $query = "UPDATE karyawan SET
                    id_karyawan = '$idkaryawan',
                    nama_karyawan = '$namakaryawan', 
                    ttl_karyawan = '$ttlkaryawan',
                    alamat_karyawan = '$alamatkaryawan',
                    no_hp_karyawan = '$nohpkaryawan',
                    jbt_karyawan = '$jbtkaryawan',
                    jk_karyawan = '$jkkaryawan',
                    pass_karyawan = '$passkaryawan'
                    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahjbt($data)
{
    global $conn;

    $idjbt = $data["id_jabatan"];
    $namajbt = htmlspecialchars($data["nama_jbt"]);
    $gajijbt = $data["gaji_jabatan"];


    $result = mysqli_query($conn, "SELECT id_jabatan FROM jabatan WHERE id_jabatan = '$idjbt'");


    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('kode telah terdaftar');
                  </script>";
        return false;
    }

    $query = "INSERT INTO jabatan
                    VALUES
                 ('', '$idjbt', '$namajbt', '$gajijbt')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahjbt($data)
{
    global $conn;

    $id = $data["id"];
    $idjbt = $data["id_jabatan"];
    $namajbt = htmlspecialchars($data["nama_jbt"]);
    $gajijbt = $data["gaji_jabatan"];

    $query = "UPDATE jabatan SET
                    id_jabatan = '$idjbt',
                    nama_jbt = '$namajbt', 
                    gaji_jabatan = '$gajijbt'
                    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusjbt($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM jabatan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function tambahabsen($data)
{
    global $conn;

    $idkaryawan = $data["id_karyawan"];
    // $namakaryawan = $data["nama_karyawan"];
    $absen = $data["absensi"];
    $lembur = $data["lembur"];

    $query = "UPDATE absensi SET 
                    absen = '$absen',
                    lembur = '$lembur'
                    WHERE Id_karyawan = $idkaryawan";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function hapusabsen($id)
// {
//     global $conn;

//     mysqli_query($conn, "DELETE FROM absensi WHERE id_absensi = $id");

//     return mysqli_affected_rows($conn);
// }

function ubahabsen($data)
{
    global $conn;

    $idkaryawan = $data["id_karyawan"];
    // $namakaryawan = $data["nama_karyawan"];
    $absen = $data["absensi"];
    $lembur = $data["lembur"];

    $query = "UPDATE absensi SET 
                    absen = '$absen',
                    lembur = '$lembur'
                    WHERE Id_karyawan = $idkaryawan";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahdtgaji($data)
{
    global $conn;

    $no = $data["no"];
    $idkaryawan = $data["id_karyawan"];
    $namakaryawan = $data["nama_karyawan"];
    $nohpkaryawan = $data["no_hp_karyawan"];
    $jbtkaryawan = $data["jbt_karyawan"];
    $gajijbt = $data["gaji_jabatan"];
    $lemburjam = $data["lemburhari"];
    $absen = $data["absen"];
    $lembur = $data["lembur"];
    $gatot = $data["gatot"];


    for ($i = 0; $i < $no; $i++) {
        $query = "INSERT INTO gaji
        VALUES
     ('', '$idkaryawan[$i]', '$namakaryawan[$i]', '$nohpkaryawan[$i]', '$jbtkaryawan[$i]','$gajijbt[$i]','$lemburjam[$i]', '$absen[$i]','$lembur[$i]','$gatot[$i]')";

        mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
}

function hapusdtgaji()
{
    global $conn;

    mysqli_query($conn, "DELETE FROM gaji");

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM pelayanan WHERE 
                    nik LIKE '%$keyword%' OR
                    nama LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%'
                    ";

    return query($query);
}

function daftar($data)
{

    global $conn;

    // $username = strtolower(stripslashes($data["username"]));
    $nama = $data["nama"];
    $username = $data["username"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('username telah terdaftar');
                  </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
                    alert('password tidak sesuai');
                  </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    // $password = md5($password);

    mysqli_query($conn, "INSERT INTO user VALUES('','$nama', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
