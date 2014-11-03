<?php  
$user  = $_SESSION['username'];
$query = "SELECT * FROM user WHERE username LIKE '%$user%'";
$data  = mysql_query($query);
while ($user = mysql_fetch_assoc($data)) {
	$users[] = $user;
}
?>
<?php foreach ($users as $key => $user): ?>
	<div class="row">
		<div class="col-xs-6 col-md-4">
		<?php if (empty($user['image'])): ?>
			<img src="layout/images/no-pict.png" alt="">
		<?php else: ?>
			<div class="image" style="background:url(layout/images/user/<?php echo $user['image'] ?>) center no-repeat;"></div>
		<?php endif ?>
		</div> 	
		<div class="col-xs-12 col-md-8">
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
		</div> 	
	</div>
<?php endforeach ?>