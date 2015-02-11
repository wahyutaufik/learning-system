<?php 
$id         = $_GET['id'];
$modulecase = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1);
$query      = "SELECT * FROM $modulecase WHERE id = $id";
$data       = mysql_query($query);

while ($data = mysql_fetch_assoc($data)) {
	$datas[] = $data;
}
?>