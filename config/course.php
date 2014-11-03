<?php  
$grade = $_SESSION['grade'];
if (empty($grade)) {
	$sql = "SELECT * FROM course ";
} else {
	$sql = "SELECT * FROM course WHERE grades = $grade";
}
$datas = mysql_query($sql);
while ($data = mysql_fetch_assoc($datas)) {
	$courses[] = $data;
}
?>