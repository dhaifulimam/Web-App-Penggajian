<?php


require '../function/functions.php';

$id = $_GET["id"];

$data = query("SELECT * FROM gaji WHERE id_karyawan = $id");


?>

<style>
    .header {
        text-align: center;
        font-size: 14pt;
        font-weight: bold;
        margin-bottom: 20px;
        text-transform: capitalize;
    }

    table {
        border-collapse: collapse;
    }

    th {
        padding: 5px;
        text-align: center;
    }

    td {
        padding-left: 5px;
        padding-right: 5px;
    }
</style>


<div class="kotak" style="margin: 20px 40px 20px 40px;">

    <h1 class="header">gaji karyawan</h1>



    <table border="1" align="center">
        <thead class="thead-dark">
            <tr>
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
            <?php foreach ($data as $dt) : ?>

                <tr>
                    <td><?= $dt["id_karyawan"]; ?>
                    </td>

                    <td><?= $dt["nama_karyawan"]; ?></td>

                    <td><?= $dt["no_hp_karyawan"]; ?></td>

                    <td><?= $dt["jbt_karyawan"]; ?></td>

                    <td><?= $dt["gaji_hari"]; ?></td>

                    <td><?= $dt["lembur_jam"]; ?></td>

                    <td><?= $dt["absen"]; ?></td>

                    <td><?= $dt["lembur"]; ?></td>

                    <td><?= $dt["gaji_total"]; ?></td>

                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>


</div>

<?php
//SIMPAN DIBARIS PALING BAWAH UNTUK KONVERSI PDF

$content = ob_get_clean();
require_once(dirname(__FILE__) . './html2pdf/html2pdf.class.php');
try {
    $html2pdf = new HTML2PDF('P', 'A4', 'en',  array(8, 8, 8, 8));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('laporan.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}

?>