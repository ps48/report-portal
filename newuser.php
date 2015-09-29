<?php include("./session.php"); ?>
<?php confirmlogin(); ?>

<?php

  

  $user= $_POST['user'];

  $pass=$_POST['pass'];

  $name=$_POST['name'];

  $ulevel=2;

  $hashedpass = sha1($pass);

  $con = mysql_connect("localhost", "root", "");



	mysql_select_db( "aaruush_report",$con);

	$query="INSERT INTO `ptable`(`regno`, `name`, `password`, `ulevel`) VALUES (".$user.",'".$name."','".$hashedpass."',".$ulevel.")";

	if( mysql_query($query,$con))
	{
		header("Location: ./mainpage.php?nuser=".$name.""); /* Redirect browser */
		
		exit();

	}
	else
	{
		echo " databse connection failed" . mysql_error();
	}


	

	



  
  ?>