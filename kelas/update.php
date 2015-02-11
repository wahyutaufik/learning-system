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
		<form action="index.php?p=update" method="POST" class="form-horizontal">
			<?php foreach ($datas as $key => $kelas): ?>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Jurusan </label>
				<div class="col-sm-10">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<select name="id_jurusan" class="col-xs-10 col-sm-5" multiple="multiple">
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
					<select name="id_semester" class="col-xs-10 col-sm-5">
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
					<input type="text" name="nama" value="<?php echo $kelas['nama'] ?>" placeholder="Nama Bab" class="col-xs-10 col-sm-5" required autocomplete="off">
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit" id="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Simpan
					</button>

					&nbsp; &nbsp; &nbsp;
					<a href="javascript:history.back()" class="btn btn-danger" type="reset">
						<i class="ace-icon fa fa-trash bigger-110"></i>
						Batal
					</a>

					&nbsp; &nbsp; &nbsp;
					<a href="index.php?p=list<?php echo ucfirst($modulecase); ?>" class="btn btn-success">
						<i class="ace-icon fa fa-list bigger-110"></i>
						List
					</a>
				</div>
			</div>
			<?php endforeach ?>
		</form>
	</div>
</div>