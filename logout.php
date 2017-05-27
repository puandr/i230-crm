<?php	
	//kui kasutaja vajutab Log Out nuppu, siis tema sesioon kustutatakse ja suunatakse tagasi tava kasutajana
	if(isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '',
		time()-42000, '/');
	}
	$_SESSION = array();
	session_destroy();
	
	header("Location: ?page=i244");
?>