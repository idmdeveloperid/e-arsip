<?php
session_start();
if(!isset($_SESSION["kode_akses"])) {
	header('Location: login.php');
}
?>

<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="menu-icon ml-3">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown mt-3">
				<h6 class="text-primary"><i class="fa fa-file"></i> E-Arsip Pedes</h6>
			</div>
			<div class="user-info-dropdown">
				<!-- <div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name">Ibnudharma</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profile.php"><i class="fa fa-user-md" aria-hidden="true"></i> Profile</a>
						<a class="dropdown-item" href="profile.php"><i class="fa fa-cog" aria-hidden="true"></i> Ganti Password</a>
						<a class="dropdown-item" href="#"><i class="fa fa-question" aria-hidden="true"></i> Help</a>
						<a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div> -->
				</div>
			</div>
		</div>
	</div>