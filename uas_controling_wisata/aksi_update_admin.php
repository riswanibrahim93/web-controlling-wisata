<?php 
include "function.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$tlv = $_POST['telepon'];

$sql = "UPDATE `admin` SET `nama_admin`='$nama',`username_admin`='$user',`password_admin`='$pass',`email_admin`='$email',`telepon`='$tlv' WHERE `id_admin`= '$id'";
$hasil = update($sql);
if($hasil == true)
	{
		echo "<script>alert('Update Admin berhasil');history.back()</script>";
	}
	else
	{
		echo "<script>alert('error');history.back()</script>";
	}
?>