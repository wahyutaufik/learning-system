<?php  
require_once "config/get_data.php";
?>
<?php foreach ($datas as $key => $privillege): ?>
	<div class="form-group">
		<label>Group :</label>
		<?php echo $privillege['groups'] ?>
	</div>
	<div class="form-group">
		<label>Name :</label>
		<?php echo $privillege['name'] ?>
	</div>
	<div class="form-group">
		<label>URI :</label>
		<?php echo $privillege['uri'] ?>
	</div>
	<div>
		<a href="index.php?module=update<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-outline btn-primary">Update</a>
		<a href="index.php?module=delete<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-outline btn-danger">Delete</a>
		<a href="index.php?module=list<?php echo ucfirst($modulecase); ?>" class="btn btn-outline btn-success">list</a>
	</div>
<?php endforeach ?>
