<?php 
   include("./session.php");
   confirmlogin();
   include("./includes/header.php"); 
   include("./includes/connection.php");
?>

<div class="spacer"></div>
 <div class="row">

      <div class="col s3">
      	<?php
				if($_SESSION['user-level']==1||$_SESSION['user-level']==0)
				{
					include("./includes/u1sidebar.php");
				}
				else
				{
					include("./includes/u2sidebar.php");
				}
		?>   
      </div>

      <div class="col s9">
       <div class="card-panel hoverable row">
       		
       		<h4 class="center-align blue-text text-darken-2"> Date-wise reports </h4>	
       			
       			<div class="row">
		       		<div class="col s4 left-align f18 blue-text">
						 Welcome <?php echo$_SESSION['user-name'].","; ?> 
		       		</div>

		       		<div class="offset-s4 col s4">
		       		    <a class="waves-effect waves-light btn blue right z-depth-1" href="./logout.php">Logout</a>
		       		</div>
		       	</div>

		       	<div class="blue-text text-darken-2">
		       		<div class="container spacer f18">
		       			<?php
							if($_SESSION['user-level']==2)
								{
									echo "<div>Reports you have already submitted</div><div class='spacer'></div>";
									$query="SELECT `timestamp` FROM `rtable` WHERE regno=" . $_SESSION['user-id'];
									$result=mysql_query($query,$con);

										if($result)
										{
											while($row=mysql_fetch_array($result))
											{
												$dates= $row['timestamp'];	
												echo "<a class='waves-effect waves-light btn blue left-align hoverable mspace' href=\"./show_report.php?user=".$_SESSION['user-id']."&time=".$dates." \" target=\"_blank\">". $dates."</a> ";
											}

										}
										else
										{
													$ts= date("Y-m-d H:i:s");
													$error= $ts." Page-".basename(__FILE__, '')." ".mysql_error()." User ".$_SESSION['user-id']."\n";
													file_put_contents ( "_ERROR_LOG.txt",$error,FILE_APPEND);
													header("Location: ./dashboard.php?error=page error"); /* Redirect browser */
													exit();
										}
								}
								else
								{
									if(isset($_GET['regno'])&&(($_SESSION['user-level']==1)||($_SESSION['user-level']==0)))
									{
										echo "<div>Date & time for username : ".$_GET['name']."</div><div class='spacer'></div>";
										$query="SELECT `timestamp` FROM `rtable` WHERE regno=" . $_GET['regno']." order by timestamp desc";
										$result=mysql_query($query,$con);

										if($result)
										{
											while($row=mysql_fetch_array($result))
											{
												$dates= $row['timestamp'];	
												echo "<a class='waves-effect waves-light btn blue left-align hoverable mspace' href=\"./show_report.php?user=".$_GET['regno']."&time=".$dates." \" target=\"_blank\">". $dates."</a> ";
											}

										}
										else
										{
											$ts= date("Y-m-d H:i:s");
											$error= $ts." Page-".basename(__FILE__, '')." ".mysql_error()." User ".$_SESSION['user-id']."\n";
											file_put_contents ( "_ERROR_LOG.txt",$error,FILE_APPEND);
											header("Location: ./dashboard.php?error=page error"); /* Redirect browser */
											exit();
										}
									}
									else
									{  if(!isset($_GET['username'])&&(($_SESSION['user-level']==1)||($_SESSION['user-level']==0)))
										{	
											echo "<div>Distinct dates on which users have reported</div><div class='spacer'></div>";
											$query="SELECT DISTINCT date(timestamp) from rtable ORDER BY timestamp DESC ";
											$result=mysql_query($query,$con);

											if($result)
											{
												while($row=mysql_fetch_array($result))
												{	
													$dates= $row['date(timestamp)'];	
													echo "<a class='waves-effect waves-light btn blue left-align hoverable mspace' href=\"./show_names.php?time=".$dates." \" >". $dates."</a> ";
												}

											}
											else
											{
												$ts= date("Y-m-d H:i:s");
												$error= $ts." Page-".basename(__FILE__, '')." ".mysql_error()." User ".$_SESSION['user-id']."\n";
												file_put_contents ( "_ERROR_LOG.txt",$error,FILE_APPEND);
												header("Location: ./dashboard.php?error=page error"); /* Redirect browser */
												exit();
											}

										}
										else
										{	if(($_SESSION['user-level']==1)||($_SESSION['user-level']==0))
											{
												echo "<div>distinct times in which ".$_GET['username'].
												" has reported on ".$_GET['time']."</div><div class='spacer'></div>";
												$query="SELECT regno,timestamp,time(timestamp) FROM `rtable` WHERE `name` LIKE '".$_GET['username']."' AND `timestamp` LIKE '%".$_GET['time']."%' ORDER BY timestamp DESC ";
												$result=mysql_query($query,$con);

												if($result)
												{
													while($row=mysql_fetch_array($result))
													{	
														
														$dates= $row['timestamp'];
														$user=$row['regno'];
														$times=$row['time(timestamp)'];
														echo "<a class='waves-effect waves-light btn blue left-align hoverable mspace' href=\"./show_report.php?user=".$user."&time=".$dates." \" target=\"_blank\">". $times."</a>";
													}

												}
												else
												{
													$ts= date("Y-m-d H:i:s");
													$error= $ts." Page-".basename(__FILE__, '')." ".mysql_error()." User ".$_SESSION['user-id']."\n";
													file_put_contents ( "_ERROR_LOG.txt",$error,FILE_APPEND);
													header("Location: ./dashboard.php?error=page error"); /* Redirect browser */
													exit();
											    }	
											}

										}	


									}
								}		
						?>
			

		       		</div>
	       		</div>

	       <div class="spacer"></div>
	       	

       </div>
      </div>

    </div>


<?php include("./includes/footer.php"); ?>