<?php  
require_once "config/get_data.php";
?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=update" method="POST" class="form-horizontal">
			<?php foreach ($datas as $key => $bab): ?>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Nama Bab </label>
				<div class="col-sm-10">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<input type="text" name="nama" value="<?php echo $bab['nama'] ?>" placeholder="Nama Bab" class="col-xs-10 col-sm-5" required autocomplete="off">
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