<?php 
include "include/fungsi.php"; 
$id = $_GET["id"];
$a = query("SELECT * FROM surat_keluar WHERE id = $id")[0];

if(isset($_POST["ubah"])) {

	if(updatesk($_POST)){
		echo "<script>
		 alert('Perubahan Arsip Berhasil');
		 window.location.href = 'detail-suratk.php?id=$id';
		</script>";
	} else {
		echo "<script>
		 alert('Tidak Ada Perubahan!');
		 window.location.href = 'detail-suratk.php?id=$id';
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
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-3">
						<div class="">
						<a class="btn btn-secondary pull-left" href="surat-keluar.php">Kembali</a>
						<a class="btn btn-danger pull-right" href="delsk.php?id=<?= $a["id"] ;?>" onclick="return confirm('Hapus Arsip??');"><i class="fa fa-trash"></i> Hapus</a>
						</div>
					</div>
						<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group row">
							<div class="col-sm-12 col-md-1">
								<input class="form-control" name="id" type="hidden" value="<?= $a["id"] ;?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nomor Urut</label>
							<div class="col-sm-12 col-md-1">
								<input class="form-control" name="nomor_urut" type="text" value="<?= $a["nomor_urut"] ;?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal Surat</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="tanggal_surat" type="text" value="<?= $a["tanggal_surat"] ;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nomor Surat</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="nomor_surat" value="<?= $a["nomor_surat"] ;?>" type="text">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Perihal Surat</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="perihal_surat" value="<?= $a["perihal_surat"] ;?>" type="text">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tujuan Surat</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="tujuan_surat" value="<?= $a["tujuan_surat"] ;?>" type="text">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Pengolah Surat</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="pengolah_surat" value="<?= $a["pengolah_surat"] ;?>" type="text">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Isi Ringkas</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="isi_ringkas" value="<?= $a["isi_ringkas"] ;?>" type="text">
							</div>
						</div>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="file_lama" value="<?= $a["file_surat"] ;?>" type="hidden">
							</div>
						<div class="form-group">
							<label>File Arsip</label>
								<input type="file" name="file_baru" class="form-control-file">
							</div>
							<div class="mt-4 mb-3">
						<button class="btn btn-primary" type="submit" name="ubah"><i class="fa fa-save"></i> Simpan Perubahan</button>
						</div>
					</form>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>