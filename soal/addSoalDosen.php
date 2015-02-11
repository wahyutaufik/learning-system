<?php  
$sqlAksesMatkul = mysql_query("SELECT id_dosen FROM matakuliah_dosen WHERE id_dosen = '$_SESSION[id]' GROUP BY id_dosen");
while ($findAksesMatkul = mysql_fetch_assoc($sqlAksesMatkul)) {
	$sqlMatkul = "SELECT * FROM matakuliah WHERE id_dosen = $findAksesMatkul[id_dosen]";
	$dataMatkul = mysql_query($sqlMatkul);
	while ($findMatkul = mysql_fetch_assoc($dataMatkul)) {
		$matkul[] = $findMatkul;
	}
}

$sqlBab = "SELECT * FROM bab";
$dataBab = mysql_query($sqlBab);
while ($findBab = mysql_fetch_assoc($dataBab)) {
	$bab[] = $findBab;
}
?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=simpanSoalDosen" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Mata Kuliah </label>
				<div class="col-sm-10">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<input type="hidden" name="id_dosen" value="<?php echo $_SESSION['id'] ?>">
					<select name="id_matkul" id="matkul" class="col-xs-10 col-sm-5" required>
						<option value="">-Pilih Mata Kuliah-</option>
						<?php foreach ($matkul as $key => $matkul): ?>
							<option value="<?php echo $matkul['id'] ?>"><?php echo $matkul['nm_matkul'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Bab </label>
				<div class="col-sm-10">
					<select name="id_bab" class="col-xs-10 col-sm-5" required>
						<option value="">-Pilih Bab-</option>
						<?php foreach ($bab as $key => $bab): ?>
							<option value="<?php echo $bab['id'] ?>"><?php echo $bab['nama'] ?></option>
						<?php endforeach ?>
					</select>
					<input type="hidden" name="id_dosen" value="<?php echo $_SESSION['id'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Pertanyaan </label>
				<div class="col-sm-10">
					<textarea name="pertanyaan" placeholder="Pertanyaan" class="col-xs-10 col-sm-5" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Pilihan A </label>
				<div class="col-sm-10">
					<input type="text" name="pilihan_a" placeholder="Pilihan A" class="col-xs-10 col-sm-5" required autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Pilihan B </label>
				<div class="col-sm-10">
					<input type="text" name="pilihan_b" placeholder="Pilihan B" class="col-xs-10 col-sm-5" required autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Pilihan C </label>
				<div class="col-sm-10">
					<input type="text" name="pilihan_c" placeholder="Pilihan C" class="col-xs-10 col-sm-5" required autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Pilihan D </label>
				<div class="col-sm-10">
					<input type="text" name="pilihan_d" placeholder="Pilihan D" class="col-xs-10 col-sm-5" required autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Jawaban Benar </label>
				<div class="col-sm-10">
					<select name="jawaban_benar" class="col-xs-10 col-sm-5" required>
						<option value="">-Pilih Jawaban Benar-</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Image </label>
				<div class="col-sm-10">
					<input type="file" name="image">
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