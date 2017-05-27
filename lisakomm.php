<div class = "main-body">

<?php
	global $connection;

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