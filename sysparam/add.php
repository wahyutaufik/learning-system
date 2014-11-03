<?php $modulecase = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1); ?>
<form action="index.php?module=simpan" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<input type="hidden" name="id" value="">
		<input type="hidden" name="module" value="<?php echo $modulecase ?>">
		<label>Group*</label>
	    <input type="text" name="group" value="" placeholder="Group" autocomplete="off" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Key*</label>
	    <input type="text" name="key" value="" placeholder="Key" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Value*</label>
	    <input type="text" name="value" value="" placeholder="Value" autocomplete="off" class="form-control"required>
	</div>
		<input type="hidden" name="status" value="1">
	<div>
		<input class="btn btn-primary" type="submit" value="Simpan">
		<a href="javascript:history.back()" class="btn btn-default">Batal</a>
	</div>
</form>