<?php  
$sqlAksesKelas = mysql_query("SELECT id_kelas FROM matakuliah_dosen WHERE id_dosen = '$_SESSION[id]' GROUP BY id_kelas");
while ($findAksesKelas = mysql_fetch_assoc($sqlAksesKelas)) {
	$sqlKelas = "SELECT * FROM kelas WHERE id = $findAksesKelas[id_kelas]";
	$dataKelas = mysql_query($sqlKelas);
	while ($findKelas = mysql_fetch_assoc($dataKelas)) {
		$kelas[] = $findKelas;
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
		<form action="index.php?p=simpanMateriDosen" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Kelas </label>
				<div class="col-sm-10">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<select name="id_kelas" class="col-xs-10 col-sm-5" required>
						<option value="">-Pilih Kelas-</option>
						<?php foreach ($kelas as $key => $kelas): ?>
							<option value="<?php echo $kelas['id'] ?>"><?php echo $kelas['nama'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Mata Kuliah </label>
				<div class="col-sm-10">
					<select name="id_matkul" id="matkul" class="col-xs-10 col-sm-5" required>
						<option value="">-Pilih Mata Kuliah-</option>
					</select>
					<i class="fa fa-spinner fa-spin" id="imgLoad"></i>
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
				<label class="col-sm-2 control-label no-padding-right"> Judul </label>
				<div class="col-sm-10">
					<input type="text" name="judul" placeholder="Judul" class="col-xs-10 col-sm-5" required autocomplete="off">
					<input type="hidden" name="tgl_post" value="<?php echo date('Y-m-d') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Materi </label>
				<div class="col-sm-10">
					<input type="file" name="image"required>
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
<script src="dist/js/jquery.min.js"></script>

<script type="text/javascript">
$(function() {
	$("i#imgLoad").hide();
     $("select[name='id_kelas']").change(function(){
          $("i#imgLoad").show();
          var idKelas = $(this).val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "materi/getMatkul.php",
             data: "id_kelas="+idKelas,
             success: function(msg){
                 if(msg == ''){
                     $("select#matkul").html('<option>-Pilih Mata Kuliah-</option>');
                 }else{
                     $("select#matkul").html(msg);                                                       
                 $("i#imgLoad").hide();
                 }
             }
          });                    
     });
});
</script>