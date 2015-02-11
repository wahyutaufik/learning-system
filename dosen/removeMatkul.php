<?php  
$id    = $_GET['id'];
$table = $_POST['module'];
$query = "DELETE FROM $table WHERE id = $id AND id_dosen = $_GET[id_dosen]";
mysql_query($query);
mysql_query("UPDATE matakuliah SET status_dosen = 0, id_dosen = 0 WHERE id_dosen = $_GET[id_dosen]");

?>
<script language="javascript">
document.location='index.php?p=updateDosen&id=<?php echo $_GET['id_dosen'] ?>&message=deleted';
</script>