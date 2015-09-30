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

<div class="container offset-s4 col s4 white card">
		<div class="row">
		    <form class="col s12 " id="formlogin"  Method="post" Action="post_login.php">
		      <div class="container">
		      	<p></p>
		      	<div class="flow-text">
		      	<div class="center-align">Create new user</div>
		      	</div>
		         
		        <div class="input-field">
		          <i class="material-icons prefix">account_circle</i>
		          <input id="user" name="user" type="text" class="validate">
		          <label for="user">Username</label>
		        </div>

		        <div class="input-field">
		          <i class="material-icons prefix">account_box</i>
		          <input id="user" name="user" type="text" class="validate">
		          <label for="user">Full Name</label>
		        </div>

		        <div class="input-field">
		          <i class="material-icons prefix">lock</i>	
		          <input id="pass" name="pass" type="password" class="validate">
		          <label for="pass">Password</label>
		        </div>

		          <button class="blue offset-s3 col s5 waves-effect waves-light btn">
		          	Create <i class="material-icons right">person_add</i>
		          </button>
		       
		      </div>
		    </form>
		</div>      
</div>

<?php include("./includes/footer.php"); ?>

