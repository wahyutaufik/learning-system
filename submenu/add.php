<?php  
	$sql = "SELECT * FROM menu";
	$datas = mysql_query($sql);
	while ($data = mysql_fetch_assoc($datas)) {
		$menuData[] = $data;
	}
?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=simpan" method="POST" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Menu </label>
				<div class="col-sm-10">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<select name="id_menu" class="col-xs-10 col-sm-5" multiple="multiple">
						<option value="">-Pilih Menu-</option>
						<?php foreach ($menuData as $key => $mD): ?>
							<option value="<?php echo $mD['id'] ?>"><?php echo $mD['menu'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Sub Menu</label>
				<div class="col-sm-10">
					<input type="text" name="submenu" placeholder="Sub menu" class="col-xs-10 col-sm-5" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> URL Address</label>
				<div class="col-sm-10">
					<input type="text" name="url" placeholder="URL" class="col-xs-10 col-sm-5" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Akses </label>
				<div class="col-sm-10">
					<div class="checkbox">
						<label>
							<input type="hidden" name="admin" value="0">
							<input name="admin" class="ace ace-checkbox-2" type="checkbox" value="1">
							<span class="lbl"> Admin</span>
						</label>
						<label>
							<input type="hidden" name="dosen" value="0">
							<input name="dosen" class="ace ace-checkbox-2" type="checkbox" value="1">
							<span class="lbl"> Dosen</span>
						</label>
						<label>
							<input type="hidden" name="mahasiswa" value="0">
							<input name="mahasiswa" class="ace ace-checkbox-2" type="checkbox" value="1">
							<span class="lbl"> Mahasiswa</span>
						</label>
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
		</form>
	</div>