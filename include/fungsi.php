<?php

require 'koneksi.php';
// fungsi ambil data
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row; 
    }
    return $rows;
}

// fungsi tambah surat masuk
function tambahsm($data) {
 global $koneksi;

	$nomor_urut     = $data["nomor_urut"];
	$tanggal_diterima  = htmlspecialchars($data["tanggal_diterima"]);
	$tanggal_surat  = htmlspecialchars($data["tanggal_surat"]);
	$nomor_surat    = htmlspecialchars($data["nomor_surat"]);
	$perihal_surat  = htmlspecialchars($data["perihal_surat"]);
	$asal_surat   = htmlspecialchars($data["asal_surat"]);
	$ditujukan = htmlspecialchars($data["ditujukan"]);
	$isi_ringkas	= htmlspecialchars($data["isi_ringkas"]);

// upload gambar
	$file_surat		= uploadsm();
    if(!$file_surat) {
        return false;
    }

	$query = "INSERT INTO surat_masuk VALUES ('','$nomor_urut', '$tanggal_diterima','$tanggal_surat','$nomor_surat',
			 '$perihal_surat','$asal_surat','$ditujukan','$isi_ringkas','$file_surat')";
	
	mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}


function emptysm($data) {
 global $koneksi;

	$nomor_urut     = $data["nomor_urut"];
	$tanggal_diterima  = htmlspecialchars($data["tanggal_diterima"]);
	$tanggal_surat  = htmlspecialchars($data["tanggal_surat"]);
	$nomor_surat    = htmlspecialchars($data["nomor_surat"]);
	$perihal_surat  = htmlspecialchars($data["perihal_surat"]);
	$asal_surat   = htmlspecialchars($data["asal_surat"]);
	$ditujukan = htmlspecialchars($data["ditujukan"]);
	$isi_ringkas	= htmlspecialchars($data["isi_ringkas"]);
    $file_surat = '';


	$query = "INSERT INTO surat_masuk VALUES ('','$nomor_urut', '$tanggal_diterima','$tanggal_surat','$nomor_surat',
			 '$perihal_surat','$asal_surat','$ditujukan','$isi_ringkas','$file_surat')";
	
	mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}

// fungsi tambah surat keluar
function emptysk($arsip) {
    global $koneksi;

	$nomor_urut     = $arsip["nomor_urut"];
	$tanggal_surat  = htmlspecialchars($arsip["tanggal_surat"]);
	$nomor_surat    = htmlspecialchars($arsip["nomor_surat"]);
	$perihal_surat  = htmlspecialchars($arsip["perihal_surat"]);
	$tujuan_surat   = htmlspecialchars($arsip["tujuan_surat"]);
	$pengolah_surat = htmlspecialchars($arsip["pengolah_surat"]);
	$isi_ringkas	= htmlspecialchars($arsip["isi_ringkas"]);
// upload gambar
	$file_surat		= '';

	$query = "INSERT INTO surat_keluar VALUES ('','$nomor_urut','$tanggal_surat','$nomor_surat',
			 '$perihal_surat','$tujuan_surat','$pengolah_surat','$isi_ringkas','$file_surat')";
	
	mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


// fungsi tambah surat keluar
function tambahsk($arsip) {
    global $koneksi;

	$nomor_urut     = $arsip["nomor_urut"];
	$tanggal_surat  = htmlspecialchars($arsip["tanggal_surat"]);
	$nomor_surat    = htmlspecialchars($arsip["nomor_surat"]);
	$perihal_surat  = htmlspecialchars($arsip["perihal_surat"]);
	$tujuan_surat   = htmlspecialchars($arsip["tujuan_surat"]);
	$pengolah_surat = htmlspecialchars($arsip["pengolah_surat"]);
	$isi_ringkas	= htmlspecialchars($arsip["isi_ringkas"]);
// upload gambar
	$file_surat		= uploadsk();
    if(!$file_surat) {
        return false;
    }

	$query = "INSERT INTO surat_keluar VALUES ('','$nomor_urut','$tanggal_surat','$nomor_surat',
			 '$perihal_surat','$tujuan_surat','$pengolah_surat','$isi_ringkas','$file_surat')";
	
	mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi upload surat masuk
