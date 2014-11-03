<?php $modulecase = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1); ?>
<form action="index.php?module=simpan" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Username*</label>
		<input type="hidden" name="id" value="">
		<input type="hidden" name="module" value="<?php echo $modulecase ?>">
	    <input type="text" name="username" value="" placeholder="Username" autocomplete="off" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Full Name*</label>
	    <input type="text" name="fullname" value="" placeholder="Full Name" autocomplete="off" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Email*</label>
	    <input type="email" name="email" value="" placeholder="Email" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Phone*</label>
	    <input type="text" name="phone" value="" placeholder="Phone" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<label>Role*</label><br>
	    <input type="radio" name="role" value="1" required> Admin 
	    &nbsp;&nbsp;
	    <input type="radio" name="role" value="2" required> User
		<input type="hidden" name="status" value="1">
	</div>
	<div class="form-group">
		<label>Grade*</label>
	    <input type="text" name="grade" value="" placeholder="Grade" autocomplete="off" class="form-control"required>
	</div>
	<div class="form-group">
		<label>Password*</label>
	    <input type="password" name="password" value="" placeholder="Password" autocomplete="off" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Re-type Password*</label>
	    <input type="password" name="re-password" value="" placeholder="Re-type Password" autocomplete="off" class="form-control" required>
	</div>
	<div>
		<input class="btn btn-primary" type="submit" value="Simpan">
		<a href="javascript:history.back()" class="btn btn-default">Batal</a>
	</div>
</form>