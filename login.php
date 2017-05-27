<?php
	if (!empty($_SESSION['kasutajanimi'])) {
		header("Location: ?page=i244");
	} else {		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if ($_POST['kasutajanimi'] != "" && $_POST['parool'] != "") {
				$host = "localhost";
				$user = "test";
				$pass = "t3st3r123";
				$db = "test";
				$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
				
				mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

				//mysqli_connect("$host", "$user", "$pass")or die("cannot connect server "); 
	
				$kasutajanimi = mysqli_real_escape_string($connection, $_POST['kasutajanimi']);
				$parool = mysqli_real_escape_string($connection, $_POST['parool']);
				$query = "SELECT kasutajanimi, parool FROM 10162828_i244_users WHERE kasutajanimi = '$kasutajanimi' AND parool = SHA1('$parool')";
				$result = mysqli_query($connection, $query);					
				if (mysqli_num_rows($result)) {
					$_SESSION['kasutajanimi'] = $_POST['kasutajanimi'];
					header("Location: ?page=i244");
					
				} else {
					$errors[] = "Vale kasutajanimi või parool";
				}
			} else {
				$errors[] = "Palun sisestage kasutajanimi ja parool";
			}
		}
	}
	
	//include_once('views/login.html');
?>