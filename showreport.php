<?php

	$user=$_GET['user'];
	$ts=$_GET['time'];


	$con = mysql_connect("localhost", "root", "");

	mysql_select_db( "aaruush_report",$con);


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




?>
