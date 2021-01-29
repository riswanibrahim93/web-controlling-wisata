<?php 
session_start();
include "koneksi.php";
include "function.php";

$nama = $_POST['nama_user'];
$username = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email_user'];
$ket = "tidak";

$sql = "SELECT * from user";
$data = select($sql);
foreach ($data as $b)
{
	if($username == $b['username_user'] || $pass == $b['password_user'])
	{
		$ket = "ada";
	}
}
if($ket == "ada")
{
	echo "<script>alert('username atau password sudah digunakan');history.back()</script>";
}
else
{

	$sql2 = "INSERT INTO `user`(`nama_user`, `username_user`, `password_user`, `email_user`) VALUES ('$nama','$username','$pass','$email')";
	$hasil = insert($sql2);
	if($hasil == true)
	{
		header("location:form_masuk.html");
	}
	else
	{
		echo "<script>alert('error');history.back()</script>";
	}
}

 ?>