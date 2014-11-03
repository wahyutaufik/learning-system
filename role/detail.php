<?php  
require_once "config/get_data.php";
require_once "config/roleContent.php"
?>
<?php foreach ($datas as $key => $role): ?>
	<div class="form-group">
		<label>Name :</label>
		<?php echo $role['name'] ?>
	</div>
	<div class="form-group">
		<label>URIS :</label>
		<div class="row">
		<?php foreach ($grp as $key => $group): ?>
			<div class="col-md-3">
				<label><?php echo $group ?></label>
				<?php  
					$query = "SELECT name FROM privillege WHERE groups LIKE '%$group%'";
					$datas = mysql_query($query);
					while ($data = mysql_fetch_assoc($datas)) {
				?>
				<div class="checkbox">
					<label>
						<?php echo $data['name'] ?>
					</label>
				</div>
				<?php } ?>
			</div>
		<?php endforeach ?>
	</div>
	<div>
		<a href="index.php?module=update<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-outline btn-primary">Update</a>
		<a href="index.php?module=delete<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-outline btn-danger">Delete</a>
		<a href="index.php?module=list<?php echo ucfirst($modulecase); ?>" class="btn btn-outline btn-success">list</a>
	</div> 	
<?php endforeach ?>