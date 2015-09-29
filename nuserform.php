<?php include("./session.php"); ?>
<?php confirmlogin(); ?>


<?php include("./includes/header.php"); ?>

<?php
		
		if(!(($_SESSION['user-level']==1)||($_SESSION['user-level']==0)))
		{
			header("Location: ./index.php");
			exit();
		}

?>	

<center>	
	<div id="center">
		

	
		<form id="form2"  Method="post" Action="newuser.php">
			<div>
				<span class="label"> Username :
					<input name="user" type="text"></input>
				</span>
			</div>
			

			<div>
				<span class="label"> Name     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
					<input name="name" type="text"></input>
				</span>
			</div>

			<div> 
				<span class="label"> Password :
					<input name="pass" type="password"></input>
				</span>
			</div>

			

			<div>
				<button id="login" class="formbtn">login</button>
			</div>

		</form>	



	</div>	
</center>

<?php include("./includes/footer.php"); ?>

