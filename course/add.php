<?php $modulecase = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1); ?>
<form action="index.php?module=simpan" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<input type="hidden" name="id" value="">
		<input type="hidden" name="module" value="<?php echo $modulecase ?>">
		<label>Grade*</label>
	    <input type="text" name="grade" value="" placeholder="Grade" autocomplete="off" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Group*</label>
	    <input type="text" name="group" value="" placeholder="Group" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Title*</label>
	    <input type="text" name="title" value="" placeholder="Title" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Content</label>
		<textarea name="content" placeholder="" class="form-control ckeditor"></textarea>
	</div>
		<input type="hidden" name="status" value="1">
		<input type="hidden" name="created_time" value="<?php echo date('Y-m-d h:i:s') ?>">
	<div>
		<input class="btn btn-primary" type="submit" value="Simpan">
		<a href="javascript:history.back()" class="btn btn-outline btn-danger">Batal</a>
	</div>
</form>