<?php  
$idSoal = $_POST['id_soal'] ;
unset($_POST['id_soal']);
unset($_POST['module']);
foreach ($_POST as $key => $value) {
	$field[] = $key;
	$content[] = $value;
}
$fields = implode(", ", $field);
$contents = implode("', '", $content);
$save = mysql_query("INSERT INTO ujian ($fields) VALUES ('$contents')");
$ujianId = mysql_insert_id();
foreach ($idSoal as $key => $value) {
	mysql_query("INSERT INTO soal_ujian (id_ujian, id_soal) VALUES ('$ujianId', '$value')");
}
echo"<meta http-equiv='refresh' content='0; url=index.php?p=listUjian'>";
?>