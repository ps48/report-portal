<?php 
	include("./session.php"); 
	confirmlogin(); 
 	include("./includes/header.php"); ?>

 <script type="text/javascript" src="./js/tinymce.min.js"></script>

 <script type="text/javascript">
   tinymce.init({
	       selector: "#mytextarea"
	         });
 </script>

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

				<div id="output"></div>
				<form Method="post" Action="post_nr.php">
			        <textarea id="mytextarea" name="data"></textarea>
			        <button type="submit">send</button>
			    </form>

			</div>
		</div>
	</span>

</center>
<?php include("./includes/footer.php"); ?>
