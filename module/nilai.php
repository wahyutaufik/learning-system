<?php  
$queryNilai = "SELECT * FROM nilailatihan WHERE id_mahasiswa = $_SESSION[id]";
$getNilai = mysql_query($queryNilai);
while ($findNilai = mysql_fetch_assoc($getNilai)) {
	$queryLatihan = "SELECT * FROM latihan WHERE id = $findNilai[id_latihan]";
	$getLatihan = mysql_query($queryLatihan);
	while ($findLatihan = mysql_fetch_assoc($getLatihan)) {
		$queryMateri = "SELECT * FROM materi WHERE id = $findLatihan[id_materi]";
		$getMateri = mysql_query($queryMateri);
		while ($findMateri = mysql_fetch_assoc($getMateri)) {
			$queryBab = "SELECT * FROM bab WHERE id = $findMateri[id_bab]";
			$getBab = mysql_query($queryBab);
			while ($findBab = mysql_fetch_assoc($getBab)) {
				$namaBab[] = $findBab;
			}	
		}
		$queryMatkul = "SELECT * FROM matakuliah WHERE id = $findLatihan[id_matkul]";
		$getMatkul = mysql_query($queryMatkul);
		while ($findMatkul = mysql_fetch_assoc($getMatkul)) {
			$matkul[] = $findMatkul;
		}
	}
	$nilai[] = $findNilai;
}

$queryNilaiUjian = "SELECT * FROM nilaiujian WHERE id_mahasiswa = $_SESSION[id] ";
$getNilaiUjian = mysql_query($queryNilaiUjian);
while ($findNilaiUjian = mysql_fetch_assoc($getNilaiUjian)) {
	$queryUjian = "SELECT * FROM ujian WHERE id = $findNilaiUjian[id_ujian] ";
	$getUjian = mysql_query($queryUjian);
	while ($findUjian = mysql_fetch_assoc($getUjian)) {
		$queryMatkulUjian = "SELECT * FROM matakuliah WHERE id = $findUjian[id_matkul]";
		$getMatkulUjian = mysql_query($queryMatkulUjian);
		while ($findMatkulUjian = mysql_fetch_assoc($getMatkulUjian)) {
			$matkulUjian[] = $findMatkulUjian;
		}
	}
	$nilaiUjian[] = $findNilaiUjian;
}

$queryMatkulUser = "SELECT* FROM matakuliah WHERE id_kelas = $_SESSION[kelas]";
$getMatkulUser = mysql_query($queryMatkulUser);
while ($findMatkulUser = mysql_fetch_assoc($getMatkulUser)) {
	$dataMatkulUser[] = $findMatkulUser;
}

?>
<style>
	@media print{
		button#print {display: none;}
		.footer {display: none;}
	}
	.page-header{display: none;}
</style>

<div>
	<h3 class="header smaller lighter green"><b>Nilai Latihan</b></h3>
	<div class="widget-box widget-color-blue ui-sortable-handle" style="opacity: 1; z-index: 0;">
		<div class="widget-header">
			<h5 class="widget-title bigger lighter">
				<i class="ace-icon fa fa-table"></i>
			</h5>
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thin-border-bottom">
						<tr>
							<th>
								<i class="ace-icon fa fa-user"></i>
								Mata Kuliah
							</th>

							<th>
								<i class="ace-icon fa fa-user"></i>
								Latihan
							</th>

							<th>
								<i class="fa fa-laptop"></i>
								Nilai
							</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($nilai as $key => $nilai): ?>
							
						<tr>
							<td class=""><?php echo $matkul[$key]['nm_matkul'] ?></td>
							<td class=""><?php echo $namaBab[$key]['nama'] ?></td>
							<td><?php echo $nilai['nilai'] ?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div>
	<h3 class="header smaller lighter green"><b>Nilai Ujian</b></h3>
	<div class="widget-box widget-color-blue ui-sortable-handle" style="opacity: 1; z-index: 0;">
		<div class="widget-header">
			<h5 class="widget-title bigger lighter">
				<i class="ace-icon fa fa-table"></i>
			</h5>
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thin-border-bottom">
						<tr>
							<th>
								<i class="ace-icon fa fa-user"></i>
								Mata Kuliah
							</th>

							<th>
								<i class="fa fa-laptop"></i>
								Nilai
							</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($nilaiUjian as $key => $nilaiUjian): ?>
							
						<tr>
							<td class=""><?php echo $matkulUjian[$key]['nm_matkul'] ?></td>
							<td><?php echo $nilaiUjian['nilai'] ?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<button class="btn btn-app btn-light btn-xs" id="print">
	<i class="ace-icon fa fa-print bigger-160"></i>
	Print
</button>
<script src="dist/js/jquery.min.js"></script>
<script type="text/javascript">
	$('button#print').on('click', function(evt) {
        evt.preventDefault();
        evt.stopImmediatePropagation();
        window.print();
    });
</script>