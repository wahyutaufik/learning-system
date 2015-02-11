<?php

function flash()
{
	if (isset($_GET['message'])) {
		$message = $_GET['message'];
	
		if ($message == "login") {
			echo login(); 
		} elseif ($message == "success") {
			echo success();
		} elseif ($message == "failed") {
			echo failed();
		} elseif ($message == "added") {
			echo added();
		} elseif ($message == "error") {
			echo error();
		} elseif ($message == "updated") {
			echo updated();
		} elseif ($message == "deleted") {
			echo deleted();
		} elseif ($message == "sent") {
			echo sent();
		}
	}
}

function login()
{
	echo "
		<div class='alert alert-danger'>
			<center>
	        	<b>Perhatian!</b> Anda harus login.
	    	</center>
	    </div>
    ";
}

function sent()
{
	echo "
		<div class='alert alert-success'>
			<center>
	        	<b>Berhasil!</b> Pesan Terkirim.
	    	</center>
	    </div>
    ";
}

function success()
{
	echo "
		<div class='alert alert-success'>
			<center>
            	<b>Selamat datang</b>.
        	</center>
        </div>
    ";
}

function failed()
{
	echo "
		<div class='alert alert-danger'>
			<center>
            	<b>Login gagal, username dan password salah.
        	</center>
        </div>
    ";
}

function error()
{
	echo "
		<div class='alert alert-danger'>
			<center>
            	<b>Data gagal ditambahkan, silahkan ulangi.
        	</center>
        </div>
    ";
}

function added()
{
	echo "
		<div class='alert alert-block alert-success'>
			<center>
            	Data berhasil ditambahkan.
        	</center>
        </div>
    ";
}

function updated()
{
	echo "
		<div class='alert alert-success'>
			<center>
            	Data Berhasil dirubah.
        	</center>
        </div>
    ";
}

function deleted()
{
	echo "
		<div class='alert alert-success'>
			<center>
            	Data Berhasil dihapus.
        	</center>
        </div>
    ";
}