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
		header("Location: ./mainpage.php"); /* Redirect browser */
		exit();
	}
	else
	{
		header("Location: ./index.php?user=invalid"); /* Redirect browser */
		exit();
	}
  
?>