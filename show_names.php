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
       		
       		<h4 class="center-align blue-text text-darken-2"> Name-wise reports </h4>	
       			
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
							
							if(!isset($_GET['time']))  
								{
									echo "<div>Names of users already reported atleast once</div><div class='spacer'></div>";
									$query="SELECT DISTINCT regno,`name` FROM rtable ORDER BY name DESC";
									$result=mysql_query($query,$con);

									if($result)
									{
										while($row=mysql_fetch_array($result))
										{
											$name=$row['name'];
											$regno=$row['regno'];
											echo "<a class='waves-effect waves-light btn blue left-align hoverable mspace' href=\"./show_dates.php?regno=".$regno."&name=".$name." \" >".$name ." </a>";
										}

									}
								}
								else
								{
									echo "<div>Names of users reporting on date : ".$_GET['time']."</div><div class='spacer'></div>";
									$query="SELECT distinct name FROM `rtable` WHERE `timestamp` LIKE '%".$_GET['time']."%' ORDER BY timestamp DESC ";
									$result=mysql_query($query,$con);

										if($result)
										{	
											while($row=mysql_fetch_array($result))
											{	
												
												$username= $row['name'];
												
												echo "<a class='waves-effect waves-light btn blue left-align hoverable mspace' href=\"./show_dates.php?username=".$username."&time=".$_GET['time']." \" >".$username."</a> ";
												

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

	       <div class="spacer"></div>
	       	

       </div>
      </div>

    </div>


<?php include("./includes/footer.php"); ?>