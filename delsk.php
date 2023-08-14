<?php
require 'include/fungsi.php';

$id = $_GET["id"];

if( delsk($id) > 0) {
   echo "<script>
    alert('Arsip Berhasil dihapus!');
    document.location.href = 'surat-keluar.php';
   </script>";
} else {
   echo "<script>
    alert('Arsip Gagal dihapus!');
    document.location.href = 'surat-keluar.php';
   </script>";
}

?>