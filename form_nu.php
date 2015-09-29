<?php 
	include("./session.php"); 
	confirmlogin(); 
	include("./includes/header.php");
	
	if(!(($_SESSION['user-level']==1)||($_SESSION['user-level']==0))) //Illegal Session
		{
			header("Location: ./index.php");
			exit();
		}
?>	

<center>	
	<div id="center">
		<form id="nuform"  Method="post" Action="post_nu.php">
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

