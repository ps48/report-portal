<?php include("./session.php"); ?>
<?php confirmlogin(); ?>


<?php include("./includes/header.php"); ?>

<script type="text/javascript" src="./js/nicEdit.js"></script>

				<script type="text/javascript">
					bkLib.onDomLoaded(function() {


						 new nicEditor({maxHeight : 400 }).panelInstance('area5');




					});

					function oncl()
					{


						var nicE = new nicEditors.findEditor('area5');
						var question = nicE.getContent();


						// Create our XMLHttpRequest object
						var hr = new XMLHttpRequest();
						// Create some variables we need to send to our PHP file
						var url = "dreportget.php";

						var vars = "data="+question;
						hr.open("POST", url, true);
						hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						// Access the onreadystatechange event for the XMLHttpRequest object
						hr.onreadystatechange = function()
						{
								if(hr.readyState == 4 && hr.status == 200)
								{

										var return_data = hr.responseText;

										//var rd=();

										if(return_data.match(/this is it/g))
											{
													window.location.href="mainpage.php";
											}
										else
											{
													document.getElementById("output").innerHTML=return_data;
											}

								}
						}

						// Send the data to PHP now... and wait for response to update the status div
						hr.send(vars); // Actually execute the request



					}




				</script>
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



				<div id="sample">

					<textarea style="height: 350px; width:80%;"  id="area5">HTML <b>content</b> <i>default</i> in textarea</textarea>

					<button  onclick="oncl()">Submit Report</button>
				</div>



			</div>



		</div>
	</span>

</center>
<?php include("./includes/footer.php"); ?>
