<?php

require '../../function/functions.php';


if (hapusdtgaji() > 0) {
    echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href = 'penggajian.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert('data gagal dihapus');
            document.location.href = 'penggajian.php';
            </script>
        ";
}
