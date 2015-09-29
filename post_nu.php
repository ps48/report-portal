<?php include("./session.php"); 
	  confirmlogin();
	  include("./includes/connection.php");

  $name=$_POST['name'];
  $ulevel=2;
  $query="INSERT INTO `ptable`(`regno`, `name`, `password`, `ulevel`) VALUES (".$user.",'".$name."','".$hashedpass."',".$ulevel.")";

	if( mysql_query($query,$con))
	{
		header("Location: ./dashboard.php?nuser=".$name); /* Redirect browser */
		exit();
	}
	else
	{
		echo " databse connection failed" . mysql_error();
	}

?>