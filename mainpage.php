<?php include("./session.php"); ?>
<?php confirmlogin(); ?>
<?php include("./includes/header.php"); ?>
	
	<center>
	<span>
		<div id ="sidebar">

			<?php
				if($_SESSION['user-level']==1||$_SESSION['user-level']==0)
				{

					include("./user1/u1sidebar.php");
				}
				else
				{
					include("./user2/u2sidebar.php");
				}
			?>
		</div>
		<div id ="mainbar">
			<section >
			<div id="divhead">
				<span >
				Welcome <?php echo$_SESSION['user-name']." ,"; ?> 
				</span>
				<span>
					<a href="./logout.php"> Logout </a>
				</span>	
			</div>
			</section>

			<div id = "dbfetch">
			   
				 <div id="mainpager">
				 	<div id= "inst">
					 	<dl>
					 		<dt> General instructions using the portal </dt>
					 		<dd> The portal will only used by the core team members of aaruush'15. </dd>
					 		<dd> Any misuse of the portal will be taken seriously. </dd>
					 		<dd> If there is any problem with the portal send a mail to pshenoy36@gmail.com . </dd>
					 	</dl>	
					</div>	
				 </div>

			</div>
		
		</div>
	</span>
	</center>

<?php include("./includes/footer.php"); ?>

