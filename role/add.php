<?php 
$modulecase = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1); 
require_once "config/roleContent.php"
?>
<form action="index.php?module=simpan" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="">
	<input type="hidden" name="module" value="<?php echo $modulecase ?>">
	<div class="form-group">
		<label>Name*</label>
	    <input type="text" name="name" value="" placeholder="Name" autocomplete="off" class="form-control" required>
	</div>
	<div class="form-group">
		<label>URI</label>
		<div class="row">
		<?php foreach ($grp as $key => $group): ?>
			<div class="col-md-3">
				<label><?php echo $group ?></label>
				<?php  
					$query = "SELECT name, uri FROM privillege WHERE groups LIKE '%$group%'";
					$datas = mysql_query($query);
					while ($data = mysql_fetch_assoc($datas)) {
				?>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="uris[]" value="<?php echo $data['uri'] ?>"><?php echo $data['name'] ?>
					</label>
				</div>
				<?php } ?>
			</div>
		<?php endforeach ?>
		</div>
		<input type="hidden" name="status" value="1">
	</div>
	<div>
		<input class="btn btn-primary" type="submit" value="Simpan">
		<a href="javascript:history.back()" class="btn btn-default">Batal</a>
	</div>
</form>