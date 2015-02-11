<?php  
$id    = $_GET['id'];
$table = $_POST['module'];
$query = "DELETE FROM $table WHERE id = $id";
mysql_query($query);

?>
<script language="javascript">
document.location='index.php?p=soalDosen&message=deleted';
</script>