<?php

function flash()
{
	$message = $_GET['message'];
	
	if ($message == "login") {
		echo login(); 
	} elseif ($message == "success") {
		echo success();
	} elseif ($message == "failed") {
		echo failed();
	} elseif ($message == "added") {
		echo added();
	} elseif ($message == "updated") {
		echo updated();
	} elseif ($message == "deleted") {
		echo deleted();
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

function success()
{
	echo "
		<div class='alert alert-success'>
			<center>
            	<b>Selamat datang</b>, Anda dapat megakses fasilitas di <b>belajaarcoding.com</b>.
        	</center>
        </div>
    ";
}

function failed()
{
	echo "
		<div class='alert alert-danger'>
			<center>
            	<b>Login gagal, silahkan ulangi dengan username dan password yang tepat.
        	</center>
        </div>
    ";
}

function added()
{
	echo "
		<div class='alert alert-info'>
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