function uploadsm(){
    $namafile = $_FILES['file_surat']['name'];
	$ukuranfile = $_FILES['file_surat']['size'];
	$error = $_FILES['file_surat']['error'];
	$tmpname = $_FILES['file_surat']['tmp_name'];

    // cek upload pdf
    if($error === 4) {
        echo "
        <script>
        alert('Pilih File Terlebih Dahulu');
        </script>";
    }

    // cek ektensi file
    $ekstensivalid = ['pdf', 'jpg'];
    $ekstensifile = explode('.', $namafile);
    $ekstensifile = strtolower(end($ekstensifile));
    if(!in_array($ekstensifile, $ekstensivalid)) {
       echo " <script>
        alert('File Bukan pdf dan Gambar');
        </script>";
        return false;
    }
// cek ukuran file
    if($ukuranfile > 10000000) {
        echo "
        <script>
        alert('Ukuran File Terlalu Besar');
        </script>"; 
        return false;
    }

    // membuat nama file random
    $randomname = uniqid();
    $randomname .= '.';
    $randomname .= $ekstensifile;
    // memindahkan file hasil upluad
    move_uploaded_file($tmpname, 'file/surat_masuk/'. $randomname);
    return $randomname;

}

// fungsi upload surat keluar
function uploadsk(){

    $namafile = $_FILES['file_surat']['name'];
	$ukuranfile = $_FILES['file_surat']['size'];
	$error = $_FILES['file_surat']['error'];
	$tmpname = $_FILES['file_surat']['tmp_name'];

    // cek upload pdf
    if($error === 4) {
        echo "
        <script>
        alert('Pilih File Terlebih Dahulu');
        </script>";
    }

    // cek ektensi file
    $ekstensivalid = ['pdf', 'jpg'];
    $ekstensifile = explode('.', $namafile);
    $ekstensifile = strtolower(end($ekstensifile));
    if(!in_array($ekstensifile, $ekstensivalid)) {
       echo " <script>
        alert('File Bukan pdf dan Gambar');
        </script>";
        return false;
    }
// cek ukuran file
    if($ukuranfile > 10000000) {
        echo "
        <script>
        alert('Ukuran File Terlalu Besar');
        </script>"; 
        return false;
    }

    // membuat nama file random
    $randomname = uniqid();
    $randomname .= '.';
    $randomname .= $ekstensifile;
    // memindahkan file hasil upluad
    move_uploaded_file($tmpname, 'file/surat_keluar/'. $randomname);
    return $randomname;

}

