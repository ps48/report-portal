<?php include("./session.php"); 
	  confirmlogin();
	  include("./includes/connection.php");

  $name=$_POST['name'];
  $ulevel=2;
  $query="INSERT INTO `ptable` (`regno`, `name`, `password`, `ulevel`) VALUES 
  							(".$user.",'".$name."','".$hashedpass."',".$ulevel.")";

	if( mysql_query($query,$con))
	{
		header("Location: ./dashboard.php?error= New User ".$name." created"); /* Redirect browser */
		exit();
	}
	else
	{
		$ts= date("Y-m-d H:i:s");
		$error= $ts." Page-".basename(__FILE__, '')." ".mysql_error()." User ".$_SESSION['user-id']."\n";
		file_put_contents ( "_ERROR_LOG.txt",$error,FILE_APPEND);
		header("Location: ./dashboard.php?error=user not created"); /* Redirect browser */
		exit();
	}

?>