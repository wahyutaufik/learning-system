<?php  
include '../config/koneksi.php';
$idMatkul = $_POST['id_matkul'];
if($idMatkul == ''){
     exit;
}else{
	$sqlSoal = " SELECT * FROM materi WHERE id_matkul = '$idMatkul' ORDER BY judul";
	$getListSoal = mysql_query($sqlSoal);
	echo '<option value="">-Pilih Materi-</option>';
	while($dataQueryMateri = mysql_fetch_array($getListSoal)){
	  echo '<option value="'.$dataQueryMateri['id'].'">'.$dataQueryMateri['judul'].'</option>';
	}
	exit;
}
?>