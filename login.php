<?php 
session_start();
include "include/fungsi.php";
if(isset($_POST["cek"])) {
      $kode_akses = $_POST["kode_akses"];
	  
      if($kode_akses === 'pedesmanis'){
        $_SESSION["kode_akses"] = true;
        echo "
        <script>
         alert('Berhasil Masuk');
         window.location.href = 'index.php';
        </script>
            ";
      } else {
        echo "
        <script>
         alert('Kode Akses Salah Silahkan Coba Lagi!!');
        </script>
            ";
      }
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-30">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<h2 class="text-center mb-30"><i class="fa fa-file"></i> E-Arsip</h2>
			<form action="" method="POST">
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" name="kode_akses" placeholder="Masukan Kode Akses" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-sm-12">
						<div class="input-group">
							<button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="cek">Masuk</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>