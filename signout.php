<?php	
	session_start();
	session_unset($_SESSION['role']);
	session_unset($_SESSION['baru']);
	session_destroy();
	header("Location: index.php");
