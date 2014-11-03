<?php  
$id = $_GET['id'];
$modulecase = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1);
?>
<form action="index.php?module=eraseFunction&id=<?php echo $id; ?>" method="POST">
	<div class="form-group">
		<h3>Sure want to delete this data?</h3>
	</div>
	<div>
		<input type="hidden" name="module" value="<?php echo $modulecase ?>">
		<input class="btn btn-outline btn-primary" type="submit" value="Yes">
		<a href="javascript:history.back()" class="btn btn-outline btn-danger">No</a>
		<a href="index.php?module=list<?php echo ucfirst($modulecase); ?>" class="btn btn-outline btn-success">list</a>
	</div>
</form>