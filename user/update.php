<?php 
require_once "config/get_data.php";
?>
<form action="index.php?module=update" method="POST" enctype="multipart/form-data">
<?php foreach ($datas as $key => $user): ?>
	<div class="form-group">
		<label>Username*</label>
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<input type="hidden" name="module" value="<?php echo $modulecase ?>">
	    <input type="text" name="username" value="<?php echo $user['username'] ?>" placeholder="Username" autocomplete="off" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Full Name*</label>
	    <input type="text" name="fullname" value="<?php echo $user['fullname'] ?>" placeholder="Full Name" autocomplete="off" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Email*</label>
	    <input type="email" name="email" value="<?php echo $user['email'] ?>" placeholder="Email" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Phone*</label>
	    <input type="text" name="phone" value="<?php echo $user['phone'] ?>" placeholder="Phone" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<label>Role*</label><br>
	    <input type="radio" name="role" value="1" required <?php if ($user['role'] == 1) {
	    	echo "checked";
	    } ?>> Admin 
	    &nbsp;&nbsp;
	    <input type="radio" name="role" value="2" required <?php if ($user['role'] == 2) {
	    	echo "checked";
	    } ?>> User
		<input type="hidden" name="status" value="1">
	</div>
	<div class="form-group">
		<label>Grade*</label>
	    <input type="text" name="grades" value="<?php echo $user['grades'] ?>" placeholder="Grade" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Password*</label>
	    <input type="password" name="password" value="<?php echo base64_decode($user['password']) ?>" placeholder="Password" autocomplete="off" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Re-type Password*</label>
	    <input type="password" name="re-password" value="" placeholder="Re-type Password" autocomplete="off" class="form-control" required>
	</div>
<?php endforeach ?>
	<div>
		<input class="btn btn-primary" type="submit" value="Simpan">
		<a href="javascript:history.back()" class="btn btn-default">Batal</a>
	</div>
</form>