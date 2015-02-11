<?php  
$table = $_POST['module'];
$id    = $_POST['id'];

if (!empty($_POST['id_kelas']) && !empty($_POST['id_matkul'])) {
	$setMatkul  = "INSERT INTO matakuliah_dosen (id, id_dosen, id_kelas, id_matkul) VALUES (NULL, '$_POST[id]', '$_POST[id_kelas]', '$_POST[id_matkul]')";
	// var_dump($setMatkul);
	// var_dump("UPDATE matakuliah SET status_dosen = 1, id_dosen= '$_POST[id]' WHERE id = $_POST[id_matkul]");
	// exit;
	$setToDosen = mysql_query($setMatkul);
	$setStatus  = mysql_query("UPDATE matakuliah SET status_dosen = 1, id_dosen= '$_POST[id]' WHERE id = $_POST[id_matkul]");
}

unset($_POST['id_kelas']);
unset($_POST['id_matkul']);
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

/*----save----*/
$where = 'id = ' .$id; 
$query = sprintf('UPDATE %s SET %s WHERE %s',
					$table,
					implode(',', $vals),
					$where
				);
$result = mysql_query($query);

/*redirect*/
?>
<?php if ($result): ?>
	<script language="javascript">
	document.location='index.php?p=detail<?php echo ucfirst($table) ?>&id=<?php echo $id ?>&message=updated';
	</script>
<?php else: ?>
	<script language="javascript">
	document.location='index.php?p=detail<?php echo ucfirst($table) ?>&id=<?php echo $id ?>&message=error';
	</script>
<?php endif ?>