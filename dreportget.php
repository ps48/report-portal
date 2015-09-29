<?php include("./session.php"); ?>
<?php confirmlogin(); ?>



<?php



	if(isset($_POST['data']))
	{

			$report= $_POST['data'];

			$con = mysql_connect("localhost", "root", "");

			mysql_select_db( "aaruush_report",$con);

			$ts= date("Y-m-d H:i:s");

			//echo $ts;

			$query = "INSERT INTO `rtable`( `regno`, name,`report`, `timestamp`) VALUES (" .$_SESSION['user-id'].",'".$_SESSION['user-name']."','" .$report. "','".$ts."' )";


			$result=mysql_query($query,$con);

			if(!$result)
			{
				echo " not added successfully" .mysql_error();
				//echo "not done";
			}
			else
			{
				//header("Location: ./mainpage.php"); /* Redirect browser */

				//exit();

				echo "this is it";

			}






	}
	else
	{
		echo "data not saved properly";
	}


?>
