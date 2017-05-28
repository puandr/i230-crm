<div class = "main-body">
	
	<h2>i244 retsenseerijatele</h2>
	
	<h3>Projekti kirjeldus i244 kohalt</h3>	
	
	<h3>Värviteema muutus</h3>
	<div class = "varviteemavalik" id="sinine"></div>
	<div class = "varviteemavalik" id="roheline"></div>
	<div class = "varviteemavalik" id="must"></div>
	<div class = "varviteemavalik" id="lilla"></div>
		
	<?php
		//Toimub kontroll, kas kasutaja on sisselogitud
		if (isset($_SESSION['kasutajanimi'])) {			
			//Kui kasutaja on sisselogitud admin-na, siis kuvatakse talle kommentaaride kirjutamise vorm
			if ($_SESSION['kasutajanimi'] == 'admin') {			
				//Esialgu kuvatakse ka Log out nupp, millega saab sessiooni kustutada, failis logout.php
				echo '
				<h2>Väljalogimine</h2>
				<form id="logoutform" action="?page=logout" method="POST" >
					<input type="submit" value="Logi välja"/>
				</form>
				<h2>Kommentaaride lisamine</h2>
				<form id="form1" name="gb_form" method="post" action="?page=lisakomm">
					<p>Nimi:</p>
					<p><input name="nimi" type="text" id="nimi" size="40" placeholder="Teie nimi"></p>
					<p>Kommentaar:</p>
					<p><textarea name="kommentaar" cols="40" rows="3" id="kommentaar" placeholder="Teie kommentaar"></textarea></p>
					<p><input type="submit" name="Submit" value="Saada"></p>
				</form>
				';
			}
		} else {
			//kui kasutaja ei ole sisselogitud, siis kuvatakse talle sisselogimise vorm
			echo '<h2>Sisselogimine</h2>';
			//kui kasutajanimi või parool ei sobinud, siis näidatakse veateted
			if (isset($_SESSION['viga'])) {
				echo '<p class="viga">' . $_SESSION['viga'] .'</p>';
				$_SESSION['viga'] = '';
			}
			//kui kasutajanimi või parool oli puudu, siis näidatakse vastavat veateadet
			if (isset($_SESSION['puudu'])) {
				echo '<p class="viga">' . $_SESSION['puudu'] . '</p>';
				$_SESSION['puudu'] = '';
			}
			echo '
				<form id="loginform" action="?page=login" method="POST" >
					<p>Teie kasutajanimi:</p>
					<p><input type="text" name="kasutajanimi" placeholder="kasutajanimi"/></p>
					<p>Teie parool:</p>
					<p><input type="password" name="parool" placeholder="parool"/></p>
					<p><input type="submit" value="Logi sisse"/></p>
				</form>
			';
		}
		
	?>
	
	<h2>Kommentaarid</h2>
	
	<?php		
		global $connection;
		
		//Andmebaasist küsitakse kommentaaride tabeli sisu. Kuna siin ei ole muutujaid, siis ei pidanud vajlikuks teha seda turvaliselt
		$sql="SELECT * FROM 10162828_i244_guestbook ORDER BY lisamise_aeg DESC";
		$result = mysqli_query($connection, $sql);
	?>
	
	
	<table>
		<tr>
			<th>Nimi</th>
			<th>Kommentaar</th>
			<th>Lisamise aeg</th>
		</tr>
		
	<?php
		//Tulemus näidatakse tabelina
		while($rows = mysqli_fetch_array($result)) {
	?>	
		<tr>			
			<td class = "nime_veerg"><?php echo htmlspecialchars($rows['nimi']); ?></td>
			<td><?php echo htmlspecialchars($rows['kommentaar']); ?></td>
			<td class = "aja_veerg"><?php echo htmlspecialchars($rows['lisamise_aeg']); ?></td>			
		</tr>		
	<?php
		}
	?>
	
	</table>
	
	
</div>

