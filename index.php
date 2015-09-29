<?php include("./includes/header.php"); ?>

	<center>
	<div id="center">
		
		<?php 
			if(isset($_GET['user']))
			{
				echo"<div class=\"alert\"> Incorrect credentials </div>";
			}
		?>

		<form id="form1"  Method="post" Action="login.php">
			<div>
				<span class="label"> Username 
					<input name="user" type="text"></input>
				</span>
			</div>
			

			<div>
				<span class="label"> Password 
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

