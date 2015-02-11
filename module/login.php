<?php  
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
	

<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login - E-Learning Akademi Diploma Tiga</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../dist/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../dist/css/font-googleapis.css" />
		<link rel="stylesheet" href="../dist/css/ace.min.css" />
		<link rel="stylesheet" href="../dist/css/ace-rtl.min.css" />
		<link type="image/x-icon" href="../dist/images/favicon.ico" rel="Shortcut icon">

	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<?php
		            require_once "../config/flash_info.php";
		            echo flash(); 
		            ?>
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-book green"></i>
									<span class="red">E -</span>
									<span class="white" id="id-text2">Learning</span>
								</h1>
								<h4 class="blue" id="id-company-text">
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-unlock green"></i>
												Login
											</h4>

											<div class="space-6"></div>

											<form action="cek_login.php" method="POST">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off">
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<select name="akses" class="form-control" required>
																<option>-Pilih Akses-</option>
																<option value="1">Admin</option>
																<option value="2">Dosen</option>
																<option value="3">Mahasiswa</option>
															</select>
															<i class="ace-icon fa fa-asterisk"></i>
														</span>
													</label>
													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													Daftar
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div>
								</div>

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Enter your email and to receive instructions
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Send Me!</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												Daftar User Baru
											</h4>

											<div class="space-6"></div>
											<p> Masukkan data diri: </p>

											<form action="register.php" method="POST">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" autocomplete="off" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
													
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email" class="form-control" placeholder="Email" autocomplete="off" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="number" name="telpon" class="form-control" placeholder="Telepon" autocomplete="off" />
															<i class="ace-icon fa fa-phone"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input class="form-control input-mask-date" type="date" id="form-field-mask-1" name="tanggal_lahir" Placeholder="Tanggal Lahir (yyyy-mm-dd)">
															<i class="ace-icon fa fa-calendar"></i>
														</span>
													</label>
													
													<div class="radio">
														<label class="block clearfix">
															<input name="jenis_kelamin" type="radio" class="ace radio-url" value="1">
															<span class="lbl"> Laki-Laki </span>
														</label>
														<label class="block clearfix">
															<input name="jenis_kelamin" type="radio" class="ace radio-url" value="2">
															<span class="lbl"> Perempuan </span>
														</label>
													</div>

													<?php  
														$sql = "SELECT * FROM jurusan";
														$datas = mysql_query($sql);
														while ($data = mysql_fetch_assoc($datas)) {
															$jurusan[] = $data;
														}
													?>
													<label class="block clearfix">
														<select name="id_jurusan" class="form-control" multiple="multiple">
															<option value="">-Pilih Jurusan-</option>
															<?php foreach ($jurusan as $key => $j): ?>
																<option value="<?php echo $j['id'] ?>"><?php echo $j['nm_jurusan'] ?></option>
															<?php endforeach ?>
														</select>
													</label>
													
													<input type="hidden" name="register" value="<?php echo date('Y-m-d') ?>">

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<button type="submit" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Register</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="../dist/js/jquery.min.js"></script>

		<script type="text/javascript">
			window.jQuery || document.write("<script src='dist/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
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
