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

	$query="SELECT `name`,`report` FROM `rtable` WHERE regno=" . $user. " AND timestamp='".$ts. "'";

	$result=mysql_query($query,$con);

	if(!$result)
	{
		$ts= date("Y-m-d H:i:s");
		$error= $ts." Page-".basename(__FILE__, '')." ".mysql_error()." User ".$_SESSION['user-id']."\n";
		file_put_contents ( "_ERROR_LOG.txt",$error,FILE_APPEND);
		header("Location: ./dashboard.php?error=page error"); /* Redirect browser */
		exit();
	}
	else
	{
		$fetch=mysql_fetch_array($result);

		$name = $fetch['name'];
		$text = $fetch['report'];
		
		include("./includes/header.php");
?>

<div class="container">
	<div class="card-panel row">
		<div class="left blue-text col s3">
		     User: <?php echo " ".$name; ?>	
		</div>

		<div class="right blue-text col s3">
		  Time: <?php echo " ".$ts; ?>
		</div>
		<div class="spacer"></div>
		<div class="col s12">
			<?php echo 	$text; ?>
		</div>
		
		<div class="spacer"></div>
	</div>
</div>

<?php		
	include("./includes/footer.php");

	}
}

?>
