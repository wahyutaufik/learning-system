<?php  
$no = 1;

$getSoalUjian = mysql_query("SELECT * FROM soal_ujian WHERE id_Ujian = $_GET[id_ujian]");
while ($findSoalUjian = mysql_fetch_assoc($getSoalUjian)) {
	$getSoal = mysql_query("SELECT * FROM soal WHERE id = $findSoalUjian[id_soal]");
	while ($findSoal = mysql_fetch_assoc($getSoal)) {
		$dataSoal[] = $findSoal;
	}
}
?>

<form action="index.php?p=saveSoalUjian" method="POST">
	<input type="hidden" name="id_ujian" value="<?php echo $_GET['id_ujian'] ?>">
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
	<input type="submit" class="ace-icon fa fa-check bigger-110">
</form>