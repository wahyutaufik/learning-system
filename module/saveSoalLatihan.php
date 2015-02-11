<?php  
$idLatihan = $_POST['id_latihan'];
$idSoal    = $_POST['id_soal'];
$idBab     = $_POST['id_bab'];
$idMateri  = $_POST['id_materi'];
$score     = '';

unset($_POST['id_latihan']);
unset($_POST['id_soal']);
unset($_POST['id_bab']);
unset($_POST['id_materi']);

foreach ($_POST as $key => $post) {
	$noSoal        = explode('-', $key);
	$no_soal       = $noSoal[1];
	$id_soal       = $idSoal[$noSoal[1]-1];
	$saveToJawaban = mysql_query("INSERT INTO jawablatihan (id_mahasiswa, id_latihan, id_soal, no_soal, jawaban) VALUES ('$_SESSION[id]', '$idLatihan', '$id_soal', '$no_soal', '$post')");
	$lihatSoal = mysql_query("SELECT * FROM soal WHERE id = $id_soal");
	while ($isianSoal = mysql_fetch_assoc($lihatSoal)) {
		$nilai = '';
		
		if ($post == $isianSoal['jawaban_benar']) {
			$nilai = 1;
		} else {
			$nilai = 0;
		}
		$true += $nilai;
		$countPost[] = $post;
	}
	$post = count(array($post));
}
$totalWidth = count($countPost);
$score = ($true/$totalWidth)*100;

mysql_query("INSERT INTO nilailatihan (id_mahasiswa, id_latihan, nilai) VALUES ('$_SESSION[id]', '$idLatihan', '$score')");
mysql_query("INSERT INTO user_latihan (id_mahasiswa, id_latihan, id_bab, id_materi) VALUES ('$_SESSION[id]', '$idLatihan', '$idBab', '$idMateri')");
echo"<meta http-equiv='refresh' content='0; url=index.php?p=mataKuliah'>";

?>