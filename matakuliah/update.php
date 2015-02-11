<?php  
require_once "config/get_data.php";

$sqlKelas = "SELECT * FROM kelas";
$dataKelas = mysql_query($sqlKelas);
while ($findKelas = mysql_fetch_assoc($dataKelas)) {
	$kelas[] = $findKelas;
}
?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=update" method="POST" class="form-horizontal">
			<?php foreach ($datas as $key => $matkul): ?>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right"> Kelas </label>
					<div class="col-sm-10">
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<input type="hidden" name="module" value="<?php echo $modulecase ?>">
						<select name="id_kelas" class="col-xs-10 col-sm-5">
							<option value="">-Pilih Kelas-</option>
							<?php foreach ($kelas as $key => $kelas): ?>
								<option value="<?php echo $kelas['id'] ?>" <?php if($kelas['id'] == $matkul['id_kelas']) echo "selected"; ?>><?php echo $kelas['nama'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Nama Mata Kuliah </label>
				<div class="col-sm-10">
					<input type="text" name="nm_matkul" value="<?php echo $matkul['nm_matkul'] ?>" placeholder="Nama Mata Kuliah" class="col-xs-10 col-sm-5" required autocomplete="off">
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit" id="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Simpan
					</button>

					&nbsp; &nbsp; &nbsp;
					<a href="javascript:history.back()" class="btn btn-danger" type="reset">
						<i class="ace-icon fa fa-trash bigger-110"></i>
						Batal
					</a>

					&nbsp; &nbsp; &nbsp;
					<a href="index.php?p=list<?php echo ucfirst($modulecase); ?>" class="btn btn-success">
						<i class="ace-icon fa fa-list bigger-110"></i>
						List
					</a>
				</div>
			</div>
			<?php endforeach ?>
		</form>
	</div>
</div>