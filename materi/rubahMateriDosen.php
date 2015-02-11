<?php  
$table = 'materi';
$id    = $_POST['id'];

/*----do this if isset re-password----*/
if (isset($_POST['re-password'])) {
	unset($_POST['re-password']);
}

/*----do this if isset password----*/
if (isset($_POST['password'])) {
	$_POST['password'] = base64_encode($_POST['password']);
}

/*----do this if isset FILES----*/
if ($_FILES) {
	if (isset($_FILES['image']['name'])) {
		$_POST['image'] = $_FILES['image']['name'];
	} 
	if (empty($_FILES['image']['name'])){
		$model = mysql_query("SELECT * FROM $table WHERE id='$id'");
		$data  = mysql_fetch_array($model);
		$_POST['image'] = $data['image'];
	}

	$folder		= 'layout/images/'.$table.'/';
	$file_name	= $_FILES['image']['name'];
	
	if (!file_exists($folder)) {
	    mkdir($folder, 0777, true);
	}

	move_uploaded_file($_FILES['image']['tmp_name'], $folder.$file_name);
}

/*----get field on table database----*/
$result = mysql_query("SHOW COLUMNS FROM $table");
if (!$result) {
    echo 'Tidak bisa menjalanjan query, ' . mysql_error().'. </br>';
    exit;
}
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        $field[] = $row['Field'];
    }
}


/*----get data from post input----*/
unset($_POST['module']);
$data = explode(',', implode(",", $_POST));
foreach ($_POST as $k => $v) {
	$vals[] = $k . ' = ' . '"'.$v.'"';
}


// /*----save----*/
$where = 'id = ' .$id; 
$query = sprintf('UPDATE %s SET %s WHERE %s',
					$table,
					implode(',', $vals),
					$where
				);
// var_dump($query);exit;
$result = mysql_query($query);

/*redirect*/
?>
<?php if ($result): ?>
	<script language="javascript">
	document.location='index.php?p=materiDosen&message=updated';
	</script>
<?php else: ?>
	<script language="javascript">
	document.location='index.php?p=updateMateriDosen&id=<?php echo $id ?>&message=error';
	</script>
<?php endif ?>