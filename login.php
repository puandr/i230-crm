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
				$connection = mysqli_connect($host, $user, $pass, $db) or die("Ei saa ühendust mootoriga- ".mysqli_error());
				
				mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

				$valideeritud_kasutajanimi = data_validation($_POST['kasutajanimi']);
				$valideeritud_parool = data_validation($_POST['parool']);
				
				/*
				// ettevalmistus
				$stmt = mysqli_prepare($connection, "SELECT id FROM 10162828_i244_users WHERE kasutajanimi = ? AND parool = ?");
				printf("Errormessage: %s\n", mysqli_error($connection));
				// seome muutujad
				$kasutajanimi = mysqli_real_escape_string($connection, $_POST['kasutajanimi']);
				$parool = sha1(mysqli_real_escape_string($connection, $_POST['parool']));
				mysqli_stmt_bind_param($stmt, "ss", $kasutajanimi, $parool);
				printf("Errormessage: %s\n", mysqli_error($connection));
				
				mysqli_stmt_execute($stmt);
				
				printf("Error: %s.\n", mysqli_stmt_error($stmt));
				
				mysqli_stmt_bind_result($stmt, $resultaat);
				printf("Errormessage: %s\n", mysqli_error($connection));
				
				echo $resultaat;
				echo mysqli_stmt_affected_rows($stmt);
				printf("Errormessage: %s\n", mysqli_error($connection));
				
				if (mysqli_stmt_affected_rows($stmt) == 1) {
					$_SESSION['kasutajanimi'] = $_POST['kasutajanimi'];
					header("Location: ?page=i244");					
				} else {
					$errors[] = "Vale kasutajanimi või parool";
				}
				
				*/
				
			
				$kasutajanimi = mysqli_real_escape_string($connection, $valideeritud_kasutajanimi);
				$parool = mysqli_real_escape_string($connection, $valideeritud_parool);
				$query = "SELECT kasutajanimi, parool FROM 10162828_i244_users WHERE kasutajanimi = '$kasutajanimi' AND parool = SHA1('$parool')";
				$result = mysqli_query($connection, $query);					
				if (mysqli_num_rows($result)) {
					$_SESSION['kasutajanimi'] = $_POST['kasutajanimi'];
					header("Location: ?page=i244");
					
				} else {
					$_SESSION['viga'] = "Vale kasutajnimi või parool";
					header("Location: ?page=i244");
				}
				
			} else {
				$_SESSION['puudu'] = "Kasutajanimi või parool on puudu";
				header("Location: ?page=i244");
			}
		}
	}
	
	//include_once('views/login.html');
?>