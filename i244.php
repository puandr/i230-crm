<div class = "main-body">
	
	<h2>i244 retsenseerijatele</h2>
	
	<h3>Projekti kirjeldus</h3>	
	<p>Selles projektis ma kasutasin enamus neid teadmisi, mis sai omandatud selle aine raames. Et retsenseerijatele oleks lihtsam 
	hinnangut anda, siis siin ma lühidalt kirjeldan, mis ja kus on tehtud.</p>
	<h4>HTML</h4>
	<p>Kogu leht on tehtud HTML baasil. Ehk kasutatud on <code>p, h1-h4, ul, ol, div, table </code>elemente. HTML-ga on põhiliselt teostatud
	projekti sisu, ehk tekstid, pildid ja tabelid. Millele pöörata tähelepanu:</p>
	<ul>
		<li><code>header.html</code> failis head sektsioonis on kirjuatatud lahti missugused laiendused kasutati lehe tegemisel (JQuery, JQuery plugin, Google avatud font).</li>
		<li>Kuna tegu on MVC mudelil loodud lehega, siis <code>header.html</code> ja <code>footer.html</code> liidetakse PHP-ga kõikidele sisulehtedele.</li>
	</ul>
	
	
	<h4>CSS</h4>
	<p>CSS-i on kasutatud lehe vormistamiseks ja kujundamiseks. Teksti suurused ja värvid, tabelite kujundused, piltide näitamise tingimused.  Millele pöörata tähelepanu:</p>
	
	<ul>
		<li>CSS-ga on tehtud menüü, mis on alati nähtav. See on tehtud erinevate <code>div</code>-ga: menüü <code>div</code> (<code>#menu</code>, mis seisab paigal on alati nähtav) 
		ja lehe sisu <code>div</code>(<code>.main-body</code>, skrollitav), nende vahel on jaotatud kogu leht.</li>
		<li>CSS-ga on tehtud menüü efektid.</li>
	</ul>
	
	<h4>JavaScript / JQuery</h4>
	<p>Lehe tegemisel on kasutatud JQuery, kogu minu poolt kirjutatud kood asub failis <code>footer.html</code>. Seda võib jagada kolmeks osaks:</p>
	
	<ul>
		<li>Üks osa vastutab selle eest, et kui kasutaja klikkib värviteema värvile, siis selle peale kirjutatakse vastav värv küpsise muutujasse. Kuna JQuery on kliendi-poolne tehnoloogia,
		siis pidin kasutama JQuery plugina (asub js kataloogis), et saaks kasutada JQuery küpsiseid.</li>
		<li>Teine osa paikneb funktsioonis <code>highlightActiveMenu()</code>, ning vastutab selle eest, et aktiivne menüü element eristuks teistest menüü elementidest</li>
		<li>Kolmas osa vastutab vastava värviteema rakendamise eest.</li>
	</ul>
	
	<h4>PHP</h4>
	<p>PHP on kasutatud MVC mudeli loomiseks, kontrolleriks on <code>index.php</code>. Sammuti PHP-ga on tehtud pöördumised andmebaasile. Millele pöörata tähelepanu:</p>
	
	<ul>
		<li>Kontroller failis <code>index.php</code> on rohkem valikuid kui kasutajale nähtavaid lehti, sest login, logout, kommentaari lisamine on teostatud eraldi .php failides, aga kasutaja neid ei näe.</li>
		<li>Navigeerimnie toimub <code>header.html</code> failis linkide kaudu, lingid on kujul <code>?page=lehenimi</code>, ning selle page väärtusele vastavalt kontroller laeb vajaliku lehe include funktsiooni abil. </li>
		<li>Kõik kasutaja poolt saadud failid valideeritakse funktsiooniga <code>data_validation()</code>, mis asub kontrolleris. Sellega eemaldatakse sümboleid, mis võivad olla ohtlikud.
		Selleks on ka kasutatud PHP funktsiooni <code>htmlspecialchars</code>. </li>
		<li>Andmebaasiga ühendamisel on kasutatud erineva turvalisusega viise (mitte olulisuse mõttes, vaid demonstreerimaks erinevaid võtteid :)). Sisselogimise failis <code>login.php</code> on turvalisuse meetmeks ainult
		<code>mysqli_real_escape_string</code> funktsioon. Kommentaari lisamise failis <code>lisakomm.php</code> on kasutatud rohkem turvalisust pakkuvad MySQL päringuid ettevalmistavad funktsioonid: <code>mysqli_prepare, 
		mysqli_stmt_bind_param,	mysqli_stmt_execute</code>.</li>
		<li>Lehel on kasutatud sessioone, et saks meelde jätta sisselogitud kasutaja. Sessiooni alustatakse kontroller failis, ning lõpetatakse vastva nuppu vajutamisel ning <code>logout.php</code> sisu käivitamisega.</li>
		<li>Sisselogimine toimub kasutaja poolt sisestatud andmete võrdlemisega andmebaasis olevatega, kui kõik klapib, siis kasutaja saab sisse logitud ning saab kommentaare lisada. Kui andmed on valed või midagi 
		on puudu, siis näidatakse kasutajale vastav veateade, mille edastamiseks on kasutatud sessiooni muutujaid.</li>
		<li>Kommentaare saavad kirjutada ainult sisselogitud kasutajad.</li>
	</ul>
	
	<h4>MySQL</h4>
	<p>MySQL on kasutatud admin-i parooli hoidmiseks ning kommentaaride hoidmiseks. Päringutega võrreldakse kas kasutaja poolt sisestatud kasutajanimi ja parool klappivad. Ning päringutega lisatakse kommentaare ja 
	näidatakse kommentaare. Millele pöörata tähelepanu:</p>
	
	<ul>
		<li>Kommentaaridel on lisamise aeg.</li>
		<li>Kommentaare sorditakse järjekorras, et uuemad oleksid üleval</li>
	</ul>
	
	<h3>Värviteema muutus</h3>
	<p>Siin saab muuta lehe värviteema, piisab kui klikate värvi ruudule.</p>
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
			echo '<p>Kasutajanimi admin, parool meie i244 õpetaja perekonnanimi. Kõik väiksed tähed.</p>';
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
	<p>Kommentaare saavad lisada ainult sisselogitud kasutajad.</p>
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

