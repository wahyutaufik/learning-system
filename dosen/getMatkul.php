<?php  
include '../config/koneksi.php';
$idKelas = $_POST['id_kelas'];
 
if($idKelas == ''){
     exit;
}else{
	$sql = " SELECT * FROM matakuliah WHERE id_kelas = '$idKelas' AND status_dosen = 0 ORDER BY nm_matkul";
	$getNamaMatkul = mysql_query($sql);
	echo '<option value="">-Pilih Mata Kuliah-</option>';
	while($dataQueryKelas = mysql_fetch_array($getNamaMatkul)){
	  echo '<option value="'.$dataQueryKelas['id'].'">'.$dataQueryKelas['nm_matkul'].'</option>';
	}
	exit;
}
?>