// fungsi hapus surat masuk
function delsm($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM surat_masuk WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

// fungsi hapus surat keluar
function delsk($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM surat_keluar WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

// fungsi Update Surat Masuk
function updatesm($data) {
    global $koneksi;

    $id = $data["id"];
	$nomor_urut     = $data["nomor_urut"];
    $tanggal_diterima  = htmlspecialchars($data["tanggal_diterima"]);
	$tanggal_surat  = htmlspecialchars($data["tanggal_surat"]);
	$nomor_surat    = htmlspecialchars($data["nomor_surat"]);
	$perihal_surat  = htmlspecialchars($data["perihal_surat"]);
	$asal_surat   = htmlspecialchars($data["asal_surat"]);
	$ditujukan = htmlspecialchars($data["ditujukan"]);
	$isi_ringkas	= htmlspecialchars($data["isi_ringkas"]);
    $file_lama     = $data["file_lama"];
    // cek user upload file baru atau tidak
    if($_FILES['file_baru']['error'] === 4 ) {
        $file_surat = $file_lama;
    } else {
        $file_surat = updatefilesm();
    }


	$query = "UPDATE surat_masuk SET
    nomor_urut = '$nomor_urut',
    tanggal_diterima = '$tanggal_diterima',
    tanggal_surat = '$tanggal_surat',
    nomor_surat = '$nomor_surat',
	perihal_surat = '$perihal_surat',
    asal_surat = '$asal_surat',
    ditujukan = '$ditujukan',
    isi_ringkas = '$isi_ringkas',
    file_surat = '$file_surat'
    WHERE id = '$id'";
	
	mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}

// upload update file surat masuk
function updatefilesm() {

    $namafile = $_FILES['file_baru']['name'];
	$ukuranfile = $_FILES['file_baru']['size'];
	$error = $_FILES['file_baru']['error'];
	$tmpname = $_FILES['file_baru']['tmp_name'];

    // cek upload pdf
    if($error === 4) {
        echo "
        <script>
        alert('Pilih File Terlebih Dahulu');
        </script>";
    }

    // cek ektensi file
    $ekstensivalid = ['pdf', 'jpg'];
    $ekstensifile = explode('.', $namafile);
    $ekstensifile = strtolower(end($ekstensifile));
    if(!in_array($ekstensifile, $ekstensivalid)) {
       echo " <script>
        alert('File Bukan pdf dan Gambar');
        </script>";
        return false;
    }
// cek ukuran file
    if($ukuranfile > 10000000) {
        echo "
        <script>
        alert('Ukuran File Terlalu Besar');
        </script>"; 
        return false;
    }

    // membuat nama file random
    $randomname = uniqid();
    $randomname .= '.';
    $randomname .= $ekstensifile;
    // memindahkan file hasil upluad
    move_uploaded_file($tmpname, 'file/surat_masuk/'. $randomname);
    return $randomname;
}

// fungsi update surat keluar
function updatesk($data) {
    global $koneksi;

    $id = $data["id"];
	$nomor_urut     = $data["nomor_urut"];
	$tanggal_surat  = htmlspecialchars($data["tanggal_surat"]);
	$nomor_surat    = htmlspecialchars($data["nomor_surat"]);
	$perihal_surat  = htmlspecialchars($data["perihal_surat"]);
	$tujuan_surat   = htmlspecialchars($data["tujuan_surat"]);
	$pengolah_surat = htmlspecialchars($data["pengolah_surat"]);
	$isi_ringkas	= htmlspecialchars($data["isi_ringkas"]);
    $nama_file      = $data["file_lama"];
    // cek user upload file baru atau tidak
    if($_FILES['file_baru']['error'] === 4 ) {
        $file_surat = $nama_file;
    } else {
        $file_surat = updatefilesk();
    }


	$query = "UPDATE surat_keluar SET
    nomor_urut = '$nomor_urut',
    tanggal_surat = '$tanggal_surat',
    nomor_surat = '$nomor_surat',
	perihal_surat = '$perihal_surat',
    tujuan_surat = '$tujuan_surat',
    pengolah_surat = '$pengolah_surat',
    isi_ringkas = '$isi_ringkas',
    file_surat = '$file_surat'
    WHERE id = '$id'";
	
	mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}
// upload update file surat keluar
function updatefilesk() {

    $namafile = $_FILES['file_baru']['name'];
	$ukuranfile = $_FILES['file_baru']['size'];
	$error = $_FILES['file_baru']['error'];
	$tmpname = $_FILES['file_baru']['tmp_name'];

    // cek upload pdf
    if($error === 4) {
        echo "
        <script>
        alert('Pilih File Terlebih Dahulu');
        </script>";
    }

    // cek ektensi file
    $ekstensivalid = ['pdf', 'jpg'];
    $ekstensifile = explode('.', $namafile);
    $ekstensifile = strtolower(end($ekstensifile));
    if(!in_array($ekstensifile, $ekstensivalid)) {
       echo " <script>
        alert('File Bukan pdf dan Gambar');
        </script>";
        return false;
    }
// cek ukuran file
    if($ukuranfile > 10000000) {
        echo "
        <script>
        alert('Ukuran File Terlalu Besar');
        </script>"; 
        return false;
    }

    // membuat nama file random
    $randomname = uniqid();
    $randomname .= '.';
    $randomname .= $ekstensifile;
    // memindahkan file hasil upluad
    move_uploaded_file($tmpname, 'file/surat_keluar/'. $randomname);
    return $randomname;

}

?>