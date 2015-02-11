<?php
include "../config/koneksi.php";
session_start();
$username  = $_POST['username'];
$akses     = $_POST['akses'];
$password  = base64_encode($_POST['password']);
$username  = mysql_real_escape_string($username);
$password  = mysql_real_escape_string($password);
$akses     = mysql_real_escape_string($akses);
$userField = 'username';
$kelas = '';
$email = '';
if ($akses == 1) {
	$user    = "admin";
} elseif ($akses == 2){
	$user    = "dosen";
} else {
	$user      = "mahasiswa";
	$userField = "nim";
}
$query    = "SELECT * FROM $user WHERE $userField='$username' and password='$password'";
$login    = mysql_query($query);
$data     = mysql_fetch_assoc($login);
if ($akses == 1 || $akses == 2) {
	$nameSession = $data['username'];
	$email       = $data['email'];
} else {
	$nameSession = $data['nama'];
	$kelas = $data['id_kelas'];
	$email = $data['email'];
}
$jumlahdata = mysql_num_rows($login);
if($jumlahdata > 0){
	$_SESSION['id']       = $data['id'];
	$_SESSION['username'] = $nameSession;
	$_SESSION['akses']    = $akses;
	$_SESSION['kelas']    = $kelas;
	$_SESSION['email']    = $email;
    header("Location:../index.php?p=pageDashboard&message=success");
} else {
    header("Location:../module/login.php?message=failed");
}
?>