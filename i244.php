<div class = "main-body">
	
	<h2>i244 retsenseerijatele</h2>
	
	<h3>Projekti kirjeldus i244 kohalt</h3>
	
	
	
	<?php 
		if (isset($_SESSION['kasutajanimi'])) {			
			if ($_SESSION['kasutajanimi'] == 'admin') {			
				echo '
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
			echo '
				<h2>Sisselogimine</h2>
				<form id="loginform" action="?page=login" method="POST" >
					<input type="text" name="kasutajanimi" placeholder="kasutajanimi"/><br/>
					<input type="password" name="parool" placeholder="parool"/><br/>
					<input type="submit" value="Logi sisse!"/>
				</form>
			';
		}
		
	?>
	
	<h2>Kommentaarid</h2>
	
	<?php
	/*
		if (!empty($_SESSION['kasutajanimi'])) {
			echo $_SESSION['kasutajanimi'];
		} else {
			echo "<h1>sessioon on tühi</h1>";
		}
	*/
		$host = "localhost";
		$user = "test";
		$pass = "t3st3r123";
		$db = "test";
		$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
		
		mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

		mysqli_connect("$host", "$user", "$pass")or die("Ei saanud ühendust serveriga"); 
		
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
		while($rows = mysqli_fetch_array($result)) {
	?>	
		<tr>			
			<td width = 35%><?php echo $rows['nimi']; ?></td>
			<td><?php echo $rows['kommentaar']; ?></td>
			<td width = 10%><?php echo $rows['lisamise_aeg']; ?></td>			
		</tr>		
	<?php
		}
	?>
	
	</table>
			
	
</div>

