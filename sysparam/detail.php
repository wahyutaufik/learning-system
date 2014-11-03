<?php  
require_once "config/get_data.php";
?>
<?php foreach ($datas as $key => $sysparam): ?>
	<div class="form-group">
		<label>Group :</label>
		<?php echo $sysparam['groups'] ?>
	</div>
	<div class="form-group">
		<label>Key :</label>
		<?php echo $sysparam['strings'] ?>
	</div>
	<div class="form-group">
		<label>Value :</label>
		<?php echo $sysparam['value'] ?>
	</div>
	<div>
		<a href="index.php?module=update<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-outline btn-primary">Update</a>
		<a href="index.php?module=delete<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-outline btn-danger">Delete</a>
		<a href="index.php?module=list<?php echo ucfirst($modulecase); ?>" class="btn btn-outline btn-success">list</a>
	</div>
<?php endforeach ?>