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
							
							if(!isset($_GET['time']))  
								{
									echo "<div>Names of users already reported atleast once</div>";
									$query="SELECT DISTINCT regno,`name` FROM rtable ORDER BY name DESC";
									$result=mysql_query($query,$con);

									if($result)
									{
										while($row=mysql_fetch_array($result))
										{
											$name=$row['name'];
											$regno=$row['regno'];
											echo "<a href=\"./show_dates.php?regno=".$regno."&name=".$name." \" >".$name ." </a>";
										}

									}
								}
								else
								{
									echo "<div>Names of users reporting on date : ".$_GET['time']."</div>";
									$query="SELECT distinct name FROM `rtable` WHERE `timestamp` LIKE '%".$_GET['time']."%' ORDER BY timestamp DESC ";
									$result=mysql_query($query,$con);

										if($result)
										{	
											while($row=mysql_fetch_array($result))
											{	
												
												$username= $row['name'];
												
												echo "<a href=\"./show_dates.php?username=".$username."&time=".$_GET['time']." \" >".$username."</a> ";
												

											}

										}
										else
										{
											echo mysql_error();
										}

								}	
						?>
				</div>
			</div>			
		</div>
	</span>

</center>

<?php include("./includes/footer.php"); ?>