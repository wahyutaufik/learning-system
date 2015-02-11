<?php  
$date             = date('Y-m-d');
$sqlToUjian       = mysql_query("SELECT * FROM ujian WHERE id_kelas = $_SESSION[kelas]");
while ($findUjian = mysql_fetch_assoc($sqlToUjian)) {
	$dataUjian[]  = $findUjian;

	$sqlToMatkul  = mysql_query("SELECT * FROM matakuliah WHERE id = $findUjian[id_matkul]");
	while ($findMatkul = mysql_fetch_assoc($sqlToMatkul)) {
		$dataMatkul[] = $findMatkul;
	}

	$cekUserUjian = mysql_query("SELECT * FROM user_ujian WHERE id_mahasiswa = $_SESSION[id] AND id_ujian = $findUjian[id]");
	while ($checking = mysql_fetch_assoc($cekUserUjian)) {
		$checkStatus[] = $checking;
	}
}
?>
<div class="widget-box widget-color-blue ui-sortable-handle" style="opacity: 1; z-index: 0;">
	<div class="widget-header">
		<h5 class="widget-title bigger lighter">
			<i class="ace-icon fa fa-table"></i>
			List Ujian
		</h5>
	</div>

	<div class="widget-body">
		<div class="widget-main no-padding">
			<table class="table table-striped table-bordered table-hover">
				<thead class="thin-border-bottom">
					<tr>
						<th width="8%">
							<i class="ace-icon fa fa-folder-open-o"></i>
							Mata Kuliah
						</th>
						<th width="8%">
							<i class="ace-icon fa fa-folder-open-o"></i>
							Waktu Ujian
						</th>
					</tr>
				</thead>

					<?php foreach ($dataUjian as $key => $ujian): ?>
					<tr>
						<td><?php echo $dataMatkul[$key]['nm_matkul'] ?></td>
						<td>
							<?php  
							$date      = date('Y-m-d H:i:s');
							$jam_buka  = $ujian['tanggal_ujian'].' '.$ujian['jam_buka'];
							$jam_tutup = $ujian['tanggal_ujian'].' '.$ujian['jam_tutup'];
							?>
							<?php if (!empty($checkStatus[$key])): ?>
								<?php echo $ujian['jam_buka'].' - '.$ujian['jam_tutup'].' '."Sudah Ujian"; ?>
							<?php elseif ($jam_buka >= $date): ?>
								<?php echo $ujian['jam_buka'].' - '.$ujian['jam_tutup'].' '."Belum Waktunya Ujian" ?>
							<?php elseif ($jam_buka <= $date && $jam_tutup >= $date): ?>
								<?php echo $ujian['jam_buka'].' - '.$ujian['jam_tutup'] ?> &emsp;<a href="index.php?p=soalUjian&id_ujian=<?php echo $ujian['id'] ?>" target="_blank" class="btn btn-white btn-inverse btn-sm"><?php echo "Ujian"; ?></a>
							<?php elseif ($jam_tutup <= $date): ?>
								<?php echo $ujian['jam_buka'].' - '.$ujian['jam_tutup'].' '."Ujian Sudah Lewat" ?>
							<?php endif ?>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>