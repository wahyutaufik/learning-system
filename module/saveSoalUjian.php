<?php  
$idUjian = $_POST['id_ujian'];
$idSoal  = $_POST['id_soal'];

unset($_POST['id_ujian']);
unset($_POST['id_soal']);

foreach ($_POST as $key => $post) {
	$noSoal        = explode('-', $key);
	$no_soal       = $noSoal[1];
	$id_soal       = $idSoal[$noSoal[1]-1];
	$saveToJawaban = mysql_query("INSERT INTO jawabanujian (id_mahasiswa, id_ujian, id_soal, no_soal, jawaban) VALUES ('$_SESSION[id]', '$idUjian', '$id_soal', '$no_soal', '$post')");
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

mysql_query("INSERT INTO nilaiujian (id_mahasiswa, id_ujian, nilai) VALUES ('$_SESSION[id]', '$idUjian', '$score')");
mysql_query("INSERT INTO user_ujian (id_mahasiswa, id_ujian) VALUES ('$_SESSION[id]', '$idUjian')");
echo"<meta http-equiv='refresh' content='0; url=index.php?p=ujian'>";
?>