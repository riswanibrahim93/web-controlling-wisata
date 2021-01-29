<?php 
session_start();
include "koneksi.php";
include "function.php";

$jml = $_POST['jumlah'];
$ket = $_POST['keterangan'];
$id = $_SESSION['id'];
$kuota;

$sql = "SELECT * from wisata where `id_wisata` = '$id'";
$data = select($sql);
foreach ($data as $b)
{
	$kuota = $b['kuota'];
	$jumlah = $b['jumlah_pengunjung'];
}
if($jumlah>$kuota)
{
	echo "<script>alert('Maaf, kuota penuh');history.back()</script>";
}
else
{
	$sql2 = "INSERT INTO `pengunjung`(`id_wisata`, `waktu`, `jumlah`, `keterangan`) VALUES ('$id',now(),'$jml','$ket')";
	$hasil = insert($sql2);
	if($hasil == true)
	{
		header("location:controling12.php?op=$id");
	}
	else
	{
		echo "<script>alert('error');history.back()</script>";
	}
}
 ?>