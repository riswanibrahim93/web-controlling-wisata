<?php
$host = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "wisata";
$koneksi = mysqli_connect($host, $username, $password, $database);
if ($koneksi) {
	echo " ";
} else {
	echo "Server Not Connected";
}
?>