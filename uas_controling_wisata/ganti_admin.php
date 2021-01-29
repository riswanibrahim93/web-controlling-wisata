<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="tabel.css">
	<link rel="stylesheet" type="text/css" href="w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Ganti Admin</title>
</head>
<body>
	<br><br>
	<div class="w3-container">
		<div class="login">
	  	<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Login</button>
	  	</div>
	  	<div id="id01" class="w3-modal">
		    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

		      	<div class="w3-center"><br>
		        	<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
		      	</div>

		      	<form class="w3-container" action="aksi_masuk.php" method="POST">
		        	<div class="w3-section">
			          <label><b>Username</b></label>
			          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="user" required>
			          <label><b>Password</b></label>
			          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="pass" required>
			          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
		        	</div>
		      	</form>

		     	<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
		        	<button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
		      	</div>

		    </div>
		</div>
	</div>
</body>
</html>