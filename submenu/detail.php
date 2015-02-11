<?php  
require_once "config/get_data.php";

$sql = "SELECT * FROM menu";
$menusData = mysql_query($sql);
while ($data = mysql_fetch_assoc($menusData)) {
	$menuData[] = $data;
}
?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=update" method="POST" class="form-horizontal">
			<?php foreach ($datas as $key => $sM): ?>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Menu </label>
				<div class="col-sm-10">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<select name="id_menu" class="col-xs-10 col-sm-5" multiple="multiple" readonly>
						<option value="">-Pilih Menu-</option>
						<?php foreach ($menuData as $key => $mD): ?>
							<option value="<?php echo $mD['id'] ?>"<?php if($mD['id'] == $sM['id_menu']) echo "selected"; ?>><?php echo $mD['menu'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Sub Menu</label>
				<div class="col-sm-10">
					<input type="text" name="submenu" value="<?php echo $sM['submenu'] ?>" placeholder="Sub menu" class="col-xs-10 col-sm-5" autocomplete="off" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> URL Address</label>
				<div class="col-sm-10">
					<input type="text" name="url" value="<?php echo $sM['url'] ?>" placeholder="URL" class="col-xs-10 col-sm-5" autocomplete="off" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Akses </label>
				<div class="col-sm-10">
					<div class="checkbox">
						<label>
							<input type="hidden" name="admin" value="0">
							<input name="admin" class="ace ace-checkbox-2" type="checkbox" value="1" <?php if($sM['admin'] == 1) echo "checked"; ?> readonly>
							<span class="lbl"> Admin</span>
						</label>
						<label>
							<input type="hidden" name="dosen" value="0">
							<input name="dosen" class="ace ace-checkbox-2" type="checkbox" value="1" <?php if($sM['dosen'] == 1) echo "checked"; ?> readonly>
							<span class="lbl"> Dosen</span>
						</label>
						<label>
							<input type="hidden" name="mahasiswa" value="0">
							<input name="mahasiswa" class="ace ace-checkbox-2" type="checkbox" value="1" <?php if($sM['mahasiswa'] == 1) echo "checked"; ?> readonly>
							<span class="lbl"> Mahasiswa</span>
						</label>
					</div>
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<a href="index.php?p=update<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-info" type="submit" id="submit">
						<i class="ace-icon fa fa-edit bigger-110"></i>
						Edit
					</a>

					&nbsp; &nbsp; &nbsp;
					<a href="index.php?p=delete<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-danger" type="reset">
						<i class="ace-icon fa fa-trash bigger-110"></i>
						Hapus
					</a>

					&nbsp; &nbsp; &nbsp;
					<a href="index.php?p=list<?php echo ucfirst($modulecase); ?>" class="btn btn-success">
						<i class="ace-icon fa fa-backward bigger-110"></i>
						Kembali
					</a>
				</div>
			</div>
			<?php endforeach ?>
		</form>
	</div>