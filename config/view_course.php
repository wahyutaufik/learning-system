<?php  
$id = $_GET['id'];
$sql = "SELECT * FROM course WHERE id = $id";
$datas = mysql_query($sql);
while ($data = mysql_fetch_assoc($datas)) {
	$courses = $data;
}
?>