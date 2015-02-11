<?php  
$sqlMateri = mysql_query("SELECT * FROM materi WHERE id_matkul = $_GET[id_matkul]");
while ($dataMateri = mysql_fetch_assoc($sqlMateri)) {
	$findMateri[] = $dataMateri;
	$sqlMatkul    = mysql_query("SELECT nm_matkul FROM matakuliah WHERE id = $dataMateri[id_matkul] GROUP BY nm_matkul");
	while ($dataMatkul = mysql_fetch_assoc($sqlMatkul)) {
		$findMatkul[] = $dataMatkul;
	}
	$sqlKelas = mysql_query("SELECT nama FROM kelas WHERE id = $dataMateri[id_kelas]");
	while ($dataKelas = mysql_fetch_assoc($sqlKelas)) {
		$findKelas[] = $dataKelas;
	}
	$sqlBab = mysql_query("SELECT nama FROM bab WHERE id = $dataMateri[id_bab]");
	while ($dataBab = mysql_fetch_assoc($sqlBab)) {
		$findBab[] = $dataBab;
	}
}
?>
<div class="row">
	<div class="col-xs-12">
		<div class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> <b>Kelas</b> </label>
				<div class="col-sm-10" style="margin-top:8px; text-align:left;">
					<label class="col-sm-5"> <?php echo $findKelas[0]['nama'] ?> </label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> <b>Mata Kuliah</b> </label>
				<div class="col-sm-10" style="margin-top:8px; text-align:left;">
					<label class="col-sm-5"> <?php echo $findMatkul[0]['nm_matkul'] ?> </label>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="widget-box widget-color-blue ui-sortable-handle" style="opacity: 1; z-index: 0;">
	<div class="widget-header">
		<h5 class="widget-title bigger lighter">
			<i class="ace-icon fa fa-table"></i>
			Materi Mata Kuliah
		</h5>
	</div>

	<div class="widget-body">
		<div class="widget-main no-padding">
			<table class="table table-striped table-bordered table-hover">
				<thead class="thin-border-bottom">
					<tr>
						<th>
							<i class="ace-icon fa fa-user"></i>
							Bab
						</th>

						<th>
							<i class="fa fa-laptop"></i>
							Materi
						</th>
						<th colspan="2">
							<i class="fa fa-book"></i>
							Aksi
						</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($findMateri as $key => $materi): ?>
						
					<tr>
						<td class=""><?php echo $findBab[$key]['nama'] ?></td>

						<td><?php echo $materi['judul'] ?></td>

						<td>
							<a class="btn btn-white btn-inverse btn-sm" target="_blank" href="layout/images/materi/<?php echo $materi['image'] ?>"><i class="fa fa-download"></i> Download Materi</a>
						</td>

						<td>
							<?php  
							$cekUserLatihan = mysql_query("SELECT * FROM user_latihan WHERE id_mahasiswa = $_SESSION[id] AND id_materi = $materi[id]");
							while ($getUserLatihan = mysql_fetch_assoc($cekUserLatihan)) {
								$userLatihan[] = $getUserLatihan;
							}

							?>
							<?php if (is_null($userLatihan[$key])): ?>
								<a class="btn btn-white btn-inverse btn-sm" target="_blank" href="index.php?p=latihansoal&id_materi=<?php echo $materi['id'] ?>"><i class="fa  fa-pencil-square-o"></i> Latihan Soal</a>
							<?php else: ?>
								Sudah latihan
							<?php endif ?>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div><a class="btn btn-white btn-inverse btn-sm" target="_blank" href="javascript:history.back()"><i class="fa fa-backward"></i> Kembali</a>