<?php  
$no = 1;
$getLatihan = mysql_query("SELECT * FROM latihan WHERE id_kelas = $_SESSION[kelas] AND id_materi = $_GET[id_materi]");
while ($findLatihan = mysql_fetch_assoc($getLatihan)) {
	$getMateri = mysql_query("SELECT *FROM materi WHERE id = $findLatihan[id_materi]");
	while ($findMateri = mysql_fetch_assoc($getMateri)) {
		$getBab = mysql_query("SELECT * FROM bab WHERE id = $findMateri[id_bab]");
		while ($findBab = mysql_fetch_assoc($getBab)) {
			$dataBab[] = $findBab;
		}
	}
	$dataLatihan[] = $findLatihan;
	$getSoalLatihan = mysql_query("SELECT * FROM soal_latihan WHERE id_latihan = $findLatihan[id]");
	while ($findSoalLatihan = mysql_fetch_assoc($getSoalLatihan)) {
		$getSoal = mysql_query("SELECT * FROM soal WHERE id = $findSoalLatihan[id_soal]");
		while ($findSoal = mysql_fetch_assoc($getSoal)) {
			$dataSoal[] = $findSoal;
		}
	}
}
?>

<form action="index.php?p=saveSoalLatihan" method="POST">
	<input type="hidden" name="id_latihan" value="<?php echo $dataLatihan[0]['id'] ?>">
	<input type="hidden" name="id_bab" value="<?php echo $dataBab[0]['id'] ?>">
	<input type="hidden" name="id_materi" value="<?php echo $_GET['id_materi'] ?>">
	<?php foreach ($dataSoal as $key => $soal): ?>
		<?php $key = $key+1 ?>
		<div class="control-group">
			<label class="control-label bolder blue"><?php echo $no++ ?>. &emsp;</label>
			<label class="control-label bolder blue"><?php echo $soal['pertanyaan'] ?></label>
			<?php if (!empty($soal['image'])): ?>
				
			<img src="layout/images/soal/<?php echo $soal['image'] ?>" width="100">
			<?php endif ?>
			<input type="hidden" name="id_soal[]" value="<?php echo $soal['id'] ?>">
			<div class="radio">
			&emsp;
				<label>
					<input required name="jawaban-<?php echo $key ?>" value="A" type="radio" class="ace">
					<span class="lbl"> <?php echo $soal['pilihan_a'] ?></span>
				</label>
			</div>
			<div class="radio">
			&emsp;
				<label>
					<input required name="jawaban-<?php echo $key ?>" value="B" type="radio" class="ace">
					<span class="lbl"> <?php echo $soal['pilihan_b'] ?></span>
				</label>
			</div>
			<div class="radio">
			&emsp;
				<label>
					<input required name="jawaban-<?php echo $key ?>" value="C" type="radio" class="ace">
					<span class="lbl"> <?php echo $soal['pilihan_c'] ?></span>
				</label>
			</div>
			<div class="radio">
			&emsp;
				<label>
					<input required name="jawaban-<?php echo $key ?>" value="D" type="radio" class="ace">
					<span class="lbl"> <?php echo $soal['pilihan_d'] ?></span>
				</label>
			</div>
		</div>
		
	<?php endforeach ?>
	<button class="btn btn-info" type="submit" id="submit">
		<i class="ace-icon fa fa-check bigger-110"></i>
		<b>Simpan Jawaban</b>
	</button>
</form>