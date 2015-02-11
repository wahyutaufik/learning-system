<?php  
unset($_POST['module']);
foreach ($_POST as $key => $value) {
	$field[] = $key;
	$content[] = $value;
}
unset($field[3]);
unset($content[3]);
$fields = implode(", ", $field);
$contents = implode("', '", $content);

$save = mysql_query("INSERT INTO latihan ($fields) VALUES ('$contents')");
$latihanId = mysql_insert_id();
foreach ($_POST['id_soal'] as $key => $value) {
	mysql_query("INSERT INTO soal_latihan (id_latihan, id_soal) VALUES ('$latihanId', '$value')");
}
echo"<meta http-equiv='refresh' content='0; url=index.php?p=listLatihan'>";
?>