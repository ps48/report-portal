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
				$ts= date("Y-m-d H:i:s");
				$error= $ts." Page-".basename(__FILE__, '')." ".mysql_error()." User ".$_SESSION['user-id']."\n";
				file_put_contents ( "_ERROR_LOG.txt",$error,FILE_APPEND);
				header("Location: ./dashboard.php?error=report not submitted"); /* Redirect browser */
				exit();
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
