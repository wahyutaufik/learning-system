<?php  
require_once "config/get_data.php";
$queryMatkul = mysql_query("SELECT * FROM matakuliah_dosen WHERE id_dosen = $id");
while ($finsMatkul = mysql_fetch_assoc($queryMatkul)) {
	$dataMatkul[] = $finsMatkul;
}
?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=simpan" method="POST" class="form-horizontal">
			<?php foreach ($datas as $key => $dosen): ?>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Username </label>
				<div class="col-sm-10">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>" readonly>
					<input type="text" name="username" placeholder="Username" class="col-xs-10 col-sm-5" value="<?php echo $dosen['username'] ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Password </label>
				<div class="col-sm-10">
					<input type="password" name="password" placeholder="Password" class="col-xs-10 col-sm-5" value="<?php echo base64_decode($dosen['password']) ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Nama Lengkap </label>
				<div class="col-sm-10">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="col-xs-10 col-sm-5" value="<?php echo $dosen['nama'] ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Email </label>
				<div class="col-sm-10">
					<input type="email" name="email" placeholder="Email" class="col-xs-10 col-sm-5" value="<?php echo $dosen['email'] ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Telpon </label>
				<div class="col-sm-10">
					<input type="number" name="telpon" placeholder="Telpon" class="col-xs-10 col-sm-5" value="<?php echo $dosen['telpon'] ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Foto </label>
				<div class="col-sm-10">
					<?php if (empty($dosen['image'])): ?>
					<input type="text"class="col-xs-10 col-sm-5" value="No Photo" readonly>
					<?php else: ?>
					<img src="layout/images/dosen/<?php echo $dosen['image'] ?>" width="200">
					<?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Mata Kuliah </label>
				<div class="col-sm-10">
					<div class="col-xs-12 col-sm-10 widget-container-col">
						<div class="widget-box widget-color-blue">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">
									<i class="ace-icon fa fa-table"></i>
									Tabel Matakuliah Dosen
								</h5>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-striped table-bordered table-hover">
										<thead class="thin-border-bottom">
											<tr>
												<th>
													<i class="ace-icon fa fa-bookmark"></i>
													Kelas
												</th>

												<th>
													<i class="fa fa-list"></i>
													Mata Kuliah
												</th>
											</tr>
										</thead>

										<tbody>
										<?php foreach ($dataMatkul as $key => $matkul): ?>
											<tr>
												<td>
													<?php 
													$getKelas = mysql_query("SELECT * FROM kelas WHERE id = $matkul[id_kelas]"); 
													while ($listKelas = mysql_fetch_assoc($getKelas)) {
														echo $listKelas['nama'];
													}
													?>
												</td>
												<td>
													<?php 
													$getMatkul = mysql_query("SELECT * FROM matakuliah WHERE id = $matkul[id_matkul]"); 
													while ($listMatkul = mysql_fetch_assoc($getMatkul)) {
														echo $listMatkul['nm_matkul'];
													}
													?>
												</td>
											</tr>
										<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<a href="index.php?p=update<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-info" type="submit" id="submit">
						<i class="ace-icon fa fa-edit bigger-110"></i>
						Edit
					</a>

					&nbsp; &nbsp; &nbsp;
					<a href="index.php?p=delete<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-danger" type="reset">
						<i class="ace-icon fa fa-trash bigger-110"></i>
						Hapus
					</a>

					&nbsp; &nbsp; &nbsp;
					<a href="index.php?p=list<?php echo ucfirst($modulecase); ?>" class="btn btn-success">
						<i class="ace-icon fa fa-backward bigger-110"></i>
						Kembali
					</a>
				</div>
			</div>
			<?php endforeach ?>
		</form>
	</div>
</div>