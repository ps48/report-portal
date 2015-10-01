<?php 
	include("./session.php");
    include("./includes/connection.php");

  $query="SELECT regno,name,ulevel FROM `ptable` WHERE regno=".$user." AND password='".$hashedpass."'";

  $result_set=mysql_query($query);

  if(!result_set)
	{
		echo mysql_error();
	}

  if(mysql_num_rows($result_set)==1)
	{
		$found_user=mysql_fetch_array($result_set);
		$_SESSION['user-id']=$found_user['regno'];
		$_SESSION['user-name']=$found_user['name'];
		$_SESSION['user-level']=$found_user['ulevel'];
		header("Location: ./dashboard.php"); /* Redirect browser */
		exit();
	}
	else
	{
		$ts= date("Y-m-d H:i:s");
		$error= $ts." Page-".basename(__FILE__, '')." ".mysql_error()." User ".$_SESSION['user-id']."\n";
		file_put_contents ( "_ERROR_LOG.txt",$error,FILE_APPEND);
		header("Location: ./index.php?error=invalid credentials"); /* Redirect browser */
		exit();
	}
  
?>