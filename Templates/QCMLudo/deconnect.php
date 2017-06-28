<?php 
	session_unset();
	session_destroy();
	$_SESSION = array();

	$host  	= $_SERVER['HTTP_HOST'];
	$uri   	= rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: http://$host$uri/index.php");
	exit; 
?>