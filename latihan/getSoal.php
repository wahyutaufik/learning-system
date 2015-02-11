<?php  
include '../config/koneksi.php';
$idMatkul = $_POST['id_matkul'];
if($idMatkul == ''){
     exit;
}else{
	$sqlSoal = " SELECT * FROM soal WHERE matakuliah = '$idMatkul' ORDER BY pertanyaan";
	$getListSoal = mysql_query($sqlSoal);
	echo '<option value="">-Pilih Soal-</option>';
	while($dataQuerySoal = mysql_fetch_array($getListSoal)){
	  echo '<option value="'.$dataQuerySoal['id'].'">'.$dataQuerySoal['pertanyaan'].'</option>';
	}
	exit;
}
?>