<?php  
foreach ($_POST as $key => $value) {
	$field[] = $key;
	$content[] = $value;
}
$fields = implode(", ", $field);
$contents = implode("', '", $content);
$save = mysql_query("INSERT INTO pesan ($fields) VALUES ('$contents')");

echo"<meta http-equiv='refresh' content='0; url=index.php?p=inbox&message=sent'>";
?>