<?php  
require_once "config/get_data.php";
?>
<?php foreach ($datas as $key => $course): ?>
	<div class="form-group">
		<label>Grade :</label>
		<?php echo $course['grades'] ?>
	</div>
	<div class="form-group">
		<label>Group :</label>
		<?php echo $course['groups'] ?>
	</div>
	<div class="panel panel-green">
		<div class="panel-heading">
			<?php echo $course['title'] ?>
		</div>
		<div class="panel-body">
			<?php echo $course['content'] ?>
		</div>
		<div class="panel-footer">&nbsp;</div>
	</div>
	<div>
		<a href="index.php?module=update<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-outline btn-primary">Update</a>
		<a href="index.php?module=delete<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-outline btn-danger">Delete</a>
		<a href="index.php?module=list<?php echo ucfirst($modulecase); ?>" class="btn btn-outline btn-success">list</a>
	</div>
<?php endforeach ?>