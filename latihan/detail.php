<?php  
$id = $_GET['id'];
$no = 1;
$sqlLatihan         = mysql_query("SELECT * FROM latihan WHERE id = $_GET[id]");
while ($findLatihan = mysql_fetch_assoc($sqlLatihan)) {
	$dataLatihan[]  = $findLatihan;
	
	$sqlKelas         = mysql_query("SELECT nama FROM kelas WHERE id = $findLatihan[id_kelas]");
	while ($findKelas = mysql_fetch_assoc($sqlKelas)) {
		$dataKelas[]  = $findKelas;
	}

	$sqlMatkul         = mysql_query("SELECT nm_matkul FROM matakuliah WHERE id = $findLatihan[id_matkul]");
	while ($findMatkul = mysql_fetch_assoc($sqlMatkul)) {
		$dataMatkul[]  = $findMatkul;
	}

	$sqlMateri         = mysql_query("SELECT judul FROM materi WHERE id = $findLatihan[id_materi]");
	while ($findMateri = mysql_fetch_assoc($sqlMateri)) {
		$dataMateri[]  = $findMateri;
	}
	
	$sqlSoalLatihan         = mysql_query("SELECT * FROM soal_latihan WHERE id_latihan = $findLatihan[id]");
	while ($findSoalLatihan = mysql_fetch_assoc($sqlSoalLatihan)) {
		
		$dataSoalLatihan[]  = $findSoalLatihan;

	}

}

?>
<div class="row">
	<div class="col-xs-12">
		<div class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> <b>Kelas</b> </label>
				<div class="col-sm-10" style="margin-top:8px; text-align:left;">
					<label class="col-sm-5"> <?php echo $dataKelas[0]['nama'] ?> </label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> <b>Mata Kuliah</b> </label>
				<div class="col-sm-10" style="margin-top:8px; text-align:left;">
					<label class="col-sm-5"> <?php echo $dataMatkul[0]['nm_matkul'] ?> </label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> <b>Materi</b> </label>
				<div class="col-sm-10" style="margin-top:8px; text-align:left;">
					<label class="col-sm-5"> <?php echo $dataMateri[0]['judul'] ?> </label>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="widget-box widget-color-blue ui-sortable-handle" style="opacity: 1; z-index: 0;">
	<div class="widget-header">
		<h5 class="widget-title bigger lighter">
			<i class="ace-icon fa fa-table"></i>
			Soal Latihan
		</h5>
	</div>

	<div class="widget-body">
		<div class="widget-main no-padding">
			<table class="table table-striped table-bordered table-hover">
				<thead class="thin-border-bottom">
					<tr>
						<th width="8%">
							<i class="ace-icon fa fa-list"></i>
							Nomor
						</th>

						<th>
							<i class="fa fa-cogs"></i>
							Soal
						</th>
						<th>
							<i class="fa fa-bookmark-o"></i>
							Pilihan Ganda
						</th>
					</tr>
				</thead>

					<?php foreach ($dataSoalLatihan as $key => $soalLatihan): ?>
						
					<tr>
						<td align="center"><?php echo $no++; ?></td>

						<td>
							<?php 
							$idSoal = $dataSoalLatihan[$key]['id_soal'];
							// var_dump($dataSoalLatihan[$key]['id_soal']);
							$sqlSoal = mysql_query("SELECT * FROM soal WHERE id = $idSoal");
							while ($findSoal = mysql_fetch_assoc($sqlSoal)) {
							echo $findSoal['pertanyaan'];
							?>
						</td>
						<td>
							A. <?php echo $findSoal['pilihan_a'] ?> <br>
							B. <?php echo $findSoal['pilihan_b'] ?> <br>
							C. <?php echo $findSoal['pilihan_c'] ?> <br>
							D. <?php echo $findSoal['pilihan_d'] ?> <br>
						</td>
							<?php  
							}
							?>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">

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