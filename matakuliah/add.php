<?php  
$sqlKelas = "SELECT * FROM kelas";
$dataKelas = mysql_query($sqlKelas);
while ($findKelas = mysql_fetch_assoc($dataKelas)) {
	$kelas[] = $findKelas;
}
?>

<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=simpan" method="POST" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Kelas </label>
				<div class="col-sm-10">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<select name="id_kelas" class="col-xs-10 col-sm-5">
						<option value="">-Pilih Kelas-</option>
						<?php foreach ($kelas as $key => $kelas): ?>
							<option value="<?php echo $kelas['id'] ?>"><?php echo $kelas['nama'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Nama Mata Kuliah </label>
				<div class="col-sm-10">
					<input type="text" name="nm_matkul" placeholder="Nama Mata Kuliah" class="col-xs-10 col-sm-5" required autocomplete="off">
					<input type="hidden" name="status_dosen">
					<input type="hidden" name="status_materi">
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit" id="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Simpan
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>

					&nbsp; &nbsp; &nbsp;
					<a href="javascript:history.back()" class="btn btn-danger">
						<i class="ace-icon fa fa-backward bigger-110"></i>
						Kembali
					</a>
				</div>
			</div>
		</form>
	</div>
</div>