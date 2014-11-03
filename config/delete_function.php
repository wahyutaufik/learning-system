<?php  
$id = $_GET['id'];
$table = $_POST['module'];
$query = "DELETE FROM $table WHERE id = $id";
mysql_query($query);
?>

<!-- redirect -->
<script language="javascript">
document.location='index.php?module=list<?php echo ucfirst($table) ?>&message=deleted';
</script>
