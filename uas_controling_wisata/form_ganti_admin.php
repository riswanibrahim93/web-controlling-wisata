<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="w3.css">
	<title></title>
</head>
<body>
	<?php 
	$masuk = $_GET['op'];
	if(!isset($masuk))
	{
		echo "<script>alert('anda belum login');history.back()</script>";
	}
	 ?>
	<div class="wadah">
	    <div class="w3-modal-content">
	      	<header class="w3-container w3-teal"> 
	        	<h2>Form Ganti Admin</h2>
	        	<span onclick="window.location.href = 'ganti_admin.php';" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
	      	</header>
        	<form class="w3-container" action="aksi_update_admin.php" method="POST">
			    <p>      
			    <label class="w3-text-teal"><b>Id Admin</b></label>
			    <input class="w3-input w3-border w3-pale-blue" name="id" type="text" placeholder="Masukkan Id Admin yang akan diganti"></p>
			    <p>  
			    <p>      
			    <label class="w3-text-teal"><b>Name</b></label>
			    <input class="w3-input w3-border w3-pale-blue" name="nama" type="text" placeholder="Masukkan nama baru"></p>
			    <p>      
			    <label class="w3-text-teal"><b>Username</b></label>
			    <input class="w3-input w3-border w3-pale-blue" name="username" type="text" placeholder="Masukkan username baru"></p>
			    <p>     
			    <label class="w3-text-teal"><b>Password</b></label>
			    <input class="w3-input w3-border w3-pale-blue" name="password" type="password" placeholder="Masukkan password baru"></p>
			    <p>     
			    <label class="w3-text-teal"><b>Email</b></label>
			    <input class="w3-input w3-border w3-pale-blue" name="email" type="email" placeholder="Masukkan email baru"></p>
			    <p>     
			    <label class="w3-text-teal"><b>No.Telepon</b></label>
			    <input class="w3-input w3-border w3-pale-blue" name="telepon" type="text" placeholder="Masukkan No.tlv baru"></p>
			    <p>
			    <button class="w3-btn w3-cyan w3-text-white">Update</button></p>
			</form>
	      	<footer class="w3-container w3-teal">
	        	<p> </p>
	      	</footer>
	    </div>
	</div>
</body>
</html>