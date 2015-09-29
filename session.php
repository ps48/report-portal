<?php


	session_start();

	function loggedin()
	{
		return isset($_SESSION['user-id']);
	}

	function confirmlogin()
	{
		if(!loggedin())
		{
			header("Location: ./index.php"); /* Redirect browser */
			exit();
		}
	}
	

?>	