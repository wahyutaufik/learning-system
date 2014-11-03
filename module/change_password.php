<?php $modulecase = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1); ?>
<form action="index.php?module=password" method="POST" enctype="multipart/form-data">
	<!-- <input type="hidden" name="id" value=""> -->
	<!-- <input type="hidden" name="module" value="<?php echo $modulecase ?>"> -->
	<div class="form-group">
		<label>New Password*</label>
	    <input type="password" name="password" value="" placeholder="New Password" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Re-type Password*</label>
	    <input type="password" name="re-password" value="" placeholder="Re-type Password" autocomplete="off" class="form-control" required>
	</div>
	<div>
		<input class="btn btn-outline btn-primary" type="submit" value="Simpan">
		<a href="javascript:history.back()" class="btn btn-outline btn-danger">Batal</a>
	</div>
</form>