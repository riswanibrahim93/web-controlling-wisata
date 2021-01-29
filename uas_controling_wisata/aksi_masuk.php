<?php 
	include "koneksi.php";
	include "function.php";
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$notif;

	$sql = "SELECT * FROM `akun_utama`";
	$a = select($sql);
	foreach ($a as $data) {
		if( $data['password'] == $pass && $data['username'] == $user )
		{
			$notif = 'masuk';
		}
	}
	if($notif == "masuk")
	{
		header("location:form_ganti_admin.php?op=notif");
	}
	else
	{
		echo "<script>alert('username atau password salah');history.back()</script>";
	}
?>