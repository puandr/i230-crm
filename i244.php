<div class = "main-body">
	
	<h2>i244 retsenseerijatele</h2>
	
	<h3>Projekti kirjeldus i244 kohalt</h3>
	
	<h2>Kommentaride koht</h2>
	
	<?php
	$host = "localhost";
	$user = "test";
	$pass = "t3st3r123";
	$db = "test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

	mysqli_connect("$host", "$user", "$pass")or die("cannot connect server "); 
	
	$sql="SELECT * FROM 10162828_i244_guestbook";
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
			<td><?php echo $rows['nimi']; ?></td>
			<td><?php echo $rows['kommentaar']; ?></td>
			<td><?php echo $rows['lisamise_aeg']; ?></td>			
		</tr>
		
	<?php
	}
	?>
	
	</table>
			
	
	<form id="form1" name="gb_form" method="post" action="?page=lisakomm">
		<p>Nimi:</p>
		<p><input name="nimi" type="text" id="nimi" size="40"></p>
		<p>Kommentaar:</p>
		<p><textarea name="kommentaar" cols="40" rows="3" id="kommentaar"></textarea></p>
		<p><input type="submit" name="Submit" value="Saada"></p>
</div>

