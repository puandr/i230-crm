<?php
	global $connection;
	//kui kasutaja on juba sisselogitud, siis lehte ei kuvata
	if (!empty($_SESSION['kasutajanimi'])) {
		header("Location: ?page=i244");
	} else {		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if ($_POST['kasutajanimi'] != "" && $_POST['parool'] != "") {
				//valideeritakse kasutaja poolt saadud andmed
				$valideeritud_kasutajanimi = data_validation($_POST['kasutajanimi']);
				$valideeritud_parool = data_validation($_POST['parool']);
				
				//valmistatakse ette turvaline SQL päring
				$kasutajanimi = mysqli_real_escape_string($connection, $valideeritud_kasutajanimi);
				$parool = mysqli_real_escape_string($connection, $valideeritud_parool);
				$query = "SELECT kasutajanimi, parool FROM 10162828_i244_users WHERE kasutajanimi = '$kasutajanimi' AND parool = SHA1('$parool')";
				$result = mysqli_query($connection, $query);					
				
				//kui kasutaja poolt sisestatud kasutajanimi ja parool on õiged, siis kasutajale pannakse kirja sessiooni võti ja suunatase edasi
				if (mysqli_num_rows($result)) {
					$_SESSION['kasutajanimi'] = $_POST['kasutajanimi'];
					header("Location: ?page=i244");					
				} else {
					//kui kasutajanimi või parool olid valed, pannakse vastav sessiooni võti ja suunatakse edasi
					$_SESSION['viga'] = "Vale kasutajnimi või parool";
					header("Location: ?page=i244");
				}					
			} else {
				//kui kasutajanimi v]i aprool oli puudud, pannakse vastav sessiooni võti ja suunatakse edasi
				$_SESSION['puudu'] = "Kasutajanimi või parool on puudu";
				header("Location: ?page=i244");
			}
		}
	}
?>