<?php 
include "function.php";

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "DELETE FROM `user` WHERE `username_user`= '$user' and `password_user` = '$pass'";
$hasil = delete($sql);
if($hasil == true)
	{
		echo "<script>alert('Delete akun berhasil');history.back()</script>";
	}
	else
	{
		echo "<script>alert('error');history.back()</script>";
	}
?>