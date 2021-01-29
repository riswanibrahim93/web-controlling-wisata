<?php 
	session_start();
	include "koneksi.php";
	include "function.php";

	$pass = $_POST['password'];
	$user = $_POST['username'];
	$id;
	$notif;
	
	$sql = "SELECT * from admin";
	$data = select($sql);
	foreach ($data as $b)
	{
		if( $b['password_admin'] == $pass && $b['username_admin'] == $user )
		{
			$sql = "SELECT * from admin where username_admin = '$user'";
			$d = $koneksi->query($sql);
			while ($c = mysqli_fetch_array($d)) 
			{
				$id = $c['id_wisata'];
			}
			$notif = 'no';
		}
	}
	if($notif != "no")
	{
		echo "<script>alert('username atau password salah');history.back()</script>";
	}
	else
	{
		header("location : controling12.php?op=$id");
	}

 ?>