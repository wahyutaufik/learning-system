<?php  
require_once "config/get_data.php";
?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=update" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<?php foreach ($datas as $key => $mahasiswa): ?>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> NIM </label>
				<div class="col-sm-10">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<input type="text" name="nim" class="col-xs-10 col-sm-5" value="<?php echo $mahasiswa['nim'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Password </label>
				<div class="col-sm-10">
					<input type="password" name="password" class="col-xs-10 col-sm-5" value="<?php echo base64_decode($mahasiswa['password']) ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Retype Password </label>
				<div class="col-sm-10">
					<input type="password" name="re-password" class="col-xs-10 col-sm-5" value="<?php echo base64_decode($mahasiswa['password']) ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Nama Lengkap </label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="col-xs-10 col-sm-5" value="<?php echo $mahasiswa['nama'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Email </label>
				<div class="col-sm-10">
					<input type="email" name="email" class="col-xs-10 col-sm-5" value="<?php echo $mahasiswa['email'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Telpon </label>
				<div class="col-sm-10">
					<input type="number" name="telpon" class="col-xs-10 col-sm-5" value="<?php echo $mahasiswa['telpon'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Tanggal Lahir </label>
				<div class="col-sm-10">
					<input type="date" name="tanggal_lahir" class="col-xs-10 col-sm-5" value="<?php echo $mahasiswa['tanggal_lahir'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Jenis Kelamin</label>
				<div class="radio">
					<label>
						<input type="radio" name="jenis_kelamin" class="ace radio-url" value="1" <?php if($mahasiswa['jenis_kelamin'] == 1)echo "checked"; ?>>
						<span class="lbl"> Laki-laki</span>
					</label>
					<label>
						<input type="radio" name="jenis_kelamin" class="ace radio-url" value="2" <?php if($mahasiswa['jenis_kelamin'] == 2)echo "checked"; ?>>
						<span class="lbl"> Perempuan</span>
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Jurusan </label>
				<div class="col-sm-10">
					<?php  
						$sql = "SELECT * FROM jurusan";
						$datas = mysql_query($sql);
						while ($data = mysql_fetch_assoc($datas)) {
							$jurusan[] = $data;
						}
					?>
					<select name="id_jurusan" class="col-xs-10 col-sm-5" multiple="multiple">
						<option value="">-Pilih Jurusan-</option>
						<?php foreach ($jurusan as $key => $j): ?>
							<option value="<?php echo $j['id'] ?>" <?php if($j['id'] == $mahasiswa['id_jurusan']) echo "selected"; ?>><?php echo $j['nm_jurusan'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Jurusan </label>
				<div class="col-sm-10">
					<?php  
						$sqlKelas = "SELECT * FROM kelas";
						$dataKelas = mysql_query($sqlKelas);
						while ($findKelas = mysql_fetch_assoc($dataKelas)) {
							$kelas[] = $findKelas;
						}
					?>
					<select name="id_kelas" class="col-xs-10 col-sm-5">
						<option value="">-Pilih Kelas-</option>
						<?php foreach ($kelas as $key => $k): ?>
							<option value="<?php echo $k['id'] ?>" <?php if($k['id'] == $mahasiswa['id_kelas']) echo "selected"; ?>><?php echo $k['nama'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Status </label>
				<div class="col-sm-10">
					<select name="status" class="col-xs-10 col-sm-5">
						<option value="">-Pilih Status-</option>
						<option value="1" <?php if($mahasiswa['status'] == 1) echo "selected"; ?>>Aktif</option>
						<option value="2" <?php if($mahasiswa['status'] == 2) echo "selected"; ?>>Non-aktif</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Foto </label>
				<div class="col-sm-10">
					<?php if (empty($mahasiswa['image'])): ?>
						<input type="text"class="col-xs-10 col-sm-5" value="No Photo" disabled>
					<?php else: ?>
						<img src="layout/images/mahasiswa/<?php echo $mahasiswa['image'] ?>" width="200">
					<?php endif ?>
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