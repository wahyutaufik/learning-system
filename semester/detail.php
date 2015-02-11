<?php  
require_once "config/get_data.php";
?>
<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=simpan" method="POST" class="form-horizontal">
			<?php foreach ($datas as $key => $semester): ?>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right"> Nama Bab </label>
					<div class="col-sm-10">
						<input type="text" value="<?php echo $semester['semester'] ?>" name="semester" placeholder="Semester" class="col-xs-10 col-sm-5" readonly>
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
</div>