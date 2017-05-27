<?php 
require_once('header.html');

session_start();

function data_validation($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

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