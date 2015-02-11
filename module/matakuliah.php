<?php  
if ($_SESSION['akses'] == 2) {
	$sqlMatkul = mysql_query("SELECT * FROM matakuliah WHERE id_dosen = $_SESSION[id]");
} else {
	$sqlMatkul = mysql_query("SELECT * FROM matakuliah WHERE id_kelas = $_SESSION[kelas]");
}
while ($mataKuliah = mysql_fetch_assoc($sqlMatkul)) {
	$kuliah[] = $mataKuliah;
	$sqlKelas = mysql_query("SELECT * FROM kelas WHERE id = $mataKuliah[id_kelas]");
	while ($findKelas = mysql_fetch_assoc($sqlKelas)) {
		$dataKelas[] = $findKelas;
	}
}
?>
<div class="widget-box widget-color-blue ui-sortable-handle" style="opacity: 1; z-index: 0;">
	<div class="widget-header">
		<h5 class="widget-title bigger lighter">
			<i class="ace-icon fa fa-table"></i>
			Kelas & Matakuliah
		</h5>
	</div>

	<div class="widget-body">
		<div class="widget-main no-padding">
			<table class="table table-striped table-bordered table-hover">
				<thead class="thin-border-bottom">
					<tr>
						<th>
							<i class="ace-icon fa fa-user"></i>
							Kelas
						</th>

						<th>
							<i class="fa fa-laptop"></i>
							Mata Kuliah
						</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($kuliah as $key => $detailKuliah): ?>
					<tr>
						<td class=""><?php echo $dataKelas[$key]['nama'] ?></td>

						<td><a href="index.php?p=materiMatkul&id_matkul=<?php echo $detailKuliah['id'] ?>"><?php echo $detailKuliah['nm_matkul'] ?></a></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>