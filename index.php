<?php 
require_once('header.html');

//alustatakse sessiooni
session_start();
//luuakse ühendust andmebaasiga
db_connect();

//andmebaasiga ühenduse loomis feunktsioon
function db_connect(){
	global $connection;	
	$host = "localhost";
	$user = "test";
	$pass = "t3st3r123";
	$db = "test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("Ei saa ühendust mootoriga- ".mysqli_error());
		
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

//HTML vormidest uleneva info valideerimine, et eemaldada või vahetada ohtlikud sümbolid
function data_validation($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

//kontrolleri osa, mis otsustab mis lehte näidatatkse
$kuhuvaja = "avaleht";
if (isset( $_GET["page"] )) {
	$kuhuvaja = htmlspecialchars($_GET["page"]);

	switch($kuhuvaja) {
		case "avaleht" : include("avaleht.php"); break;
		case "analuus" : include("analuus.php"); break;
		case "nouded" : include("nouded.php"); break;
		case "usecase" : include("usecase.php"); break;
		case "erd" : include("erd.php"); break;
		case "ooa" : include("ooa.php"); break;
		case "i244" : include("i244.php"); break;
		case "lisakomm" : include("lisakomm.php"); break;
		case "login" : include("login.php"); break;
		case "logout" : include("logout.php"); break;
	}
} else {
	include("avaleht.php");
}

require_once('footer.html');
?>