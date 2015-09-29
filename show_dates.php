<?php 
   include("./session.php");
   confirmlogin();
   include("./includes/header.php"); 
   include("./includes/connection.php");
?>

<center>
<span>
		<div id ="sidebar">
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

		<div id ="mainbar">
			<section>
				<span >
				Welcome <?php echo$_SESSION['user-name']." ,"; ?> 
				</span>
				<span>
					<a href="./logout.php"> Logout </a>
				</span>	
			</section>

			<div id = "dbfetch">
				<div id="dbcontent">
						<?php
							if($_SESSION['user-level']==2)
								{
									echo "<div>Reports you have already submitted</div>";
									$query="SELECT `timestamp` FROM `rtable` WHERE regno=" . $_SESSION['user-id'];
									$result=mysql_query($query,$con);

										if($result)
										{
											while($row=mysql_fetch_array($result))
											{
												$dates= $row['timestamp'];	
												echo "<a href=\"./show_report.php?user=".$_SESSION['user-id']."&time=".$dates." \" target=\"_blank\">". $dates."</a> ";
											}

										}
										else
										{
											echo mysql_error();
										}
								}
								else
								{
									if(isset($_GET['regno'])&&(($_SESSION['user-level']==1)||($_SESSION['user-level']==0)))
									{
										echo "<div>Date & time for username : ".$_GET['name']."</div>";
										$query="SELECT `timestamp` FROM `rtable` WHERE regno=" . $_GET['regno']." order by timestamp desc";
										$result=mysql_query($query,$con);

										if($result)
										{
											while($row=mysql_fetch_array($result))
											{
												$dates= $row['timestamp'];	
												echo "<a href=\"./show_report.php?user=".$_GET['regno']."&time=".$dates." \" target=\"_blank\">". $dates."</a> ";
											}

										}
										else
										{
											echo mysql_error();
										}
									}
									else
									{  if(!isset($_GET['username'])&&(($_SESSION['user-level']==1)||($_SESSION['user-level']==0)))
										{	
											echo "<div>Distinct dates on which users have reported</div>";
											$query="SELECT DISTINCT date(timestamp) from rtable ORDER BY timestamp DESC ";
											$result=mysql_query($query,$con);

											if($result)
											{
												while($row=mysql_fetch_array($result))
												{	
													$dates= $row['date(timestamp)'];	
													echo "<a href=\"./show_names.php?time=".$dates." \" >". $dates."</a> ";
												}

											}
											else
											{
												echo mysql_error();
											}

										}
										else
										{	if(($_SESSION['user-level']==1)||($_SESSION['user-level']==0))
											{
												echo "<div>distinct times in which ".$_GET['username']." has reported on ".$_GET['time']."</div>";
												$query="SELECT regno,timestamp,time(timestamp) FROM `rtable` WHERE `name` LIKE '".$_GET['username']."' AND `timestamp` LIKE '%".$_GET['time']."%' ORDER BY timestamp DESC ";
												$result=mysql_query($query,$con);

												if($result)
												{
													while($row=mysql_fetch_array($result))
													{	
														
														$dates= $row['timestamp'];
														$user=$row['regno'];
														$times=$row['time(timestamp)'];
														echo "<a href=\"./show_report.php?user=".$user."&time=".$dates." \" target=\"_blank\">". $times."</a>";
													}

												}
												else
												{
													echo mysql_error();
											    }	
											}

										}	


									}
								}		
						?>
				</div>
			</div>			
		</div>
	</span>

</center>
<?php include("./includes/footer.php"); ?>