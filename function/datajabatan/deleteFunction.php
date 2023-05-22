<?php

require '../functions.php';


$id = $_GET["id"];

if (hapusjbt($id) > 0) {
    echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href = '../../admin/datajabatan/datajabatan.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert('data gagal dihapus');
            document.location.href = '../../admin/datajabatan/datajabatan.php';
            </script>
        ";
}
