<?php 
require_once "config/get_data.php"
?>
<form action="index.php?module=simpan" method="POST" enctype="multipart/form-data">
<?php foreach ($datas as $key => $course): ?>
	<div class="form-group">
		<input type="hidden" name="id" value="">
		<input type="hidden" name="module" value="<?php echo $modulecase ?>">
		<label>Grade*</label>
	    <input type="text" name="grade" value="<?php echo $course['grades'] ?>" placeholder="Grade" autocomplete="off" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Group*</label>
	    <input type="text" name="group" value="<?php echo $course['groups'] ?>" placeholder="Group" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Title*</label>
	    <input type="text" name="title" value="<?php echo $course['title'] ?>" placeholder="Title" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Content</label>
		<textarea name="content" placeholder="" class="form-control ckeditor"><?php echo $course['content'] ?></textarea>
	</div>
		<input type="hidden" name="status" value="1">
	<div>
		<input class="btn btn-primary" type="submit" value="Simpan">
		<a href="javascript:history.back()" class="btn btn-default">Batal</a>
	</div>
<?php endforeach ?>
</form>