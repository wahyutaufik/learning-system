<?php  
require_once "config/get_data.php";
$sqlKelas = "SELECT * FROM kelas";
$dataKelas = mysql_query($sqlKelas);
while ($findKelas = mysql_fetch_assoc($dataKelas)) {
	$kelas[] = $findKelas;
}

$sqlBab = "SELECT * FROM bab";
$dataBab = mysql_query($sqlBab);
while ($findBab = mysql_fetch_assoc($dataBab)) {
	$bab[] = $findBab;
}

$sqlMatkul = "SELECT * FROM matakuliah";
$dataMatkul = mysql_query($sqlMatkul);
while ($findMatkul = mysql_fetch_assoc($dataMatkul)) {
	$matkul[] = $findMatkul;
}
?>
<?php foreach ($datas as $key => $materi): ?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=update" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Kelas </label>
				<div class="col-sm-10">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<select name="id_kelas" class="col-xs-10 col-sm-5" required>
						<option value="">-Pilih Kelas-</option>
						<?php foreach ($kelas as $key => $kelas): ?>
							<option value="<?php echo $kelas['id'] ?>" <?php if($kelas['id'] == $materi['id_kelas']) echo "selected"; ?>><?php echo $kelas['nama'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Mata Kuliah </label>
				<div class="col-sm-10">
					<select name="id_matkul" id="matkul" class="col-xs-10 col-sm-5" required>
						<option value="">-Pilih Mata Kuliah-</option>
						<?php foreach ($matkul as $key => $matkul): ?>
							<option value="<?php echo $matkul['id'] ?>" <?php if($matkul['id'] == $materi['id_matkul']) echo "selected"; ?>><?php echo $matkul['nm_matkul'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Bab </label>
				<div class="col-sm-10">
					<select name="id_bab" class="col-xs-10 col-sm-5" required>
						<option value="">-Pilih Bab-</option>
						<?php foreach ($bab as $key => $bab): ?>
							<option value="<?php echo $bab['id'] ?>" <?php if($bab['id'] == $materi['id_bab']) echo "selected"; ?>><?php echo $bab['nama'] ?></option>
						<?php endforeach ?>
					</select>
					<input type="hidden" name="id_dosen" value="<?php echo $_SESSION['id'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Judul </label>
				<div class="col-sm-10">
					<input type="text" name="judul" placeholder="Judul" value="<?php echo $materi['judul'] ?>" class="col-xs-10 col-sm-5" required autocomplete="off">
					<input type="hidden" name="tgl_post" value="<?php echo date('Y-m-d') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Materi </label>
				<div class="col-sm-10">
					<a class="btn btn-success" target="_blank" href="layout/images/materi/<?php echo $materi['image'] ?>"><i class="fa fa-download"></i> <?php echo $materi['image'] ?></a>
					<input type="file" name="image">
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
		</form>
	</div>
</div>
<?php endforeach ?>
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
             url: "dosen/getMatkul.php",
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