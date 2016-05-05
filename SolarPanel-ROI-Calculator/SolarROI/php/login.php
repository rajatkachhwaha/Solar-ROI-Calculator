<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Solar Panel ROI Calculator</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<script type="text/javascript" src="../scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="../scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.tabs.setup.js"></script>
</head>
<body>
<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      
           <div class="topbox last">
       
      </div>
      <br class="clear" />
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1 class="title"><a href="#">Solar Panel ROI Calculator</a></h1>
      <p>Save Energy . Anytime . Anywhere.</p>
    </div>
    <div class="fl_right">
      <ul>
        <li class="last"><a href="#">Search</a></li>
        <li><a href="#">Online Support</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
      <p>Phone: +1  | Mail: rkachhwa@cs.uml.com</p>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topnav">
	 <ul>
     <li class="active"><a href="../index.html">Home</a></li>
      <li><a href="../roi.html">ROI</a></li>
      <li><a href="../ajax.html">Live Data</a></li>
	  <li><a href="../videos.html">Videos</a></li> 
    </ul>   
  </div>
</div>
<!-- ####################################################################################################### -->

<div class="container clearfix">
	<div class="left">
		<h3>
		<?php 
	//session_start();
	require('database.php');
	extract($_POST);
	if(isset($submit))
	{
		$username = $_POST['loginid'];
		$pass = $_POST['pass'];
		$password = mysql_escape_string(md5($pass));	
		//$sql = 'SELECT count(*) from details where (username = "'.$username.'" and password = "'.$password.'")';
		//$query_result = mysqli_query($cn,$sql);	
		
		$sql = "SELECT username, password, active FROM details WHERE username='".$username."' AND password='".$password."' AND active='1';"; 
		$query_result=mysqli_query($cn,$sql);
		$match  = mysqli_num_rows($query_result);
		//$result= mysqli_fetch_array($query_result);
		if($match>0)
		{
			//echo "Login Successfull!";
			session_start();
			$_SESSION["status"] ="active";
			$_SESSION["user"]="kk";
			header('Location:./loggedin.php');
		}
		
		else 
		{
			echo "Login Failed! Please check the username and password you entered or make sure you have activated your account";
		}
	}	


?>

</div>
	<div class="right">
		<div id="useros"></div><br>
		<div id="userbrowser"></div><br>
		<div id="userlocation" style="width: 90%; height:300px"></div>
	</div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper col6">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">weblab.cs.uml.edu</a></p>
    <p class="fl_right">Designed by <a href="http://www.cs.uml.edu/~rkachhwa" title="Uml CS">Rajat</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>