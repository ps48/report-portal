<?php include("./session.php"); 
	  confirmlogin(); 
	  include("./includes/connection.php");

	if(isset($_POST['data']))
	{

			$report= $_POST['data'];
			$ts= date("Y-m-d H:i:s");

			$query = "INSERT INTO `rtable`( `regno`, name,`report`, `timestamp`) VALUES (" .$_SESSION['user-id'].",'".$_SESSION['user-name']."','" .$report. "','".$ts."' )";
			$result=mysql_query($query,$con);

			if(!$result)
			{
				echo " not added successfully" .mysql_error();
			}
			else
			{
			//	echo "this is it";
				header("Location: ./dashboard.php"); /* Redirect browser */
				exit();		
			}
	}
	else
	{
		echo "data not saved properly";
	}

?>
