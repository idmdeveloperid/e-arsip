<?php
require 'include/fungsi.php';

$id = $_GET["id"];

if( delsm($id) > 0) {
   echo "<script>
    alert('Arsip Berhasil dihapus!');
    document.location.href = 'surat-masuk.php';
   </script>";
} else {
   echo "<script>
    alert('Arsip Gagal dihapus!');
    document.location.href = 'surat-masuk.php';
   </script>";
}

?>