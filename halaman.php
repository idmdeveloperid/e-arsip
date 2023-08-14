<?php
require 'include/fungsi.php';

$ns = $_GET["id"];
$s = query("SELECT * FROM format_surat WHERE id = '$ns'");
header('Location: print.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .tanggal_surat {
        text-align: right;
    }
    table, th, tr, td {
        border: 1px solid white;
    }
</style>
<body>
    <table>
        <?php foreach($s as $a) : ?>
        <tr>
    <td width="15%"></td>
    <td width="2%"></td>
    <td width="30%"></td>
    <td width="10%"></td>
    <td width="6%"></td>
    <td width="40%">Pedes, 28 September 2022 <br></td>
    </tr>
        <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>Kepada :</td>
    </tr>
        <tr>
            <td >Nomor Surat</td>
            <td>:</td>
            <td><?= $a["nomor_surat"]; ?></td>
            <td></td>
            <td>Yth.</td>
            <td><?= $a["tujuan_surat"]; ?></td>
        </tr>
        <tr>
            <td >Sifat</td>
            <td>:</td>
            <td><?= $a["sifat_surat"]; ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td >Lampiran</td>
            <td>:</td>
            <td><?= $a["lampiran"]; ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td >Perihal</td>
            <td>:</td>
            <td><?= $a["perihal_surat"]; ?></td>
            <td></td>
            <td></td>
            <td>di-</td>
        </tr>
        <tr>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-align:center;">T E M P A T</td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>