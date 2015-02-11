<?php  
require_once "config/get_data.php";

$queryKelas = mysql_query("SELECT * FROM kelas");
while ($findKelas = mysql_fetch_assoc($queryKelas)) {
	$dataKelas[] = $findKelas;
}

$queryMatkul = mysql_query("SELECT * FROM matakuliah_dosen WHERE id_dosen = $id");
while ($finsMatkul = mysql_fetch_assoc($queryMatkul)) {
	$dataMatkul[] = $finsMatkul;
}
?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=updateDataDosen" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<?php foreach ($datas as $key => $dosen): ?>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Username </label>
				<div class="col-sm-10">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<input type="text" name="username" placeholder="Username" class="col-xs-10 col-sm-5" value="<?php echo $dosen['username'] ?>" required autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Password </label>
				<div class="col-sm-10">
					<input type="password" name="password" placeholder="Password" class="col-xs-10 col-sm-5" value="<?php echo base64_decode($dosen['password']) ?>" required autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Re-type Password </label>
				<div class="col-sm-10">
					<input type="password" name="re-password" placeholder="Re-type Password" class="col-xs-10 col-sm-5" value="<?php echo base64_decode($dosen['password']) ?>" required autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Nama Lengkap </label>
				<div class="col-sm-10">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="col-xs-10 col-sm-5" value="<?php echo $dosen['nama'] ?>" required autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Email </label>
				<div class="col-sm-10">
					<input type="email" name="email" placeholder="Email" class="col-xs-10 col-sm-5" value="<?php echo $dosen['email'] ?>" required autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Telpon </label>
				<div class="col-sm-10">
					<input type="number" name="telpon" placeholder="Telpon" class="col-xs-10 col-sm-5" value="<?php echo $dosen['telpon'] ?>" required autocomplete="off">
					<input type="hidden" name="register" value="<?php echo date('Y-m-d') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Foto </label>
				<div class="col-sm-10">
					<?php if (empty($dosen['image'])): ?>
						<input type="text"class="col-xs-10 col-sm-5" value="No Photo" disabled>
					<?php else: ?>
						<img src="layout/images/dosen/<?php echo $dosen['image'] ?>" width="200">
					<?php endif ?>
					<input type="file" name="image">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Mata Kuliah </label>
				<div class="col-sm-10">
					<div class="col-xs-12 col-sm-10 widget-container-col">
						<div class="widget-box widget-color-blue">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">
									<i class="ace-icon fa fa-table"></i>
									Tabel Matakuliah Dosen
								</h5>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-striped table-bordered table-hover">
										<thead class="thin-border-bottom">
											<tr>
												<th>
													<i class="ace-icon fa fa-bookmark"></i>
													Kelas
												</th>

												<th>
													<i class="fa fa-list"></i>
													Mata Kuliah
												</th>
												<th>
													<i class="fa fa-cog"></i>
													Aksi
												</th>
											</tr>
										</thead>

										<tbody>
										<?php foreach ($dataMatkul as $key => $matkul): ?>
											<tr>
												<td>
													<?php 
													$getKelas = mysql_query("SELECT * FROM kelas WHERE id = $matkul[id_kelas]"); 
													while ($listKelas = mysql_fetch_assoc($getKelas)) {
														echo $listKelas['nama'];
													}
													?>
												</td>
												<td>
													<?php 
													$getMatkul = mysql_query("SELECT * FROM matakuliah WHERE id = $matkul[id_matkul]"); 
													while ($listMatkul = mysql_fetch_assoc($getMatkul)) {
														echo $listMatkul['nm_matkul'];
													}
													?>
												</td>
												<td>
													<a href="index.php?p=removeMatakuliahDosen&id=<?php echo $matkul['id'] ?>&id_dosen=<?php echo $dosen['id'] ?>">hapus</a>
												</td>
											</tr>
										<?php endforeach ?>
											<tr>
												<td>
													<select class="form-control" name="id_kelas" id="kelas">
														<option>-Pilih Kelas-</option>
													<?php foreach ($dataKelas as $key => $kelas): ?>
														<option value="<?php echo $kelas['id'] ?>"><?php echo $kelas['nama'] ?></option>
													<?php endforeach ?>
													</select>
												</td>

												<td>
													<select name="id_matkul" id="matkul" class="form-control">
														<option value="">-Pilih Matakuliah-</option>
													</select>
													<i class="fa fa-spinner fa-spin" id="imgLoad"></i>
												</td>
												<td>
													
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
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
			<?php endforeach ?>
		</form>
	</div>
</div>
<script src="dist/js/jquery.min.js"></script>
<script>
	$('#submit').on('click', function(evt){
    	if($('input[name="password"]').val() != $('input[name="re-password"]').val()){
    		alert('Password / Retype Password Not valid');
    		return false;
    	}
    });
</script>

<script type="text/javascript">
$(function() {
	$("i#imgLoad").hide();
     $("#kelas").change(function(){
          $("i#imgLoad").show();
          var idKelas = $(this).val();
          console.log(idKelas);
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