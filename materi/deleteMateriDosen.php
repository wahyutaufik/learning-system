<?php  
$id = $_GET['id'];
$modulecase = 'materi';
?>
<form action="index.php?p=eraseMateriDosen&id=<?php echo $id; ?>" method="POST">
	<div class="form-group">
		<h3>Yakin ingin menghapus data ini?</h3>
	</div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<input type="hidden" name="module" value="<?php echo $modulecase ?>">
			<button class="btn btn-danger" type="submit" id="submit">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Ya
			</button>

			&nbsp; &nbsp; &nbsp;
			<a href="javascript:history.back()" class="btn btn-primary">
				<i class="ace-icon fa fa-backward bigger-110"></i>
				Tidak
			</a>

			&nbsp; &nbsp; &nbsp;
			<a href="index.php?p=list<?php echo ucfirst($modulecase); ?>" class="btn btn-success">
				<i class="ace-icon fa fa-list bigger-110"></i>
				List
			</a>
		</div>
	</div>
</form>