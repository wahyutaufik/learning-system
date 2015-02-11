<?php  
include "../config/koneksi.php";
$getJur     = "SELECT * from jurusan WHERE id = $_POST[id_jurusan]";
$getJurusan = mysql_query($getJur);

while ($jurusan = mysql_fetch_assoc($getJurusan)) {
	$kd_jurusan = $jurusan['kd_jurusan'];
}

$firstLater        = date('y');
$query3            = "SELECT * FROM mahasiswa";
$result3           = mysql_query($query3);
$count             = mysql_num_rows($result3);
$jumlah            = $count+1;
$lastChar          = str_pad($jumlah, 3, "0", STR_PAD_LEFT);
$nim               = $firstLater.$kd_jurusan.$lastChar;
$password          = base64_encode($_POST['tanggal_lahir']);
$_POST['password'] = $password;
$_POST['nim']      = $nim;
$_POST['status']   = 1;

foreach ($_POST as $key => $value) {
	$fields[]   = $key;
	$contents[] = $value;
}
$field   = implode(', ', $fields);
$content = implode("', '", $contents);

$insert  = "INSERT INTO mahasiswa (id, $field, image) VALUES (NULL ,'$content','')";
$reg     = mysql_query($insert);
?>
<?php if ($reg): ?>
	<script>
		alert('Selamat Anda telah terdaftar, Silahkan cek email');
		window.location.assign("login.php");
	</script>
<?php else: ?>
	<script>
		alert('Pendaftaran Gagal, Silahkan ulangi');
		window.location.assign("login.php");
	</script>
<?php endif ?>