<?php

error_reporting(0);
$modul = $_GET['p'];
$modulecase = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $modul)), " "), 1);
if (!isset($modul))$modul = 'pageDashboard';
switch($modul)
{
	/*--module--*/
	case 'home'                       : include 'module/home.php'; break;
	case 'login'                      : include 'module/login.php'; break;
	case 'cek_login'                  : include 'config/cek_login.php'; break;
	case 'login_admin'                : include 'module/login_admin.php'; break;
	case 'logout'                     : include 'module/logout.php'; break;
	case 'register'                   : include 'module/register.php'; break;
	case 'userProfile'                : include 'module/profile.php'; break;
	case 'getMatkul'                  : include 'dosen/getMatkul.php'; break;
	case 'pageDashboard'              : include 'module/dashboard.php'; break;
	case 'list'.ucfirst($modulecase)  : include 'module/list.php'; break;
	case 'delete'.ucfirst($modulecase): include 'module/delete.php'; break;
	case 'mataKuliah'                 : include 'module/matakuliah.php'; break;
	case 'materiMatkul'               : include 'module/materiMatkul.php'; break;
	case 'latihansoal'                : include 'module/latihansoal.php'; break;
	case 'soalUjian'                  : include 'module/soalUjian.php'; break;
	case 'saveSoalLatihan'            : include 'module/saveSoalLatihan.php'; break;
	case 'saveSoalUjian'              : include 'module/saveSoalUjian.php'; break;
	case 'ujian'                      : include 'module/ujian.php'; break;
	case 'inbox'                      : include 'module/allMessage.php'; break;
	case 'writeEmail'                 : include 'module/writeEmail.php'; break;
	case 'sendMail'                   : include 'module/sendMail.php'; break;
	case 'viewMessage'                : include 'module/viewMessage.php'; break;
	case 'nilai'                : include 'module/nilai.php'; break;
	
	/*--config--*/
	case 'password'                   : include 'config/change_password.php'; break;
	case 'simpan'                     : include 'config/add.php'; break;
	case 'update'                     : include 'config/update.php'; break;
	case 'eraseFunction'              : include 'config/delete_function.php'; break;
	
	/*-----admin-----*/
	case 'addAdmin'                   : include 'admin/add.php'; break;
	case 'detailAdmin'                : include 'admin/detail.php'; break;
	case 'updateAdmin'                : include 'admin/update.php'; break;
	
	/*-----menu-----*/
	case 'addMenu'                    : include 'menu/add.php'; break;
	case 'detailMenu'                 : include 'menu/detail.php'; break;
	case 'updateMenu'                 : include 'menu/update.php'; break;
	
	/*-----submenu-----*/
	case 'addSubmenu'                 : include 'submenu/add.php'; break;
	case 'detailSubmenu'              : include 'submenu/detail.php'; break;
	case 'updateSubmenu'              : include 'submenu/update.php'; break;
	
	/*-----dosen-----*/
	case 'addDosen'                   : include 'dosen/add.php'; break;
	case 'detailDosen'                : include 'dosen/detail.php'; break;
	case 'updateDosen'                : include 'dosen/update.php'; break;
	case 'updateDataDosen'            : include 'dosen/updateData.php'; break;
	case 'removeMatakuliahDosen'      : include 'dosen/removeMatakuliahDosen.php'; break;
	case 'removeMatkul'               : include 'dosen/removeMatkul.php'; break;
	
	/*-----jurusan-----*/
	case 'addJurusan'                 : include 'jurusan/add.php'; break;
	case 'detailJurusan'              : include 'jurusan/detail.php'; break;
	case 'updateJurusan'              : include 'jurusan/update.php'; break;
	
	/*-----mahasiswa-----*/
	case 'addMahasiswa'               : include 'mahasiswa/add.php'; break;
	case 'detailMahasiswa'            : include 'mahasiswa/detail.php'; break;
	case 'updateMahasiswa'            : include 'mahasiswa/update.php'; break;
	
	/*-----semester-----*/
	case 'addSemester'                : include 'semester/add.php'; break;
	case 'detailSemester'             : include 'semester/detail.php'; break;
	case 'updateSemester'             : include 'semester/update.php'; break;
	
	/*-----bab-----*/
	case 'addBab'                     : include 'bab/add.php'; break;
	case 'detailBab'                  : include 'bab/detail.php'; break;
	case 'updateBab'                  : include 'bab/update.php'; break;
	
	/*-----kelas-----*/
	case 'addKelas'                   : include 'kelas/add.php'; break;
	case 'detailKelas'                : include 'kelas/detail.php'; break;
	case 'updateKelas'                : include 'kelas/update.php'; break;
	
	/*-----mata Kuliah-----*/
	case 'addMatakuliah'              : include 'matakuliah/add.php'; break;
	case 'detailMatakuliah'           : include 'matakuliah/detail.php'; break;
	case 'updateMatakuliah'           : include 'matakuliah/update.php'; break;
	
	/*-----materi-----*/
	case 'addMateri'                  : include 'materi/add.php'; break;
	case 'detailMateri'               : include 'materi/detail.php'; break;
	case 'updateMateri'               : include 'materi/update.php'; break;
	case 'materiDosen'                : include 'materi/materiDosen.php'; break;
	case 'addMateriDosen'             : include 'materi/addMateriDosen.php'; break;
	case 'simpanMateriDosen'          : include 'materi/simpanMateriDosen.php'; break;
	case 'detailMateriDosen'          : include 'materi/detailMateriDosen.php'; break;
	case 'updateMateriDosen'          : include 'materi/updateMateriDosen.php'; break;
	case 'rubahMateriDosen'           : include 'materi/rubahMateriDosen.php'; break;
	case 'deleteMateriDosen'          : include 'materi/deleteMateriDosen.php'; break;
	case 'eraseMateriDosen'           : include 'materi/eraseMateriDosen.php'; break;

	/*-----latihan-----*/
	case 'addLatihan'                  : include 'latihan/add.php'; break;
	case 'createLatihan'               : include 'latihan/create.php'; break;
	case 'detailLatihan'               : include 'latihan/detail.php'; break;
	
	/*-----soal-----*/
	case 'addSoal'                    : include 'soal/add.php'; break;
	case 'detailSoal'                 : include 'soal/detail.php'; break;
	case 'updateSoal'                 : include 'soal/update.php'; break;
	case 'soalDosen'                  : include 'soal/soalDosen.php'; break;
	case 'addSoalDosen'               : include 'soal/addSoalDosen.php'; break;
	case 'simpanSoalDosen'            : include 'soal/simpanSoalDosen.php'; break;
	case 'detailSoalDosen'            : include 'soal/detailSoalDosen.php'; break;
	case 'updateSoalDosen'            : include 'soal/updateSoalDosen.php'; break;
	case 'rubahSoalDosen'             : include 'soal/rubahSoalDosen.php'; break;
	case 'deleteSoalDosen'            : include 'soal/deleteSoalDosen.php'; break;
	case 'eraseSoalDosen'             : include 'soal/eraseSoalDosen.php'; break;

	/*-----ujian-----*/
	case 'addUjian'                  : include 'ujian/add.php'; break;
	case 'createUjian'               : include 'ujian/create.php'; break;
	case 'detailUjian'               : include 'ujian/detail.php'; break;
}