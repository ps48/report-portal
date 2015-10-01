<?php include("./includes/header.php"); 

	if(isset($_GET['error']))
		$er=$_GET['error'];

?>
	<script type="text/javascript">
		Materialize.toast('<?php echo $er; ?>', 3000);
	</script>

	<div class="spacer"></div>
	<div class="container offset-s4 col s4 white card">
		<div class="row">
		    <form class="col s12 " id="formlogin"  Method="post" Action="post_login.php">
		      <div class="container">
		      	<p></p>
		      	<div class="flow-text">
		      	<div class="center-align">	Sign-In</div>
		      	</div>
		         
		         <div class="input-field">
		          <i class="material-icons prefix">account_circle</i>
		          <input id="user" name="user" type="text" class="validate">
		          <label for="user">Username</label>
		        </div>

		        <div class="input-field">
		          <i class="material-icons prefix">lock</i>	
		          <input id="pass" name="pass" type="password" class="validate">
		          <label for="pass">Password</label>
		        </div>

		          <button class="offset-s3 col s5 waves-effect waves-light btn">
		          	Login
		          	<i class="material-icons right">send</i>
		          </button>
		       
		      </div>
		    </form>
		</div>      
	</div>


<?php include("./includes/footer.php"); ?>

