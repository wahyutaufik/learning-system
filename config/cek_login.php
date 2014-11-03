<?php
include "koneksi.php";
session_start();
$username = $_POST['username'];
$password = base64_encode($_POST['password']);

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$query    = "SELECT * FROM user WHERE username='$username' and password='$password'";
$login    = mysql_query($query);

$data     = mysql_fetch_array($login);
$jumlahdata = mysql_num_rows($login);
// var_dump($data['role']);
if($jumlahdata > 0){
	$_SESSION['username'] = $data['username'];
	$_SESSION['role']     = $data['role'];
	$_SESSION['grade']     = $data['grades'];
    header("Location:../index.php?module=dashboard&message=success");
} else {
    header("Location:../module/login.php?message=failed");
}
?>