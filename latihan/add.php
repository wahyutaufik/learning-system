<?php
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
?>
<style>
	/*a.remove { margin-left: -300px; }*/
</style>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=createLatihan" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
				<label class="col-sm-2 control-label no-padding-right"> Materi </label>
				<div class="col-sm-10">
					<select name="id_materi" id="materi" class="col-xs-10 col-sm-5" required>
						<option value="">-Pilih Materi-</option>
					</select>
					<i class="fa fa-spinner fa-spin" id="imgLoad"></i>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Soal </label>
			</div>
			<div class="form-group row-field">
				<div class="field-more">
					<label class="col-sm-2 control-label no-padding-right"> &nbsp; </label>
					<div class="col-sm-10">
						<select name="id_soal[]" id="soal" class="col-xs-10 col-sm-8" required>
							<option value="">-Pilih Soal-</option>
						</select>
						<i class="fa fa-spinner fa-spin" id="imgLoad"></i>
					</div>
				</div>
			</div>
			<div align="right">
				<a id="add-more" class="btn btn-white btn-inverse btn-sm" href="">Tambah Soal</a>
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
	$("a#add-more").on('click', function(evt){
        evt.preventDefault();
        evt.stopPropagation();
        $($(".field-more")[0]).clone().append('<a class="remove" href="#"><span class="fa fa-times fa-lg remove" style="margin: 10px;"></span></a>').appendTo(".row-field");
    });
    $('.row-field').on('click', 'a.remove', function(evt) {
        evt.preventDefault();
        evt.stopPropagation();
        $(this).parent().remove();
    });
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
	$("select[name='id_matkul']").change(function(){
		$("i#imgLoad").show();
		var idMatkul = $(this).val();
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "latihan/getSoal.php",
			data: "id_matkul="+idMatkul,
			success: function(msg){
				if(msg == ''){
					$("select#soal").html('<option>-Pilih Soal-</option>');
				}else{
					$("select#soal").html(msg);
					$("i#imgLoad").hide();
				}
			}
		});                    
    });
	$("select[name='id_matkul']").change(function(){
		$("i#imgLoad").show();
		var idMatkul = $(this).val();
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "latihan/getMateri.php",
			data: "id_matkul="+idMatkul,
			success: function(msg){
				if(msg == ''){
					$("select#materi").html('<option>-Pilih materi-</option>');
				}else{
					$("select#materi").html(msg);
					$("i#imgLoad").hide();
				}
			}
		});                    
    });
});
</script>