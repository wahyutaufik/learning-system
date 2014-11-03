<?php  
require_once "config/get_data.php";
?>
<?php foreach ($datas as $key => $user): ?>
	<div class="col-xs-6 col-md-3">
		<?php if (empty($user['image'])): ?>
			<img src="layout/images/no-pict.png" alt="">
		<?php else: ?>
			<img class="image" src="layout/images/user/<?php echo $user['image'] ?>" alt="">
		<?php endif ?>
	</div> 	
	<div class="col-xs-12 col-md-9">
		<div class="form-group">
			<label>Name :</label>
			<?php echo $user['fullname'] ?>
		</div>
		<div class="form-group">
			<label>Username :</label>
			<?php echo $user['username'] ?>
		</div>
		<div class="form-group">
			<label>Email :</label>
			<?php echo $user['email'] ?>
		</div>
		<div class="form-group">
			<label>Phone :</label>
			<?php echo $user['phone'] ?>
		</div>
		<div class="form-group">
			<label>Password :</label>
			<?php echo '*hidden' ?>
		</div>
		<div>
			<a href="index.php?module=update<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-outline btn-primary">Update</a>
			<a href="index.php?module=delete<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-outline btn-danger">Delete</a>
			<a href="index.php?module=list<?php echo ucfirst($modulecase); ?>" class="btn btn-outline btn-success">list</a>
		</div>
	</div>
<?php endforeach ?>