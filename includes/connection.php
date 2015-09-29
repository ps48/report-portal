<?php
  
  if(isset($_POST['user'])&&isset($_POST['pass']))
  {	  $user= $_POST['user'];
	  $pass=$_POST['pass'];
	  $hashedpass = sha1($pass);
  }
  
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db( "aaruush_report",$con);
 ?>