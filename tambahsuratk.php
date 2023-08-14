<?php
include "include/fungsi.php";

if(isset($_POST["submit"])) {

	if(tambahsk($_POST) > 0){
		echo "<script>
		 alert('arsip Berhasil ditambahkan');
		</script>";
	} else {
		echo "<script>
		 alert('Arsip Gagal ditambahkan');
		</script>";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-3">
						<div class="">
						<a class="btn btn-danger pull-left" href="index.php">Batal</a>
						<a class="btn btn-secondary pull-right" href="input-emptysk.php"><i class="fa fa-file"></i> Input Nanti</a>
						</div>
					</div>
                    <div class="">
	<?php
		$sql = mysqli_query($koneksi, "SELECT MAX(nomor_urut) as nurut FROM surat_keluar");
		$ambil = mysqli_fetch_array($sql);
		$auto = $ambil['nurut'];
		$auto++;
		$hasil = sprintf("%03s", $auto);
	?>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nomor Urut</label>
		<input class="form-control col-md-1" type="text" name="nomor_urut" value="<?=$hasil?>" readonly>
	</div>
    <div class="form-group">
	<label>Tanggal Surat</label>
	<input class="form-control date-picker col-md-3" name="tanggal_surat" placeholder="Pilih Tanggal Surat..." type="text" required>
	</div>
	<div class="form-group">
		<label>Nomor Surat</label>
		<input class="form-control" value="" type="text" name="nomor_surat" placeholder="Masukan Nomor Surat..." required>
	</div>
	<div class="form-group">
		<label>Perihal Surat</label>
		<input class="form-control" type="text" name="perihal_surat" placeholder="Masukan Perihal Surat">
	</div>
	<div class="form-group">
		<label>Tujuan Surat</label>
		<input type="text" class="form-control" name="tujuan_surat" placeholder="Masukan Tujuan Surat">
	</div>
	<div class="form-group">
		<label>Pilih Pengolah Surat</label>
		<select class="form-control" name="pengolah_surat">
	    <option selected>--Pilih Pengolah Surat--</option>
        <option>Furqon Jalaludin, S.IP</option>
        <option>Asom, A.Md</option>
        <option>Cecep Mulyana, S.Sos</option>
        <option>Nanang Khaeroni</option>
        <option>Ahmad Satibi, S.Sos</option>
        <option>Romli Sunarya, M.Si</option>
        <option>Sunarya, SKM</option>
        <option>Lainnya</option>
		</select>
	</div>
	<div class="form-group">
		<label>isi ringlas surat</label>
		<textarea class="form-control" name="isi_ringkas" placeholder="Tulis isi ringkasan surat disini..."></textarea>
	</div>
	<div class="form-group">
		<label>Upload File Surat</label>
			<input type="file" name="file_surat" class="form-control-file">
		</div>
    <div class="d-sm-flex align-items-center mt-4">
    <button class="btn btn-success" type="submit" name="submit">Simpan Sebagai Arsip</button>
    </div>
</form>


                    </div>
				</div>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>