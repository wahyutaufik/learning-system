<?php 
$table = soal;
/*-----do this if isset post array------*/
if ($_POST['uris']) {
	$_POST['uris'] = implode(" | ", $_POST['uris']);
}

/*----do this if isset post password----*/
if (isset($_POST['password'])) {
	$_POST['password']=base64_encode($_POST['password']);
}

if (isset($_POST['re-password'])) {
	unset($_POST['re-password']);
}

/*----do this if isset FILES----*/
if ($_FILES) {
	if (isset($_FILES['image']['name'])) {
		$_POST['image'] = $_FILES['image']['name'];
	} else {
		$_POST['image'] = "";
	}

	$folder		= 'layout/images/'.$table.'/';
	$file_name	= $_FILES['image']['name'];
	
	if (!file_exists($folder)) {
	    mkdir($folder, 0777, true);
	}

	move_uploaded_file($_FILES['image']['tmp_name'], $folder.$file_name);
}

/*----get data from post input----*/
unset($_POST['module']);
$data = implode("','", $_POST);

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
    $fields = implode(",", $field);
}

/*----save----*/
$query  = "INSERT INTO $table($fields)VALUES (NULL,'$data')";
// var_dump($_POST);
// var_dump($query);
// exit;
$result = mysql_query($query);

?>

<?php if ($result): ?>
	<script language="javascript">
	document.location='index.php?p=soalDosen&message=added';
	</script>
<?php else: ?>
	<script language="javascript">
	document.location='index.php?p=addSoalDosen&message=error';
	</script>
<?php endif ?>