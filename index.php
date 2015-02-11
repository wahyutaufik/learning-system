<?php 
session_start();
include "config/koneksi.php";
require_once "config/flash_info.php";
$module = 'E-Learning Diploma Tiga';
if (empty($_SESSION)) {
    header("Location:module/login.php");
}
if (!empty($_GET['p'])) {
	$module = $_GET['p']; 
}
$page = ucfirst(substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1));

?>


<!DOCTYPE html>
<html lang="en">
	
<style>
	.field-more a.remove { position: absolute; margin-left: -300px; margin-top: 30px; }
</style>
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo ucfirst($module) ?> - LMS</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="dist/css/font-awesome.min.css" />
		<link rel="stylesheet" href="dist/css/font-googleapis.css" />
		<link rel="stylesheet" href="dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="dist/css/custom.css" />
		<link type="image/x-icon" href="dist/images/favicon.ico" rel="Shortcut icon">

		<script src="dist/js/ace-extra.min.js"></script>
		<style>
			table a.sorting{text-decoration: none;}
		</style>

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-book"></i>
							E-LEARNING AKADEMI DIPLOMA TIGA
						</small>
					</a>
				</div>

				<?php require "navbar.php" ?>
			</div>
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<?php require "sidebar.php" ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
							</li>
							<li class="active"><?php echo $page; ?></li>
						</ul>
					</div>
					<?php echo flash(); ?>
					<div class="page-content">
						<div class="page-header">
							<h1>
								<?php echo ucfirst($module) ?>
							</h1>
						</div>
						<?php require "halaman.php" ?>
					</div>
				</div>
			</div>

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">E-LEARNING</span>
							AKADEMI DIPLOMA III &copy; 2014-2015 
							<span class="blue bolder">WAHYU TAUFIK</span>
						</span>

					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>


		<script type="text/javascript">
			window.jQuery || document.write("<script src='dist/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<script src="dist/js/jquery.min.js"></script>
		<script src="dist/js/clock.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script src="dist/js/jquery.sparkline.min.js"></script>
		<script src="dist/js/jquery.dataTables.min.js"></script>
		<script src="dist/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="dist/js/ace-elements.min.js"></script>
		<script src="dist/js/ace.min.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
				$(document).ready(function() {
	                $('#sample-table-2').dataTable();
	            });
	            $(".alert").click(function() {
	                $(this).addClass("hide");
	            });
			})
		</script>
	</body>

</html>
