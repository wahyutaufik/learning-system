<?php  
require_once "config/get_data.php";

$sqlSemester = "SELECT * FROM semester";
$dataSemester = mysql_query($sqlSemester);
while ($findSemester = mysql_fetch_assoc($dataSemester)) {
	$semester[] = $findSemester;
}

$sqlJurusan = "SELECT * FROM jurusan";
$dataJurusan = mysql_query($sqlJurusan);
while ($findJurusan = mysql_fetch_assoc($dataJurusan)) {
	$jurusan[] = $findJurusan;
}

$sqlKelas = "SELECT * FROM kelas";
$dataKelas = mysql_query($sqlKelas);
while ($findKelas = mysql_fetch_assoc($dataKelas)) {
	$kelas[] = $findKelas;
}

?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=simpan" method="POST" class="form-horizontal">
			<?php foreach ($datas as $key => $matkul): ?>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right"> Kelas </label>
					<div class="col-sm-10">
						<select name="id_kelas" class="col-xs-10 col-sm-5" disabled>
							<option value="">-Pilih Kelas-</option>
							<?php foreach ($kelas as $key => $kelas): ?>
								<option value="<?php echo $kelas['id'] ?>" <?php if($kelas['id'] == $matkul['id_kelas']) echo "selected"; ?>><?php echo $kelas['nama'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right"> Nama Mata Kuliah </label>
					<div class="col-sm-10">
						<input type="text" value="<?php echo $matkul['nm_matkul'] ?>" name="nm_matkul" class="col-xs-10 col-sm-5" readonly>
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