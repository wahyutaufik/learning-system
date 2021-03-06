<?php 
require_once "config/get_data.php"; 
$sqlMatkul = "SELECT * FROM matakuliah GROUP BY nm_matkul";
$dataMatkul = mysql_query($sqlMatkul);
while ($findMatkul = mysql_fetch_assoc($dataMatkul)) {
	$matkul[] = $findMatkul;
}

$sqlBab = "SELECT * FROM bab";
$dataBab = mysql_query($sqlBab);
while ($findBab = mysql_fetch_assoc($dataBab)) {
	$bab[] = $findBab;
}
?>
<?php foreach ($datas as $key => $soal): ?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=simpan" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Mata Kuliah </label>
				<div class="col-sm-10">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<input type="hidden" name="id_dosen" value="<?php echo $_SESSION['id'] ?>">
					<select name="id_matkul" id="matkul" class="col-xs-10 col-sm-5" disabled>
						<option value="">-Pilih Mata Kuliah-</option>
						<?php foreach ($matkul as $key => $matkul): ?>
							<option value="<?php echo $matkul['id'] ?>" <?php if($matkul['id'] == $soal['matakuliah']) echo "selected"; ?>><?php echo $matkul['nm_matkul'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Bab </label>
				<div class="col-sm-10">
					<select name="id_bab" class="col-xs-10 col-sm-5" disabled>
						<option value="">-Pilih Bab-</option>
						<?php foreach ($bab as $key => $bab): ?>
							<option value="<?php echo $bab['id'] ?>"<?php if($bab['id'] = $soal['id_bab']) echo "selected"; ?>><?php echo $bab['nama'] ?></option>
						<?php endforeach ?>
					</select>
					<input type="hidden" name="id_dosen" value="<?php echo $_SESSION['id'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Pertanyaan </label>
				<div class="col-sm-10">
					<textarea name="pertanyaan" placeholder="Pertanyaan" class="col-xs-10 col-sm-5" disabled><?php echo $soal['pertanyaan'] ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Pilihan A </label>
				<div class="col-sm-10">
					<input type="text" name="pilihan_a" placeholder="Pilihan A" class="col-xs-10 col-sm-5" value="<?php echo $soal['pilihan_a'] ?>" disabled autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Pilihan B </label>
				<div class="col-sm-10">
					<input type="text" name="pilihan_b" placeholder="Pilihan B" class="col-xs-10 col-sm-5" value="<?php echo $soal['pilihan_b'] ?>" disabled autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Pilihan C </label>
				<div class="col-sm-10">
					<input type="text" name="pilihan_c" placeholder="Pilihan C" class="col-xs-10 col-sm-5" value="<?php echo $soal['pilihan_c'] ?>" disabled autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Pilihan D </label>
				<div class="col-sm-10">
					<input type="text" name="pilihan_d" placeholder="Pilihan D" class="col-xs-10 col-sm-5" value="<?php echo $soal['pilihan_d'] ?>" disabled autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Jawaban Benar </label>
				<div class="col-sm-10">
					<input type="text" name="jawaban_benar" placeholder="Jawaban Benar" class="col-xs-10 col-sm-5" value="<?php echo $soal['jawaban_benar'] ?>" disabled autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Image </label>
				<div class="col-sm-10">
					<?php if (empty($soal['image'])): ?>
					<input type="text"class="col-xs-10 col-sm-5" value="No Image" readonly>
					<?php else: ?>
					<img src="layout/images/soal/<?php echo $soal['image'] ?>" width="200">
					<?php endif ?>
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
		</form>
	</div>
</div>
<?php endforeach ?>