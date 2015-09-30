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
       		
       		<h4 class="center-align blue-text text-darken-2"> Make a new Report </h4>	
       			
       			<div class="row">
		       		<div class="col s4 left-align f18 blue-text">
						 Welcome <?php echo$_SESSION['user-name'].","; ?> 
		       		</div>

		       		<div class="offset-s4 col s4">
		       		    <a class="waves-effect waves-light btn blue right z-depth-1" href="./logout.php">Logout</a>
		       		</div>
		       	</div>

		       	<div class="blue-text text-darken-2">
		       		<div class="col-12 spacer f18">
		       			<form Method="post" Action="post_nr.php">
					        <textarea id="mytextarea" name="data"></textarea>
					        <p></p>
					        <button class="blue offset-s5 col s2 waves-effect waves-light btn">
					          	Send<i class="material-icons right">send</i>
					        </button>
					    </form>


		       		</div>
	       		</div>

	       <div class="spacer"></div>
	       	

       </div>
      </div>

    </div>
<?php include("./includes/footer.php"); ?>
