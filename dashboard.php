<?php
	  include("./session.php"); 
      confirmlogin();
      include("./includes/header.php"); 
?>
	
	<!--<center>
	<span>

		<div class="">
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
					 		<dd> The portal will only used by the core team members of Organisation. </dd>
					 		<dd> Any misuse of the portal will be taken seriously. </dd>
					 		<dd> If there is any problem with the portal send a mail to contact@pshenoy.me . </dd>
					 	</dl>	
					</div>	
				 </div>
			</div>
		</div>
	</span>
	</center>-->
 <div class="row">

      <div class="col s3">
        <!-- Grey navigation panel -->
      </div>

      <div class="col s9">
        <!-- Teal page content  -->
      </div>

    </div>


<?php include("./includes/footer.php"); ?>

