<div class = "main-body">

<?php
	$host = "localhost";
	$user = "test";
	$pass = "t3st3r123";
	$db = "test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

	mysqli_connect("$host", "$user", "$pass")or die("cannot connect server "); 
	
	$nimi = mysqli_real_escape_string($connection, $_POST['nimi']);
	$kommentaar = mysqli_real_escape_string($connection, $_POST['kommentaar']);
	$aeg = date("y-m-d h:i:s"); 

	$sql = "INSERT INTO 10162828_i244_guestbook(nimi, kommentaar, lisamise_aeg)VALUES('$nimi', '$kommentaar', '$aeg')";
	$result = mysqli_query($connection, $sql);
	
	header('Location: ?page=i244');
	exit;
?>

</div>