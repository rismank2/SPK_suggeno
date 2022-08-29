<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PT MBWI</title>
	<link rel="icon" href="dist/img/mb.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>

	<script type="text/javascript">
		function preventBack() {
			window.history.forward();
		}
		setTimeout("preventBack()", 0);
		window.onunload = function() {
			null
		};
	</script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar-->
		<nav class="main-header navbar navbar-expand navbar-default navbar-light">
			<!-- Left navbar links atas kanan-->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars"></i>
					</a>
				</li>

			</ul>
			<!-- akhir navbar links atas kanan-->
			<!-- Right navbar links -->

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="http://localhost/newspk/" class="brand-link">
				<img src="dist/img/mb.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text font-weight-light">PT MBWI</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="http://localhost/newspk/" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
							include "view/menu.php";
						}
						if ($data_level == "Check") {
							include "view/menucek.php";
						}

						?>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {
								//Klik Halaman Home Pengguna
							case 'MyApp/admin':
								include "home/admin.php";
								break;
								//Pengguna
								//awal case perhitungan
							case 'data_pr':
								include "view/data_proyek.php";
								break;
							case 'add_pro';
								include "aksi/pro/add_pro.php";
								break;
							case 'del_pro';
								include "aksi/pro/del_pro.php";
								break;
							case 'edit_pro';
								include "aksi/pro/edit_pro.php";
								break;

							case 'jenis_pr':
								include "view/jenis_pr.php";
								break;

							case 'data_var':
								include "view/data_var.php";
								break;

							case 'data_rules':
								include "view/data_rules.php";
								break;

							case 'data_esti':
								include "view/data_esti.php";
								break;

								//AWAL
								//rules aksi
							case 'add_rules':
								include "aksi/rules/add_rules.php";
								break;

							case 'del_rules':
								include "aksi/rules/del_rules.php";
								break;

							case 'edit_rules':
								include "aksi/rules/edit_rules.php";
								break;
								//estimasi aksi
							case 'add_esti':
								include "aksi/estimasi/add_esti.php";
								break;
							case 'del_esti':
								include "aksi/estimasi/del_esti.php";
								break;
							case 'edit_esti':
								include "aksi/estimasi/edit_esti.php";
								break;
							case 'proses_esti':
								include "view/proses_esti.php";
								break;
							case 'data_detail':
								include "view/data_detail.php";
								break;

								//case jenis proyek
							case 'add_jenispro';
								include "aksi/jenispro/add_jenispro.php";
								break;
							case 'del_jenispro';
								include "aksi/jenispro/del_jenispro.php";
								break;
							case 'edit_jenispro';
								include "aksi/jenispro/edit_jenispro.php";
								break;

								//case client
							case 'data_client';
								include "view/data_client.php";
								break;
							case 'add_client';
								include "aksi/client/add_client.php";
								break;
							case 'del_client';
								include "aksi/client/del_client.php";
								break;
							case 'edit_client';
								include "aksi/client/edit_client.php";
								break;

								//case Kontrak
							case 'data_kontrak';
								include "view/data_kontrak.php";
								break;
							case 'del_kontrak';
								include "aksi/kontrak/del_kontrak.php";
								break;
							case 'edit_kontrak';
								include "aksi/kontrak/edit_kontrak.php";
								break;
							case 'add_kontrak';
								include "aksi/kontrak/add_kontrak.php";
								break;

								//case pic
							case 'data_pic';
								include "view/data_pic.php";
								break;
							case 'del_pic';
								include "aksi/pic/del_pic.php";
								break;
							case 'edit_pic';
								include "aksi/pic/edit_pic.php";
								break;
							case 'add_pic';
								include "aksi/pic/add_pic.php";
								break;
								//Akhir semua Aksi

								//akhir case perhitungan

							case 'MyApp/data_pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'MyApp/add_pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'MyApp/edit_pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'MyApp/del_pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "Mandor") {
							include "home/bendahara.php";
						} elseif ($data_level == "Check") {
							include "home/cek.php";
						}
					}
					?>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				PT Mitra Bangun Wahana Indah
			</div>
			Copyright &copy;
			All rights reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>


	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->


	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>