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
       		
       		<h4 class="center-align blue-text text-darken-2"> My DashBoard </h4>	
       			
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
		       			<div class="f18 blue-text text-darken-2">Current Stats</div>
		       			
		       			<div class="container spacer blue-text darken-4-text">
		       				Total Reports Submitted: 
		       				<?php 

		       					if($_SESSION['user-level']==1||$_SESSION['user-level']==0)
									$query="SELECT count(report) FROM rtable where 1";				
								else
									$query="SELECT count(report) FROM rtable where regno=".$_SESSION['user-id'];				

								$result=mysql_query($query,$con);

									if($result)
									{
										while($row=mysql_fetch_array($result))
										{
											$no=$row['count(report)'];
											echo $no;	
										}

									}
									else
										{
											echo mysql_error();
										}

		       				?>
						</div>

						<div class="container spacer blue-text darken-4-text">
		       				Last Report Submited On:
		       				 <?php 

		       				 
		       				 if($_SESSION['user-level']==1||$_SESSION['user-level']==0)
									$query="select timestamp from rtable order by timestamp desc";				
								else
									$query="select timestamp from rtable where regno= '".$_SESSION['user-id']."' ORDER BY timestamp desc";				

								$result=mysql_query($query,$con);

									if($result)
									{
										while($row=mysql_fetch_array($result))
										{
											$time=$row['timestamp'];
											echo $time;	
											break;
										}

									}
									else
										{
											echo mysql_error();
										}


		       				?>
						</div>

		       		</div>
	       		</div>

	       <div class="spacer"></div>
	       	

       </div>
      </div>

    </div>

<?php include("./includes/footer.php"); ?>

