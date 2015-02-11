<div class="row">
	<div class="col-xs-12">
		<div class="error-container">
			<div class="well">
				<h1 class="grey lighter smaller">
					<span class="blue bigger-125">
						<i class="ace-icon fa fa-bell icon-animated-wrench bigger-125"></i>
					</span>
					Selamat Datang <?php echo $_SESSION['username'] ?>
				</h1>

				<hr>
				<h3 class="lighter smaller">
					Saat ini Anda berada di situs E-Learning Akademi Diploma Tiga (DIII)
				</h3>

				<div class="space"></div>

				<?php if ($_SESSION['akses'] == 3): ?>
				<div>
					<h4 class="lighter smaller">Situs ini dikhususkan bagi mahasiswa/mahasiswi Akademi Diploma Tiga (DIII) dalam:</h4>

					<ul class="list-unstyled spaced inline bigger-110 margin-15">
						<li>
							<i class="ace-icon fa fa-hand-o-right blue"></i>
							Mengikuti Perkuliahan
						</li>

						<li>
							<i class="ace-icon fa fa-hand-o-right blue"></i>
							Memperoleh informasi nilai
						</li>

						<li>
							<i class="ace-icon fa fa-hand-o-right blue"></i>
							Mengikuti Ujian Online
						</li>

						<li>
							<i class="ace-icon fa fa-hand-o-right blue"></i>
							Dll
						</li>
					</ul>

					<h3 class="lighter smaller">Terima Kasih</h3>
				</div>
				<?php elseif ($_SESSION['akses'] == 1): ?>
				<div>
					<h4 class="lighter smaller">Anda adalah Administrator dan dapat mengakses seluruh isi data pada aplikasi ini</h4>


					<h3 class="lighter smaller">Terima Kasih</h3>
				</div>
				<?php elseif ($_SESSION['akses'] == 2): ?>
				<div>
					<h4 class="lighter smaller">Anda adalah Dosen dan hanya dapat mengakses dan menambah data perkuliahan saja</h4>


					<h3 class="lighter smaller">Terima Kasih</h3>
				</div>
				<?php endif ?>

				<hr>
				<div class="space"></div>

			</div>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div>