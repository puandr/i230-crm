<div class = "main-body">

<?php
	$host = "localhost";
	$user = "test";
	$pass = "t3st3r123";
	$db = "test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

	mysqli_connect("$host", "$user", "$pass")or die("cannot connect server "); 
	
		
	$nimi_valideeritud = data_validation($_POST['nimi']);
	$kommentaar_valideeritud = data_validation($_POST['kommentaar']);
	
	$nimi = mysqli_real_escape_string($connection, $nimi_valideeritud);
	$kommentaar = mysqli_real_escape_string($connection, $kommentaar_valideeritud);
	$aeg = date("y-m-d h:i:s"); 
	
	$stmt = mysqli_prepare($connection, "INSERT INTO 10162828_i244_guestbook(nimi, kommentaar, lisamise_aeg)VALUES(?, ?, ?)");
	
	mysqli_stmt_bind_param($stmt, "sss", $nimi, $kommentaar, $aeg);
	
	mysqli_stmt_execute($stmt);

	header('Location: ?page=i244');

?>

</div>