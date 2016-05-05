<!DOCTYPE html>
<html>
<head> <title> Solar Panel ROI Calculator </title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
<header> <img src="../images2/logo.jpg" class="logo"> <h1>Solar Panel - Return On Investment Calculator</h1></header> <hr>
<h3><?php 
  		require('database.php');
		if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
		{
				// Verify data
				$email = mysql_escape_string($_GET['email']); 
				$hash = mysql_escape_string($_GET['hash']); 
				$query = "SELECT email, hash, active FROM details WHERE email='".$email."' AND hash='".$hash."' AND active='0';"; 
				$result = mysqli_query($cn,$query);
				//$search = mysql_query("SELECT email, hash, active FROM details WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
				$match  = mysqli_num_rows($result);
				if($match > 0)
				{
				// We have a match, activate the account
				$update_query ="UPDATE details SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0';";
				mysqli_query($cn,$update_query);
				echo '<div class="statusmsg">Congragulations! Your account is activated, you can now start using Solar ROI :)</div><br><br>';
				
				echo '<form action="login.php" method="post">
						<fieldset>
						<legend>Login here</legend>
						<label style="display:inline-block ; width:230px; margin-top:10px" for="username">Username:
						<input type="text" name="loginid" id="username" value="" />
						</label>&nbsp;
						<label style="display:inline-block;width:230px; margin-top:10px" for="password">Password:
						<input type="password" name="pass" id="password" value="" />
						</label>
						<p>
						<input type="submit" name="submit" id="submit" value="Login" /> 
						</p>
						</fieldset>
						</form>
							
						<form action="../index.html">
						<p>
						<input type="submit" name="submit" id="submit" value="Go back to Home" />
						</p>
						</form>';
				}
				else
				{
				// No match -> invalid url or account has already been activated.
				}
		}
		else
		{
				// Invalid approach
				echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
		}
		
?>