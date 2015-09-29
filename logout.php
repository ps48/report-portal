<?php include("./session.php"); ?>

<?php 
	
	$_SESSION=array();

	if(isset($_COOKIE[session_name()]))
	{
		setcookie(session_name(),'',time()-4200);
	}
	
	session_destroy();

	



?>

<?php confirmlogin(); ?>