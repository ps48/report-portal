<?php
  include("./session.php"); 
  confirmlogin();

if(!(($_SESSION['user-level']==1)||($_SESSION['user-level']==0)||($_GET['user']==$_SESSION['user-id']))) //Illegal Session
		{
			header("Location: ./index.php");
			exit();
		}
else
{
	include("./includes/connection.php");

	$user=$_GET['user'];
	$ts=$_GET['time'];

	$query="SELECT `report` FROM `rtable` WHERE regno=" . $user. " AND timestamp='".$ts. "'";

	$result=mysql_query($query,$con);

	if(!$result)
	{
		echo mysql_error();
	}
	else
	{
		$fetch=mysql_fetch_array($result);

		$text = $fetch['report'];
		echo "<html>";
		echo 	$text;
		echo "</html>";

	}
}

?>
