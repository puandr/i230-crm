<?php require_once('header.html')?>

<?php 

if (isset( $_GET["page"] )) {
	$kuhuvaja = $_GET["page"];

	switch($kuhuvaja) {
		case "avaleht" : include("avaleht.php"); break;
		case "analuus" : include("analuus.php"); break;
		case "nouded" : include("nouded.php"); break;
		case "usecase" : include("usecase.php"); break;
		case "erd" : include("erd.php"); break;
		case "ooa" : include("ooa.php"); break;
		case "i244" : include("i244.php"); break;
	}
} else {
	include("avaleht.php");
}

require_once('footer.html');
?>