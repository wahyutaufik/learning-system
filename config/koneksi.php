<?php
$server   = "localhost";
$username = "root";
$password = "password";
$database = "learning-system";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal ".mysql_error());
mysql_select_db($database) or die("Database tidak bisa dibuka ".mysql_error());
?>