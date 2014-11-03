<?php  
require_once "config/view_course.php";
?>
<h1 class="page-header"><?php echo $courses['title'] ?></h1>
<div class="panel panel-green">
	<div class="panel-heading">
		<label>Posted on</label> <?php echo $courses['created_time'] ?>
	</div>
	<div class="panel-body">
		<?php echo $courses['content'] ?>
	</div>
	<div class="panel-footer">&nbsp;</div>
</div>
<?php if ($_SESSION['role'] != 1): ?>
<form action="index.php?module=followed_course" method="POST">
	<input type="submit" class="btn btn-outline btn-success" value="Followed this Course">
	<a href="javascript:history.back()" class="btn btn-outline btn-danger">Kembali</a>
</form>
<?php endif ?>
