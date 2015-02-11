<?php  
require_once "config/get_data.php";
$sqlJurusan   = "SELECT * FROM jurusan";
$findJurusan = mysql_query($sqlJurusan);
while ($dataJurusan = mysql_fetch_assoc($findJurusan)) {
	$jurusan[] = $dataJurusan;
}
$sqlSemester = "SELECT * FROM semester";
$findSemester = mysql_query($sqlSemester);
while ($dataSemester = mysql_fetch_assoc($findSemester)) {
	$semester[] = $dataSemester;
}
?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=simpan" method="POST" class="form-horizontal">
			<?php foreach ($datas as $key => $kelas): ?>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right"> Jurusan </label>
					<div class="col-sm-10">
						<select name="id_jurusan" class="col-xs-10 col-sm-5" multiple="multiple" disabled="true">
							<option value="">-Pilih Jurusan-</option>
							<?php foreach ($jurusan as $key => $j): ?>
								<option value="<?php echo $j['id'] ?>" <?php if($j['id'] == $kelas['id_jurusan']) echo "selected"; ?>><?php echo $j['nm_jurusan'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Semester </label>
				<div class="col-sm-10">
					<select name="id_semester" class="col-xs-10 col-sm-5" disabled="true">
						<option value="">-Pilih Semester-</option>
						<?php foreach ($semester as $key => $s): ?>
							<option value="<?php echo $s['id'] ?>" <?php if($s['id'] == $kelas['id_semester']) echo "selected"; ?>><?php echo $s['semester'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right"> Nama Kelas </label>
					<div class="col-sm-10">
						<input type="text" value="<?php echo $kelas['nama'] ?>" name="nama" placeholder="Nama Kelas" class="col-xs-10 col-sm-5" readonly>
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