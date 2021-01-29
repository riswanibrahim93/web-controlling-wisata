<?php 
	session_start();
	include "koneksi.php";
	include "function.php";

	$pass = $_POST['password'];
	$user = $_POST['username'];
	$id;
	$notif;
	
	$sql = "SELECT * from user";
	$data = select($sql);
	foreach ($data as $b)
	{
		if( $b['password_user'] == $pass && $b['username_user'] == $user )
		{
			$notif = 'no';
		}
	}
	if($notif != "no")
	{
		echo "<script>alert('username atau password salah');history.back()</script>";
	}
	else
	{
		$_SESSION['username'] = $user;
		$_SESSION['password'] = $pass;
		header("location:home_wisata.php");
	}

 ?>