<?php  
unset($_POST['re-password']);
$password = base64_encode($_POST['password']);
$username = $_SESSION['username'];

$query = "UPDATE user SET password = '$password' WHERE username = '$username'";
mysql_query($query);
?>

<!-- redirect -->
<script language="javascript">
document.location='index.php?module=userProfile&message=updated';
</script>